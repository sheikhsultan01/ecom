$(document).ready(function () {
    const currentPath = window.location.pathname.split('/').pop();

    $('.sidebar-link').each(function () {
        const linkPath = $(this).attr('href');
        if (linkPath === currentPath) {
            $(this).addClass('active');
        } else {
            $(this).removeClass('active');
        }
    });
});

$(document).on('click', '.sidebar-link', function (e) {
    let $parent = $(this).parent('.sidebar');
    $parent.find('.sidebar-link').removeClass('active');
    $(this).addClass('active');
});
