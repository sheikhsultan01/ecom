$(document).ready(function () {
    // Active link switching
    $('.nav-link').click(function (e) {
        if (!$(this).hasClass('dropdown-toggle')) {
            $('.nav-link').removeClass('active');
            $(this).addClass('active');
        }
    });
});

$(document).ready(function () {
    const currentPath = window.location.pathname.split('/').pop();

    $('.nav-link, .dropdown-item').each(function () {
        const linkPath = $(this).attr('href');
        if (linkPath && linkPath === currentPath) {
            $(this).addClass('active');

            if ($(this).hasClass('dropdown-item')) {
                $(this).closest('.nav-item.dropdown').find('> .nav-link').addClass('active');
            }
        } else {
            $(this).removeClass('active');
        }
    });
});

$(document).on('click', '.nav-link, .dropdown-item', function (e) {
    $('.nav-link, .dropdown-item').removeClass('active');

    $(this).addClass('active');

    if ($(this).hasClass('dropdown-item')) {
        $(this).closest('.nav-item.dropdown').find('> .nav-link').addClass('active');
    }
});