let notifyCount = 0;

function notify(message, status = 'info') {
    const valid = ['success', 'error', 'warning', 'info'];
    if (!valid.includes(status)) status = 'info';

    const offset = notifyCount * 70; // Adjust for stacking
    const notification = $(`
        <div class="notification ${status}" style="bottom: ${20 + offset}px;">
            <span class="msg">${message}</span>
            <button class="close-btn">&times;</button>
        </div>
    `);

    $('body').append(notification);
    notifyCount++;

    // Show animation
    setTimeout(() => notification.addClass('show'), 50);

    // Auto hide
    const hide = () => {
        notification.removeClass('show').fadeOut(300, function () {
            $(this).remove();
            notifyCount--;
            adjustNotifications();
        });
    };

    setTimeout(hide, 3000);
    notification.find('.close-btn').on('click', hide);
    notification.on('click', hide);
}

// Re-adjust positions when one is removed
function adjustNotifications() {
    let visible = $('.notification.show');
    visible.each(function (i) {
        $(this).css('bottom', `${20 + i * 70}px`);
    });
}
