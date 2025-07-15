<?php
require_once 'env.php';
require_once 'config.php';
require_once 'functions.php';

class DB
{
    private $pdo;

    public function __construct()
    {
        $this->createDatabaseIfNotExists(); // Create DB if it doesn't exist
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
            $this->pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    private function createDatabaseIfNotExists()
    {
        try {
            $dsn = "mysql:host=" . DB_HOST;
            $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE DATABASE IF NOT EXISTS `" . DB_NAME . "` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
            $pdo->exec($sql);
        } catch (PDOException $e) {
            die("Failed to create database: " . $e->getMessage());
        }
    }

    private function interpolateQuery($query, $params)
    {
        $keys = [];
        $values = $params;

        foreach ($params as $key => $value) {
            $keys[] = '/:' . preg_quote($key, '/') . '\b/';
            if (is_numeric($value)) {
                $values[$key] = $value;
            } else {
                $values[$key] = "'" . addslashes($value) . "'";
            }
        }

        return preg_replace($keys, array_values($values), $query);
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function squery($sql, $params = [], $return_query = false)
    {
        if ($return_query) return $this->interpolateQuery($sql, $params);
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($table, $data)
    {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $this->query($sql, $data);
        return $this->pdo->lastInsertId();
    }

    public function update($table, $data, $conditions)
    {
        $set = implode(", ", array_map(fn ($key) => "$key = :$key", array_keys($data)));
        $condition_str = implode(" AND ", array_map(fn ($key) => "$key = :cond_$key", array_keys($conditions)));

        $params = array_merge($data, array_combine(
            array_map(fn ($k) => "cond_$k", array_keys($conditions)),
            array_values($conditions)
        ));

        $sql = "UPDATE $table SET $set WHERE $condition_str";
        return $this->query($sql, $params)->rowCount();
    }

    public function delete($table, $conditions)
    {
        $condition_str = implode(" AND ", array_map(fn ($key) => "$key = :$key", array_keys($conditions)));
        $sql = "DELETE FROM $table WHERE $condition_str";
        return $this->query($sql, $conditions)->rowCount();
    }

    public function select($table, $columns = "*", $conditions = [], $options = [])
    {
        $sql = "SELECT $columns FROM $table";
        $params = [];

        // WHERE with operator support
        if (!empty($conditions)) {
            if (isset($conditions['operator'])) {
                $operators = $conditions['operator'];
                $whereParts = [];

                foreach ($operators as $logic => $pairs) {
                    $logic = strtoupper($logic);
                    $subParts = [];

                    foreach ($pairs as $key => $val) {
                        $paramKey = "{$logic}_$key";
                        $subParts[] = "$key = :$paramKey";
                        $params[$paramKey] = $val;
                    }

                    if (!empty($subParts)) {
                        $whereParts[] = "(" . implode(" $logic ", $subParts) . ")";
                    }
                }

                if (!empty($whereParts)) {
                    $sql .= " WHERE " . implode(" AND ", $whereParts);
                }
            } else {
                $parts = [];
                foreach ($conditions as $key => $val) {
                    $parts[] = "$key = :$key";
                    $params[$key] = $val;
                }
                if (!empty($parts)) {
                    $sql .= " WHERE " . implode(" AND ", $parts);
                }
            }
        }

        // ORDER BY
        if ($orderBy = arr_val($options, 'order_by')) {
            $sql .= " ORDER BY $orderBy";
        }

        // LIMIT
        if (isset($options['limit'])) {
            $sql .= " LIMIT " . (int)$options['limit'];
        }

        // OFFSET
        if (isset($options['offset'])) {
            $sql .= " OFFSET " . (int)$options['offset'];
        }

        // Return interpolated query if requested
        $return_query = arr_val($options, 'return_query', false);
        return $this->squery($sql, $params, $return_query);
    }

    public function select_one($table, $columns = "*", $conditions = [], $options = [])
    {
        $options['limit'] = 1;
        $result = $this->select($table, $columns, $conditions, $options);
        return $result[0] ?? [];
    }
}

$db = new DB();
