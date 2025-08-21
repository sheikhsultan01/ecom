// Has attribute
$.fn.hasAttr = function (attrName) {
    let attr = false;
    if ($(this).length > 0) {
        if ($(this).get(0).hasAttribute(attrName)) attr = true;
    }
    return attr;
}
// Get data attribute value
$.fn.dataVal = function (dataName, defaultValue = false) {
    let attrVal = defaultValue;
    if ($(this).hasAttr("data-" + dataName)) {
        attrVal = $(this).attr("data-" + dataName);
    }
    return attrVal;
}
// dnone jquery Display toggle
$.fn.dnone = function (toggle = true) {
    if (toggle) {
        $(this).addClass("d-none");
    } else {
        $(this).removeClass("d-none");
    }
}
// Toggle loading
$.fn.loading = function (toggle = true) {
    if (toggle) {
        $(this).attr("tmp-html", $(this).html());
        disableBtn(this);
    } else {
        enableBtn(this, $(this).attr("tmp-html"));
    }
}

// Get all attributes for element
$.fn.attrs = function () {
    let attrs = {};
    if (!$(this).length) return attrs;
    $.each(this.attributes, function () {
        if (this.specified) {
            attrs[this.name] = this.value;
        }
    });
    return attrs;
}
// Get tag name of jqueyr elememnt
$.fn.tagName = function () {
    return $(this).get(0).tagName.toLowerCase();
}
// Get Input type
$.fn.inputType = function () {
    let tag = $(this).tagName(),
        type = tag;
    if (tag === "input") {
        if (["checkbox", "radio"].includes($(this).attr("type"))) {
            type = $(this).attr("type")
        } else if ($(this).attr("type") == "file") {
            type = "file";
        }
    }
    return type;
}
// Check if checked
$.fn.isChecked = function () {
    return $(this).is(":checked");
}