$(document).on('click', '.password-toggle', function () {
    const input = $(this).prev();
    const icon = $(this);

    if (input.attr('type') === 'password') {
        input.attr('type', 'text');
        icon.removeClass('hgi-stroke hgi-view');
        icon.addClass('hgi-stroke hgi-view-off-slash');
    } else {
        input.attr('type', 'password');
        icon.removeClass('hgi-stroke hgi-view-off-slash');
        icon.addClass('hgi-stroke hgi-view');
    }
});