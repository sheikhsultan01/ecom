$(document).ready(function () {
    // Active link switching
    $('.nav-link').click(function (e) {
        if (!$(this).hasClass('dropdown-toggle')) {
            $('.nav-link').removeClass('active');
            $(this).addClass('active');
        }
    });
});