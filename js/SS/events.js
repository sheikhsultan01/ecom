$(document).on('click', '.quantity-controls .quantity-btn', function (e) {
    e.preventDefault();

    let $btn = $(this),
        $parent = $btn.closest('.quantity-controls'),
        $input = $parent.find('.quantity-input'),
        type = $btn.data('type');

    let current = parseInt($input.val()) || 1;
    let newVal = handleQuantity(current, type);

    if (newVal !== current) {
        $input.val(newVal).trigger('change');
    }

    // Update button states
    updateQuantityButtons($parent, newVal);
});

// Initialize states on page load
$('.quantity-controls').each(function () {
    let $parent = $(this),
        $input = $parent.find('.quantity-input'),
        value = parseInt($input.val()) || 1;

    updateQuantityButtons($parent, value);
});

$(document).on('input change', '.quantity-controls .quantity-input', function () {
    let $input = $(this);
    let value = parseInt($input.val()) || 0;

    if (value < 1) {
        $input.val(1); // minimum 1 enforce
    }
});

// Bootstrap modal callback
$(document).on("show.bs.modal", ".modal[data-callback]", function (e) {
    ss.fn._handle(this, e, 'callback');
});