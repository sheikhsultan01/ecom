$(document).ready(function () {
    // Category selection
    $('.category-card').click(function () {
        $('.category-card').removeClass('active');
        $(this).addClass('active');

        const category = $(this).data('category');
        filterProducts(category);
    });

    // View toggle
    $('#gridView').click(function () {
        $('.view-btn').removeClass('active');
        $(this).addClass('active');
        $('#productsGrid').removeClass('list-view');
        $('.product-card').removeClass('list-view');
    });

    $('#listView').click(function () {
        $('.view-btn').removeClass('active');
        $(this).addClass('active');
        $('#productsGrid').addClass('list-view');
        $('.product-card').addClass('list-view');
    });

    // Mobile filter toggle
    $('#mobileFilterToggle').click(function () {
        $('#filterOverlay').fadeIn();
        $('#mobileFilterPanel').addClass('active');

        // Clone filter content to mobile panel
        const filterContent = $('.filter-section').html();
        $('#mobileFilterPanel').append(filterContent);
    });

    $('#closeMobileFilter, #filterOverlay').click(function () {
        $('#filterOverlay').fadeOut();
        $('#mobileFilterPanel').removeClass('active');
    });

    // Filter functionality
    $('.filter-option input[type="checkbox"]').change(function () {
        applyFilters();
    });

    $('.price-input').on('input', function () {
        applyFilters();
    });

    $('.sort-select').change(function () {
        const sortBy = $(this).val();
        sortProducts(sortBy);
    });

    // Clear filters
    $('.clear-filters').click(function () {
        $('input[type="checkbox"]').prop('checked', false);
        $('.price-input').val('');
        $('.price-slider').val(500);
        applyFilters();
    });

    // Add to cart functionality
    $('.btn-add-cart').click(function () {
        const button = $(this);
        const originalText = button.html();

        button.html('<i class="fas fa-check"></i> Added');
        button.css('background', '#28a745');

        setTimeout(() => {
            button.html(originalText);
            button.css('background', '');
        }, 2000);
    });

    // Wishlist functionality
    $('.btn-wishlist').click(function () {
        $(this).toggleClass('active');
        const icon = $(this).find('i');

        if ($(this).hasClass('active')) {
            icon.removeClass('far').addClass('fas');
            $(this).css('color', '#ff4444');
        } else {
            icon.removeClass('fas').addClass('far');
            $(this).css('color', '');
        }
    });

    // Product card click to view details
    $('.product-card').click(function (e) {
        if (!$(e.target).closest('.product-actions').length) {
            // Navigate to product detail page
            window.location.href = '#product-detail';
        }
    });

    // Price range slider
    $('.price-slider').on('input', function () {
        const value = $(this).val();
        $('.price-input').eq(1).val(value);
        applyFilters();
    });

    // Functions
    function filterProducts(category) {
        if (category === 'all') {
            $('.product-card').show();
            $('.results-count').html('Showing <strong>1-24</strong> of <strong>1,234</strong> products');
        } else {
            // Filter logic would go here
            console.log('Filtering by category:', category);
        }
    }

    function applyFilters() {
        // Filter application logic
        const selectedCategories = [];
        const selectedRatings = [];
        const selectedBrands = [];
        const selectedAvailability = [];

        $('input[name="category"]:checked').each(function () {
            selectedCategories.push($(this).val());
        });

        $('input[name="rating"]:checked').each(function () {
            selectedRatings.push($(this).val());
        });

        $('input[name="brand"]:checked').each(function () {
            selectedBrands.push($(this).val());
        });

        $('input[name="availability"]:checked').each(function () {
            selectedAvailability.push($(this).val());
        });

        const minPrice = $('.price-input').eq(0).val();
        const maxPrice = $('.price-input').eq(1).val();

        console.log('Applying filters:', {
            categories: selectedCategories,
            ratings: selectedRatings,
            brands: selectedBrands,
            availability: selectedAvailability,
            priceRange: {
                min: minPrice,
                max: maxPrice
            }
        });
    }

    function sortProducts(sortBy) {
        console.log('Sorting by:', sortBy);
        // Sorting logic would go here
    }

    // Pagination
    $('.page-btn').click(function (e) {
        e.preventDefault();
        $('.page-btn').removeClass('active');
        $(this).addClass('active');

        // Scroll to top of products
        $('html, body').animate({
            scrollTop: $('.products-section').offset().top - 100
        }, 500);
    });
});