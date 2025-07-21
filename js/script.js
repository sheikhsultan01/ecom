$(document).on('click', '.password-toggle', function () {
    const input = $(this).prev();
    const icon = $(this).is('button') ? $(this).find('i.password-toggle') : $(this);


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

// Back to top functionality
$(window).on('scroll', function () {
    const $backToTop = $('.back-to-top');
    if ($(window).scrollTop() > 300) {
        $backToTop.addClass('show');
    } else {
        $backToTop.removeClass('show');
    }
});

// Back to top button
$(document).on('click', '.back-to-top', function () {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});