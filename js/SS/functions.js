// Tags initializer
function initTcTags(selectors) {
    $(selectors).each(function () {
        if ($(this).hasAttr("data-launched")) return true;
        $(this).attr("data-launched", "true");
        new Tags($(this));
    });
}

// left trim
function ltrim(str, char) {
    if (!str.length) return str;

    let rgx = new RegExp(`^(${char})+`, "g");
    return str.replace(rgx, "");
}
// right trim
function rtrim(str, char) {
    if (!str.length) return str;

    let rgx = new RegExp(`(${char})+$`, "g");
    return str.replace(rgx, "");
}
// trim from both sides
function trim(str, char = " ") {
    str = ltrim(str, char);
    str = rtrim(str, char);
    return str;
}

// Wait Promise
function wait(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function refreshFns() {
    ssCheckbox();
    initTcTags(".tc-tags") // Tc Tags Input
    initSsJxElements('.ss-jx-element'); // Jx Elements
    initializeHoverableDropdowns();
}

$(document).ready(refreshFns);