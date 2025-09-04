<?php

class AdvancedProductSearch
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    //  Universal search method - handles everything in one function
    public function searchProducts($searchQuery, $filters = [])
    {
        // Clean and prepare search terms
        $searchTerms = $this->prepareSearchTerms($searchQuery);

        if (empty($searchTerms)) {
            return ['products' => [], 'total' => 0, 'search_type' => 'empty'];
        }

        // Try different search approaches in priority order
        $results = [];
        $searchType = '';

        // 1. First try direct product search (highest priority)
        $results = $this->executeProductSearch($searchTerms, $filters);
        if (!empty($results)) {
            $searchType = 'direct_products';
        }

        // 2. If no direct products found, try category-based search
        if (empty($results)) {
            $results = $this->executeCategorySearch($searchTerms, $filters);
            if (!empty($results)) {
                $searchType = 'category_products';
            }
        }

        // 3. If still no results, try broader fuzzy search
        if (empty($results)) {
            $results = $this->executeFuzzySearch($searchTerms, $filters);
            if (!empty($results)) {
                $searchType = 'fuzzy_search';
            }
        }

        return [
            'products' => $results,
            'total' => count($results),
            'search_type' => $searchType,
            'search_terms' => $searchTerms,
            'original_query' => $searchQuery
        ];
    }

    // Prepare and clean search terms
    private function prepareSearchTerms($searchQuery)
    {
        $searchQuery = trim($searchQuery);
        $searchQuery = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $searchQuery);

        // Split and clean terms
        $terms = preg_split('/\s+/', $searchQuery);
        $stopWords = ['and', 'or', 'if', 'the', 'a', 'an', 'in', 'on', 'at', 'to', 'for', 'of', 'with', 'by'];

        $terms = array_filter($terms, function ($term) use ($stopWords) {
            return !in_array(strtolower($term), $stopWords) && strlen($term) >= 2;
        });

        return array_unique(array_filter($terms));
    }

    // Execute direct product search (Step 1) - Using PDO prepared statements
    private function executeProductSearch($searchTerms, $filters)
    {
        $whereConditions = [];
        $params = [];
        $paramIndex = 0;

        // Build search conditions for each term using prepared statements
        foreach ($searchTerms as $term) {
            $termParams = [];
            $termConditions = [];

            // Each search field gets its own parameter
            for ($i = 0; $i < 5; $i++) {
                $paramKey = "term_{$paramIndex}_field_{$i}";
                $termParams[$paramKey] = "%{$term}%";
                $params[$paramKey] = "%{$term}%";
                $paramIndex++;
            }

            $paramKeys = array_keys($termParams);
            $termConditions = [
                "p.title LIKE :{$paramKeys[0]}",
                "p.description LIKE :{$paramKeys[1]}",
                "p.brand LIKE :{$paramKeys[2]}",
                "p.sku LIKE :{$paramKeys[3]}",
                "JSON_SEARCH(p.tags, 'one', :{$paramKeys[4]}) IS NOT NULL"
            ];

            $whereConditions[] = '(' . implode(' OR ', $termConditions) . ')';
        }

        $searchCondition = implode(' AND ', $whereConditions);

        // Build relevance score using first search term
        $firstTermParams = [];
        for ($i = 0; $i < 5; $i++) {
            $paramKey = "relevance_term_$i";
            $firstTermParams[$paramKey] = "%{$searchTerms[0]}%";
            $params[$paramKey] = "%{$searchTerms[0]}%";
        }

        $relevanceParams = array_keys($firstTermParams);

        $sql = "
            SELECT DISTINCT
                p.*,
                c.name as category_name,
                c.slug as category_slug,
                c.description as category_description,
                pc.name as parent_category_name,
                -- Relevance calculation
                (
                    (CASE WHEN p.title LIKE :{$relevanceParams[0]} THEN 100 ELSE 0 END) +
                    (CASE WHEN p.brand LIKE :{$relevanceParams[1]} THEN 80 ELSE 0 END) +
                    (CASE WHEN JSON_SEARCH(p.tags, 'one', :{$relevanceParams[2]}) IS NOT NULL THEN 70 ELSE 0 END) +
                    (CASE WHEN p.sku LIKE :{$relevanceParams[3]} THEN 60 ELSE 0 END) +
                    (CASE WHEN p.description LIKE :{$relevanceParams[4]} THEN 30 ELSE 0 END)
                ) as relevance_score
            FROM products p
            LEFT JOIN categories c ON p.category_id = c.id
            LEFT JOIN categories pc ON c.parent_id = pc.id
            WHERE 
                p.status = 'active' 
                AND c.status = 'active'
                AND ({$searchCondition})
        ";

        $sql = $this->addFilters($sql, $filters, $params);
        $sql .= " ORDER BY relevance_score DESC, p.id DESC";
        $sql = $this->addLimit($sql, $filters);

        return $this->db->squery($sql, $params);
    }

    // Execute category-based search (Step 2)
    private function executeCategorySearch($searchTerms, $filters)
    {
        $categoryConditions = [];
        $params = [];
        $paramIndex = 0;

        foreach ($searchTerms as $term) {
            $paramKeys = [];
            for ($i = 0; $i < 3; $i++) {
                $paramKey = "cat_term_{$paramIndex}_field_{$i}";
                $paramKeys[] = $paramKey;
                $params[$paramKey] = "%{$term}%";
                $paramIndex++;
            }

            $categoryConditions[] = "(
                c.name LIKE :{$paramKeys[0]} 
                OR c.description LIKE :{$paramKeys[1]}
                OR pc.name LIKE :{$paramKeys[2]}
            )";
        }

        $categorySearch = implode(' AND ', $categoryConditions);

        // Relevance parameters
        $relevanceParams = [];
        for ($i = 0; $i < 4; $i++) {
            $paramKey = "cat_relevance_$i";
            $relevanceParams[] = $paramKey;
            $params[$paramKey] = "%{$searchTerms[0]}%";
        }

        $sql = "
            SELECT DISTINCT
                p.*,
                c.name as category_name,
                c.slug as category_slug,
                c.description as category_description,
                pc.name as parent_category_name,
                -- Category relevance scoring
                (
                    (CASE WHEN c.name LIKE :{$relevanceParams[0]} THEN 90 ELSE 0 END) +
                    (CASE WHEN pc.name LIKE :{$relevanceParams[1]} THEN 80 ELSE 0 END) +
                    (CASE WHEN c.description LIKE :{$relevanceParams[2]} THEN 40 ELSE 0 END) +
                    (CASE WHEN p.title LIKE :{$relevanceParams[3]} THEN 30 ELSE 0 END)
                ) as relevance_score
            FROM products p
            LEFT JOIN categories c ON p.category_id = c.id
            LEFT JOIN categories pc ON c.parent_id = pc.id
            WHERE 
                p.status = 'active' 
                AND c.status = 'active'
                AND ({$categorySearch})
        ";

        $sql = $this->addFilters($sql, $filters, $params);
        $sql .= " ORDER BY relevance_score DESC, p.id DESC";
        $sql = $this->addLimit($sql, $filters);

        return $this->db->squery($sql, $params);
    }

    // Execute fuzzy search (Step 3) - broader search with partial matches
    private function executeFuzzySearch($searchTerms, $filters)
    {
        $fuzzyConditions = [];
        $params = [];
        $paramIndex = 0;

        foreach ($searchTerms as $term) {
            // More relaxed search - only for terms with 3+ characters
            if (strlen($term) >= 3) {
                $paramKeys = [];
                for ($i = 0; $i < 5; $i++) {
                    $paramKey = "fuzzy_term_{$paramIndex}_field_{$i}";
                    $paramKeys[] = $paramKey;
                    $params[$paramKey] = "%{$term}%";
                    $paramIndex++;
                }

                $fuzzyConditions[] = "(
                    p.title LIKE :{$paramKeys[0]}
                    OR p.description LIKE :{$paramKeys[1]}
                    OR p.brand LIKE :{$paramKeys[2]}
                    OR c.name LIKE :{$paramKeys[3]}
                    OR JSON_SEARCH(p.tags, 'one', :{$paramKeys[4]}) IS NOT NULL
                )";
            }
        }

        if (empty($fuzzyConditions)) {
            return [];
        }

        $fuzzySearch = implode(' OR ', $fuzzyConditions); // OR instead of AND for broader results

        // Relevance parameters
        $relevanceParams = [];
        for ($i = 0; $i < 5; $i++) {
            $paramKey = "fuzzy_relevance_$i";
            $relevanceParams[] = $paramKey;
            $params[$paramKey] = "%{$searchTerms[0]}%";
        }

        $sql = "
            SELECT DISTINCT
                p.*,
                c.name as category_name,
                c.slug as category_slug,
                c.description as category_description,
                pc.name as parent_category_name,
                -- Lower relevance scores for fuzzy matches
                (
                    (CASE WHEN p.title LIKE :{$relevanceParams[0]} THEN 50 ELSE 0 END) +
                    (CASE WHEN p.brand LIKE :{$relevanceParams[1]} THEN 40 ELSE 0 END) +
                    (CASE WHEN c.name LIKE :{$relevanceParams[2]} THEN 35 ELSE 0 END) +
                    (CASE WHEN JSON_SEARCH(p.tags, 'one', :{$relevanceParams[3]}) IS NOT NULL THEN 30 ELSE 0 END) +
                    (CASE WHEN p.description LIKE :{$relevanceParams[4]} THEN 20 ELSE 0 END)
                ) as relevance_score
            FROM products p
            LEFT JOIN categories c ON p.category_id = c.id
            LEFT JOIN categories pc ON c.parent_id = pc.id
            WHERE 
                p.status = 'active' 
                AND c.status = 'active'
                AND ({$fuzzySearch})
        ";

        $sql = $this->addFilters($sql, $filters, $params);
        $sql .= " ORDER BY relevance_score DESC, p.id DESC";
        $sql = $this->addLimit($sql, $filters);

        return $this->db->squery($sql, $params);
    }

    //  Add filters to query
    private function addFilters($sql, $filters, &$params)
    {
        if (!empty($filters['category_id'])) {
            $params['filter_category_id'] = (int)$filters['category_id'];
            $sql .= " AND (p.category_id = :filter_category_id OR c.parent_id = :filter_category_id)";
        }

        if (!empty($filters['min_price'])) {
            $params['filter_min_price'] = (float)$filters['min_price'];
            $sql .= " AND CAST(p.sale_price as DECIMAL(10,2)) >= :filter_min_price";
        }

        if (!empty($filters['max_price'])) {
            $params['filter_max_price'] = (float)$filters['max_price'];
            $sql .= " AND CAST(p.sale_price as DECIMAL(10,2)) <= :filter_max_price";
        }

        if (!empty($filters['brand'])) {
            $params['filter_brand'] = $filters['brand'];
            $sql .= " AND p.brand = :filter_brand";
        }

        return $sql;
    }

    //  Add limit to query
    private function addLimit($sql, $filters)
    {
        $limit = !empty($filters['limit']) ? (int)$filters['limit'] : 50;
        $sql .= " LIMIT {$limit}";
        return $sql;
    }

    //  Get search suggestions for autocomplete
    public function getSearchSuggestions($searchQuery, $limit = 10)
    {
        $searchQuery = trim($searchQuery);

        if (strlen($searchQuery) < 2) {
            return [];
        }

        $params = [
            'search_term' => "%{$searchQuery}%",
            'limit_products' => 5,
            'limit_categories' => 3,
            'limit_brands' => 2,
            'total_limit' => (int)$limit
        ];

        $sql = "
            (SELECT DISTINCT p.title as suggestion, 'product' as type 
             FROM products p 
             WHERE p.title LIKE :search_term 
             AND p.status = 'active'
             LIMIT :limit_products)
            UNION
            (SELECT DISTINCT c.name as suggestion, 'category' as type 
             FROM categories c 
             WHERE c.name LIKE :search_term 
             AND c.status = 'active'
             LIMIT :limit_categories)
            UNION
            (SELECT DISTINCT p.brand as suggestion, 'brand' as type 
             FROM products p 
             WHERE p.brand LIKE :search_term 
             AND p.status = 'active'
             LIMIT :limit_brands)
            LIMIT :total_limit
        ";

        return $this->db->squery($sql, $params);
    }
}


// Initialize (your existing db class)
$search = new AdvancedProductSearch($db);

// With filters
// $filters = ['min_price' => 50000, 'limit' => 20];
// $filteredResult = $search->searchProducts($searchQuery, $filters);