// Spinner Utility
function getSpinner(variant = "dark") {
    return `<span class="toast-spinner toast-spinner-${variant}"></span>`;
}

// Auto hide
function hideToast(id, timeout = 4000) {
    setTimeout(() => {
        $(`#toast-${id}`).fadeOut(300, function () {
            $(this).remove();
        });
    }, timeout);
}

let TOAST_ID = 0;

function notify(message, type = "success", title = null, options = {}) {
    TOAST_ID++;

    let heading = title || type;
    heading = heading.charAt(0).toUpperCase() + heading.slice(1);

    // Icons
    let icon = "";
    switch (type) {
        case "success":
            icon = '<i class="hgi hgi-stroke hgi-checkmark-circle-03"></i>';
            break;
        case "error":
            icon = '<i class="hgi hgi-stroke hgi-cancel-circle"></i>';
            break;
        case "warning":
            icon = '<i class="hgi hgi-stroke hgi-alert-02"></i>';
            break;
        case "info":
            icon = '<i class="hgi hgi-stroke hgi-alert-circle"></i>';
            break;
        case "thanks":
            icon = '<i class="hgi hgi-stroke hgi-thumbs-up"></i>';
            break;
        case "loading":
        case "loader":
            icon = getSpinner("dark");
            if (type === "loading") message = "";
            if (title === null) heading = "";
            break;
        default:
            icon = '<i class="hgi hgi-stroke hgi-checkmark-circle-03"></i>';
    }

    const temporary = options.temporary !== false;
    const timeout = options.timeout || 4000;

    $(".toast-container").append(`
        <div class="toast-notification mt-1 toast-${type} ${temporary ? "is-removable" : ""}" 
             id="toast-${TOAST_ID}" 
             data-type="${type}">
            <div class="toast-body">
                ${icon}
                <div class="toast-content">
                    ${heading ? `<h5>${heading}</h5>` : ""}
                    ${message ? `<p>${message}</p>` : ""}
                </div>
            </div>
        </div>
    `);

    if (temporary) hideToast(TOAST_ID, timeout);

    return TOAST_ID;
}

// Init container (once)
if (!$(".toast-container").length) {
    $("body").append('<div class="toast-container"></div>');
}