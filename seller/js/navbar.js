$(document).ready(function () {
    // Active link switching
    $('.nav-link').click(function (e) {
        if (!$(this).hasClass('dropdown-toggle')) {
            $('.nav-link').removeClass('active');
            $(this).addClass('active');
        }
    });

    function initializeHoverableDropdowns() {
        // Check each dropdown for data-hoverable attribute
        $('.dropdown').each(function () {
            var $dropdown = $(this);
            var isHoverable = $dropdown.attr('data-hoverable') === 'true';

            if (isHoverable) {
                // For hoverable dropdowns
                $dropdown.hover(
                    // Mouse enter
                    function () {
                        // Hide all other sibling dropdowns first
                        $(this).siblings('.dropdown').find('.dropdown-menu').hide();
                        $(this).siblings('.dropdown').removeClass('show');

                        // Before showing dropdown, check positioning
                        positionDropdown($(this));

                        // Show current dropdown
                        $(this).find('.dropdown-menu').show();
                        $(this).addClass('show');
                    },
                    // Mouse leave
                    function () {
                        // Hide current dropdown
                        $(this).find('.dropdown-menu').hide();
                        $(this).removeClass('show');
                    }
                );

                // Prevent click behavior for hoverable dropdowns
                $dropdown.find('.nav-link').click(function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    return false;
                });

                // Keep dropdown open when hovering over dropdown menu itself
                $dropdown.find('.dropdown-menu').hover(
                    function () {
                        $(this).show();
                        $(this).closest('.dropdown').addClass('show');
                    },
                    function () {
                        $(this).hide();
                        $(this).closest('.dropdown').removeClass('show');
                    }
                );
            }
        });

        // Handle sibling dropdown hiding when hovering over parent container
        $('.dropdown[data-hoverable="true"]').on('mouseenter', function () {
            // Hide all sibling dropdowns
            $(this).siblings('.dropdown[data-hoverable="true"]').each(function () {
                $(this).find('.dropdown-menu').hide();
                $(this).removeClass('show');
            });
        });

        // Function to position the dropdown based on available space
        function positionDropdown($dropdown) {
            var $menu = $dropdown.find('.dropdown-menu');
            var dropdownOffset = $dropdown.offset();
            var dropdownWidth = $dropdown.outerWidth();
            var menuWidth = $menu.outerWidth();
            var windowWidth = $(window).width();

            // Remove any positioning classes first
            $menu.removeClass('dropdown-menu-end dropdown-menu-start');

            // Calculate available space on the right
            var spaceOnRight = windowWidth - (dropdownOffset.left + dropdownWidth);

            // Calculate available space on the left
            var spaceOnLeft = dropdownOffset.left;

            // Check if there's enough space on the right
            if (spaceOnRight < menuWidth) {
                // Not enough space on right, check if there's enough on left
                if (spaceOnLeft >= menuWidth) {
                    // Position dropdown to the left
                    $menu.addClass('dropdown-menu-end');
                } else {
                    // Not enough space on either side, determine which side has more space
                    if (spaceOnLeft > spaceOnRight) {
                        $menu.addClass('dropdown-menu-end');
                    } else {
                        // Default (right side) position
                        $menu.addClass('dropdown-menu-start');
                    }
                }
            } else {
                // Enough space on right, use default positioning
                $menu.addClass('dropdown-menu-start');
            }
        }
    }

    $(window).resize(function () {
        $('.dropdown.show').each(function () {
            positionDropdown($(this));
        });
    });

    function positionDropdown($dropdown) {
        let $menu = $dropdown.find('.dropdown-menu');
        let dropdownOffset = $dropdown.offset();
        let dropdownWidth = $dropdown.outerWidth();
        let menuWidth = $menu.outerWidth();
        let windowWidth = $(window).width();

        $menu.removeClass('dropdown-menu-end dropdown-menu-start');

        // Calculate available space on the right
        let spaceOnRight = windowWidth - (dropdownOffset.left + dropdownWidth);
        let spaceOnLeft = dropdownOffset.left;

        // Check if there's enough space on the right
        if (spaceOnRight < menuWidth) {
            if (spaceOnLeft >= menuWidth) {
                $menu.addClass('dropdown-menu-end');
            } else {
                if (spaceOnLeft > spaceOnRight) {
                    $menu.addClass('dropdown-menu-end');
                } else {
                    $menu.addClass('dropdown-menu-start');
                }
            }
        } else {
            $menu.addClass('dropdown-menu-start');
        }
    }

    initializeHoverableDropdowns();
});