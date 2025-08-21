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

// To boolean
function toBoolean(data) {
    if (typeof data === "boolean") return data;
    if (isJson(data)) {
        data = JSON.parse(data);
    }

    return data ? true : false;
}
// Error
function makeError(error = 'Something went wrong! Please try again') {
    if (typeof error !== "string")
        error = 'Something went wrong! Please try again';
    Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: error,
    });
}
// Disaled button
function disableBtn(btn) {
    btn = $(btn);
    btn.html(spinner);
    btn.addClass('disabled');
    btn.prop('disabled', true);
}
// Enable button
function enableBtn(btn, text) {
    btn = $(btn);
    btn.html(text);
    btn.removeClass('disabled');
    btn.prop('disabled', false);
}
function isObject(obj) {
    if (obj.__proto__.toString) {
        return (obj.toString() == "[object Object]")
    }
    return false;
}

function initializeHoverableDropdowns() {
    // Check each dropdown for data-hoverable attribute
    $('.dropdown').each(function () {
        var $dropdown = $(this);
        var isHoverable = $dropdown.attr('data-hoverable') === 'true';

        if (isHoverable) {
            // For hoverable dropdowns
            $dropdown.hover(
                // Mouse enter
                function () {
                    // Hide all other sibling dropdowns first
                    $(this).siblings('.dropdown').find('.dropdown-menu').hide();
                    $(this).siblings('.dropdown').removeClass('show');

                    // Before showing dropdown, check positioning
                    positionDropdown($(this));

                    // Show current dropdown
                    $(this).find('.dropdown-menu').show();
                    $(this).addClass('show');
                },
                // Mouse leave
                function () {
                    // Hide current dropdown
                    $(this).find('.dropdown-menu').hide();
                    $(this).removeClass('show');
                }
            );

            // Prevent click behavior for hoverable dropdowns
            $dropdown.find('.nav-link').click(function (e) {
                e.preventDefault();
                e.stopPropagation();
                return false;
            });

            // Keep dropdown open when hovering over dropdown menu itself
            $dropdown.find('.dropdown-menu').hover(
                function () {
                    $(this).show();
                    $(this).closest('.dropdown').addClass('show');
                },
                function () {
                    $(this).hide();
                    $(this).closest('.dropdown').removeClass('show');
                }
            );
        }
    });

    // Handle sibling dropdown hiding when hovering over parent container
    $('.dropdown[data-hoverable="true"]').on('mouseenter', function () {
        // Hide all sibling dropdowns
        $(this).siblings('.dropdown[data-hoverable="true"]').each(function () {
            $(this).find('.dropdown-menu').hide();
            $(this).removeClass('show');
        });
    });

    // Function to position the dropdown based on available space
    function positionDropdown($dropdown) {
        var $menu = $dropdown.find('.dropdown-menu');
        var dropdownOffset = $dropdown.offset();
        var dropdownWidth = $dropdown.outerWidth();
        var menuWidth = $menu.outerWidth();
        var windowWidth = $(window).width();

        // Remove any positioning classes first
        $menu.removeClass('dropdown-menu-end dropdown-menu-start');

        // Calculate available space on the right
        var spaceOnRight = windowWidth - (dropdownOffset.left + dropdownWidth);

        // Calculate available space on the left
        var spaceOnLeft = dropdownOffset.left;

        // Check if there's enough space on the right
        if (spaceOnRight < menuWidth) {
            // Not enough space on right, check if there's enough on left
            if (spaceOnLeft >= menuWidth) {
                // Position dropdown to the left
                $menu.addClass('dropdown-menu-end');
            } else {
                // Not enough space on either side, determine which side has more space
                if (spaceOnLeft > spaceOnRight) {
                    $menu.addClass('dropdown-menu-end');
                } else {
                    // Default (right side) position
                    $menu.addClass('dropdown-menu-start');
                }
            }
        } else {
            // Enough space on right, use default positioning
            $menu.addClass('dropdown-menu-start');
        }
    }
}

$(window).resize(function () {
    $('.dropdown.show').each(function () {
        positionDropdown($(this));
    });
});

function positionDropdown($dropdown) {
    let $menu = $dropdown.find('.dropdown-menu');
    let dropdownOffset = $dropdown.offset();
    let dropdownWidth = $dropdown.outerWidth();
    let menuWidth = $menu.outerWidth();
    let windowWidth = $(window).width();

    $menu.removeClass('dropdown-menu-end dropdown-menu-start');

    // Calculate available space on the right
    let spaceOnRight = windowWidth - (dropdownOffset.left + dropdownWidth);
    let spaceOnLeft = dropdownOffset.left;

    // Check if there's enough space on the right
    if (spaceOnRight < menuWidth) {
        if (spaceOnLeft >= menuWidth) {
            $menu.addClass('dropdown-menu-end');
        } else {
            if (spaceOnLeft > spaceOnRight) {
                $menu.addClass('dropdown-menu-end');
            } else {
                $menu.addClass('dropdown-menu-start');
            }
        }
    } else {
        $menu.addClass('dropdown-menu-start');
    }
}