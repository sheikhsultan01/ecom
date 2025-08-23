$(document).on('click', '.quantity-controls .quantity-btn', function (e) {
    e.preventDefault();

    let $btn = $(this),
        $parent = $btn.closest('.quantity-controls'),
        $input = $parent.find('.quantity-input'),
        type = $btn.attr('data-type');

    let current = parseInt($input.val()) || 0;
    let newVal = handleQuantity(current, type);

    $input.val(newVal); // Update quantity
    $input.trigger('change');
});

$(document).on('input change', '.quantity-controls .quantity-input', function () {
    let $input = $(this);
    let value = parseInt($input.val()) || 0;

    if (value < 1) {
        $input.val(1); // minimum 1 enforce
    }
});
