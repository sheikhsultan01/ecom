const l = console.log.bind(this);

function htmlspecialchars_decode(text) {
    if (typeof (text) !== "string") return text;
    var map = {
        '&amp;': '&',
        '&lt;': '<',
        '&gt;': '>',
        '&quot;': '"',
        '&#039;': "'"
    };
    return text.replace(/&amp;|&lt;|&gt;|&quot;|&#039;/g, function (m) { return map[m]; });
}
function htmlspecialchars(str) {
    if (typeof str !== 'string') return str;

    const map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    };

    return str.replace(/[&<>"']/g, function (m) { return map[m]; });
}
// Alert Fuction
function sAlert(text, heading, options = {}) {
    let type = ("type" in options) ? options.type : false,
        html = ("html" in options) ? options.html : false;

    if (!type)
        type = heading.toLowerCase();

    let icons = ["success", "error", "warning", "info", "question"];
    if (!icons.includes(type)) type = '';
    let msgOptions = {
        type: type,
        title: heading,
        text: text,
    };
    if (html) {
        delete msgOptions.text;
        msgOptions.html = text;
    }
    Swal.fire(msgOptions);
}

// Append Error Message
function appendErrorMessage($el, message) {
    let $existing = $el.find('.error-message');
    if ($existing.length) $existing.remove();

    const $msg = $(`<span class="text-danger error-message" style="display: none;">${message}</span>`);
    $el.append($msg);
    $msg.fadeIn(300);

    setTimeout(() => {
        $msg.fadeOut(300, function () {
            $(this).remove();
        });
    }, 5000);
}
// Function To Capitalize
function toCapitalize(status) {
    const words = status ? status.split('_') : [];
    const formattedStatus = words
        .map(word => word.charAt(0).toUpperCase() + word.slice(1).toLowerCase())
        .join(' ');

    return formattedStatus;
}
// is json
function isJson(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}

jQuery.fn.hasAttr = function (name) {
    return this.attr(name) !== undefined;
};

// Function to refresh a specific source
function refreshSource(source) {
    AS.refreshSource(source)
}

// Refresh the request and hide modal
function jdRefreshAndHideModal(source, modalId) {
    AS.refreshSource(source)
    // Hide modal
    console.log(modalId)
    $(`#${modalId}`).modal('hide');
}

// Get data attribute value
$.fn.dataVal = function (dataName, defaultValue = false) {
    let attrVal = defaultValue;
    if ($(this).hasAttr("data-" + dataName)) {
        attrVal = $(this).attr("data-" + dataName);
    }
    return attrVal;
}