const spinner = '<span class="spinner"></span>',
    l = console.log.bind(this),
    logError = console.error.bind(this);

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

const ssCheckbox = () => {
    $(".ss-checkbox").each(function () {
        if (this.hasAttribute("data-fetched")) return;
        $(this).attr("data-fetched", "true");

        let $input = $(this).clone();
        let id = $input.attr("id") || ("ss_" + Math.random().toString(36).substr(2, 9));
        $input.attr("id", id);
        $input.addClass("form-check-input");
        let labelText = $input.attr("data-label") || $input.attr("title") || "";

        let html = `
            <div class="form-check">
                ${$input.get(0).outerHTML}
                <label class="form-check-label" for="${id}">${labelText}</label>
            </div>
        `;

        $(html).insertBefore($(this));
        $(this).remove();
    });
};

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

// Function to merge url
function mergeUrl(...parts) {
    if (!parts.length) return "";

    let first = parts.shift().replace(/[\/\\]+$/, "");
    let middle = parts.map(p => p.replace(/^[\/\\]+|[\/\\]+$/g, ""));
    let url = first + "/" + middle.join("/");

    if (parts.length && /[\/\\]$/.test(parts[parts.length - 1])) {
        url += "/";
    }

    return url;
}

function handleQuantity(current = 0, type = "increase") {
    if (type === "increase") {
        return current + 1;
    } else if (type === "decrease") {
        return current > 1 ? current - 1 : 1; // minimum 1
    }
    return current;
}

function toNumber(str) {
    if (typeof (str) == "number" || typeof (str) == "float") return str;
    if (str) {
        str = str.replace(/[^\d.]/g, "");
        if (str.length > 0) {
            str = parseFloat(str);
        }
    }
    str = parseFloat(str);
    if (isNaN(str)) {
        return false;
    } else {
        return str;
    }
}

function updateQuantityButtons($parent, value) {
    let $decBtn = $parent.find('.quantity-btn[data-type="decrease"]');

    if (value <= 1) {
        $decBtn.prop('disabled', true);
    } else {
        $decBtn.prop('disabled', false);
    }
}
// Function to return add to cart button or quantity input
function checkProductAddedToCart(product_id, product_price, cart_id, product_qty) {
    let btnHtml = '';

    if (cart_id) {
        let dataSubmit = JSON.stringify({
            'updateProductQty': true,
            'id': cart_id
        }).replace(/"/g, '&quot;');

        btnHtml += `<div class="quantity-controls">
                        <button class="quantity-btn" data-type="decrease"><i class="hgi hgi-stroke hgi-minus-sign"></i></button>
                        <input type="number" name="qty" class="quantity-input ss-jx-element" id="quantityInput" value="${product_qty}" min="1" readonly data-submit="${dataSubmit}" data-target="cart" data-listener="change" data-callback="quantityUpdateCB">
                        <button class="quantity-btn" data-type="increase"><i class="hgi hgi-stroke hgi-plus-sign"></i></button>
                    </div>`;

    } else {

        let dataSubmit = JSON.stringify({
            'addToCartProduct': true,
            'product_id': product_id,
            'unit_price': product_price
        }).replace(/"/g, '&quot;');

        btnHtml += `<button class="add-to-cart ss-jx-element" data-target="cart" data-submit="${dataSubmit}" data-callback="addProductToCartCB">
                    <i class="hgi hgi-stroke hgi-shopping-cart-add-02"></i>
                    Add to Cart
                    </button>`;
    }

    return btnHtml;
}

// Funciton to format date
function formatDate(datetime, format = "YYYY-MM-DD") {
    return moment(datetime).format(format);
}

// Function to generate order ids
function generateOrderId(created_at, id) {
    let date = moment(created_at);
    let month = date.format("MMM").toUpperCase(); // e.g. DEC
    let day = date.format("DD");                // e.g. 14
    return month + '-' + day + '-' + id;
}

// Function to return primary image name from product images
function getPrimaryImage(imagesJson) {
    let images;
    try {
        images = JSON.parse(imagesJson);
    } catch (e) {
        console.error("Invalid JSON:", e);
        return null;
    }

    if (!Array.isArray(images) || images.length === 0) {
        return null;
    }

    // Find primary image
    let primary = images.find(img => img.isPrimary);

    // Return primary if found, otherwise first image
    return primary ? primary.name : images[0].name;
}