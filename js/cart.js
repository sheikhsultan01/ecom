$(document).ready(function () {
    // Function to format currency
    function formatCurrency(amount) {
        return `\$${amount.toFixed(2)}`;
    }

    // Function to update item subtotal and overall cart totals
    function updateCartTotals() {
        let subtotal = 0;
        let discount = 0; // Placeholder for future discount logic
        let shipping = 10.00; // Example fixed shipping

        // Loop through each cart item to calculate item subtotal and overall subtotal
        // This targets both table rows (desktop) and card divs (mobile)
        $('.gs-cart-item-row, .gs-cart-item-card').each(function () {
            const $item = $(this);
            const price = parseFloat($item.find('.item-price').data('price'));
            const quantity = parseInt($item.find('.gs-qty-input').val());
            const itemSubtotal = price * quantity;

            $item.find('.gs-item-subtotal').text(formatCurrency(itemSubtotal));
            subtotal += itemSubtotal;
        });

        const grandTotal = subtotal - discount + shipping;

        // Apply price update animation
        function animatePriceUpdate($element, newPrice) {
            const currentPrice = parseFloat($element.text().replace('$', ''));
            if (currentPrice !== newPrice) {
                $element.addClass('animate__animated animate__flash'); // Add animate.css flash
                $element.text(formatCurrency(newPrice));
                // Remove animation class after it completes
                $element.one('animationend', function () {
                    $(this).removeClass('animate__animated animate__flash');
                });
            } else {
                $element.text(formatCurrency(newPrice));
            }
        }

        animatePriceUpdate($('#cart-subtotal'), subtotal);
        animatePriceUpdate($('#cart-discount'), discount);
        animatePriceUpdate($('#cart-shipping'), shipping);
        animatePriceUpdate($('#cart-grand-total'), grandTotal); // Special animation for grand total

        // Update cart count in header
        const totalItemsInCart = $('.gs-qty-input').toArray().reduce((sum, input) => sum + parseInt($(input).val()), 0);
        $('#cart-count').text(totalItemsInCart);
        if (totalItemsInCart > 0) {
            $('#cart-count').addClass('animate__animated animate__pulse'); // Pulse animation on count update
            $('#cart-count').one('animationend', function () {
                $(this).removeClass('animate__animated animate__pulse');
            });
        }


        // Show/hide empty cart message
        if (totalItemsInCart === 0) {
            $('#empty-cart-message').removeClass('d-none animate__animated animate__bounceOut').addClass('animate__animated animate__bounceIn');
            $('.gs-cart-items-card').addClass('d-none'); // Hide cart items section
        } else {
            $('#empty-cart-message').addClass('d-none').removeClass('animate__animated animate__bounceIn');
            $('.gs-cart-items-card').removeClass('d-none');
        }
    }

    // Event listener for quantity increment (+)
    $(document).on('click', '.gs-btn-qty-plus', function () {
        const $input = $(this).siblings('.gs-qty-input');
        let quantity = parseInt($input.val());
        quantity++;
        $input.val(quantity);
        updateCartTotals();
        // In a real application, you'd send an AJAX request here to update the server-side cart
        // updateCartOnServer($item.data('item-id'), quantity);
    });

    // Event listener for quantity decrement (-)
    $(document).on('click', '.gs-btn-qty-minus', function () {
        const $input = $(this).siblings('.gs-qty-input');
        let quantity = parseInt($input.val());
        if (quantity > 1) { // Prevent quantity from going below 1
            quantity--;
            $input.val(quantity);
            updateCartTotals();
            // updateCartOnServer($item.data('item-id'), quantity);
        }
    });

    // Event listener for direct quantity input change
    $(document).on('change', '.gs-qty-input', function () {
        let quantity = parseInt($(this).val());
        if (isNaN(quantity) || quantity < 1) { // Ensure valid number and minimum 1
            $(this).val(1);
        }
        updateCartTotals();
        // updateCartOnServer($item.data('item-id'), quantity);
    });

    // Event listener for remove item button
    $(document).on('click', '.gs-btn-remove-item', function () {
        const $itemRow = $(this).closest('.gs-cart-item-row'); // For table row
        const $itemCard = $(this).closest('.gs-cart-item-card'); // For mobile card

        const itemId = $itemRow.data('item-id') || $itemCard.data('item-id');

        if (confirm('Are you sure you want to remove this item from your cart?')) {
            // Apply removing animation
            $itemRow.addClass('animate__animated animate__fadeOutLeft');
            $itemCard.addClass('animate__animated animate__fadeOutLeft');

            // Remove the item visually after animation completes
            $itemRow.one('animationend', function () {
                $(this).remove();
                updateCartTotals(); // Recalculate after removal
            });
            $itemCard.one('animationend', function () {
                $(this).remove();
                updateCartTotals(); // Recalculate after removal
            });

            // In a real application, you'd send an AJAX request here to remove the item from server-side cart
            // removeCartItemFromServer(itemId);
        }
    });

    // Initial calculation when the page loads
    updateCartTotals();

    // Optional: Add a subtle flash effect to totals on load
    $('#cart-subtotal, #cart-discount, #cart-shipping, #cart-grand-total').each(function () {
        $(this).addClass('animate__animated animate__fadeIn');
    });

    // Coupon apply animation
    $(document).on('click', '.coupon-input button', function () {
        const input = $(this).prev();

        if (!input.val() || input.val().trim() === '') {
            input.css('border-color', '#dc3545');
            setTimeout(() => {
                input.css('border-color', '#ddd');
            }, 1000);
            return;
        }

        $(this).html('<i class="bi bi-hourglass-split"></i>');
        setTimeout(() => {
            $(this).html('Applied');
            $('#cart-discount').text('-\$30.00');
            $('#cart-grand-total').text('\$250.00');

            setTimeout(() => {
                this.innerHTML = 'Apply';
            }, 2000);
        }, 1000);
    });

});