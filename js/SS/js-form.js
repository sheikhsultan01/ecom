const callbackFns = {},
    callbeforeFns = {};
let images = [];

// Edit form inof
function fillValuesToFormWithJSON($form, json) {
    if (!json) return false;
    if (!isJson(json)) return false;
    json = JSON.parse(json);
    fillValuesToForm($($form), json);
}

// Fill form data
function fillValuesToForm($form, data) {
    for (const [name, value] of Object.entries(data)) {
        const $input = $form.find(`[name="${name}"], [name="${name}[]"]`);

        if ($input.length) {
            fillInputValue($input, value);
        }
    }
}

// Fill input value
function fillInputValue(input, value) {
    let $input = $(input),
        type = $input.attr("type"),
        tag = $input.get(0).tagName.toLowerCase(),
        preventTrigger = $input.attr("data-prevent-trigger", false);

    // If is nb upload images input
    if ($input.hasClass("nb-item-value")) {
        $input.html(JSON.stringify(value));
        $input.trigger("change");
        return true;
    }

    // if not input
    if (!['input', 'select', 'textarea'].includes(tag)) {
        if (tag == 'img')
            $input.attr("src", value);
        else
            $input.html(value);
        return true;
    }
    // Select
    if (tag === 'select') {
        $input.find("option").prop("selected", false);
        if ($input.hasAttr("multiple")) {
            let selectBoxValues = [];
            if (Array.isArray(value) || isJson(value)) {
                selectBoxValues = isJson(value) ? JSON.parse(value) : value;
            } else {
                selectBoxValues = value.split(",");
            }
            selectBoxValues.forEach(val => {
                $input.find(`option[value="${val}"]`).prop("selected", true);
            });
        } else {
            $input.find(`option[value="${value}"]`).prop("selected", true);
        }
        if ($input.hasClass("ss-select")) {
            if (!preventTrigger) {
                $input.get(0).dispatchEvent(new Event("change"));
                $input.trigger("change");
            }
        } else {
            if (!preventTrigger) $input.trigger("change");
        }
        return true;
    }
    if (type === "file") return true;
    if (type == "datetime-local") {
        value = value.replace(" ", "T");
        value = value.substr(0, value.length - 2) + "00";
    } else if (type == "checkbox") {
        if (typeof value === 'boolean') {
            $input.prop("checked", value);
        } else if (Array.isArray(value)) {
            $input.each(function () {
                $(this).prop("checked", value.includes($(this).val()));
            });
        } else
            $input.prop("checked", $input.val() == value);
    } else if (type === 'radio') {
        $input.each(function () {
            $(this).prop("checked", $(this).val() === value);
        });
    } else {
        value = htmlspecialchars_decode(value);
        $input.val(value);
    }
    if (!preventTrigger) $input.trigger("change");
}

$(document).on("click", ".editTableInfo", function (e) {
    e.preventDefault();
    if (!this.hasAttribute("data-bs-target")) return false;
    let target = $($(this).attr("data-bs-target"));
    if (target.length < 1) return false;
    let code = $(this).find("code");
    if (code.length) {
        fillValuesToFormWithJSON($(target), code.html());
        return true;
    }
});

$(document).on('submit', '.js-form, .ajax-form', function (e) {
    e.preventDefault();

    const $form = $(this);
    let action = $form.attr('action') || '';
    const $fileInputs = $form.find('input[type="file"]');

    // Remove empty file inputs before creating FormData
    $fileInputs.each(function () {
        if (this.files.length === 0) {
            $(this).remove();
        }
    });

    const callbackName = $form.data('callback'),
        callbeforeName = $form.data('callbefore'),
        onSuccessAttr = $form.attr('on-success');

    // Run callbefore function (if defined)
    if (callbeforeName && typeof callbeforeFns?.[callbeforeName] === 'function') {
        const proceed = callbeforeFns[callbeforeName]($form);
        if (proceed === false) return; // stop submission
    }

    // Normalize action URL
    if (!action.endsWith('.php')) action += '.php';
    if (!action.includes('controllers/')) action = 'controllers/' + action;

    // Build AJAX request
    const ajaxRequest = {
        url: action,
        type: 'POST',
        dataType: 'json',
        success: function (res) {
            if (callbackName && typeof callbackFns?.[callbackName] === 'function') {
                callbackFns[callbackName]($form, res);
            } else {
                if (res.status === 'success') {
                    sAlert(res.data, 'success');
                    if (res.redirect) {
                        location.assign(res.redirect);
                    }
                } else {
                    sAlert(res.data, 'error');
                }
            }

            // Handle on-success attribute (single or multiple functions)
            if (res.status === 'success' && onSuccessAttr) {
                try {
                    eval(onSuccessAttr);
                } catch (err) {
                    console.error('Error in on-success function:', onSuccessAttr, err);
                }
            }
        },
        error: function () {
            sAlert('Something went wrong. Please try again.', 'error');
        }
    };

    //  File handling
    if ($fileInputs.length > 0) {
        let formData = new FormData($form[0]);

        // Check for custom file handling
        if ($form.data('custom-files')) {
            formData.delete('images'); // remove original input

            // "images" array maintained in your JS
            if (typeof images !== 'undefined') {
                images.forEach((img, idx) => {
                    console.log(img, " single imageeeeeeee");
                    formData.append(`files[${idx}]`, img.file);
                    formData.append(`positions[${idx}]`, img.position || idx);
                    if (img.isPrimary) {
                        formData.append(`primary`, idx);
                    }
                });
            }
        }

        ajaxRequest.data = formData;
        ajaxRequest.processData = false;
        ajaxRequest.contentType = false;
    } else {
        ajaxRequest.data = $form.serialize();
    }

    $.ajax(ajaxRequest);
});

// Delete Data from table
$(document).on('click', '.delete-data-btn', function (e) {
    e.preventDefault();
    let dataTarget = $(this).attr('data-target'),
        dataAction = $(this).attr('data-action'),
        callback = $(this).attr("data-callback"),
        controllerURL = 'controllers/',
        row = $(this).parents('tr').first();
    if ($(this).dataVal("parent"))
        row = $(this).parents($(this).dataVal("parent")).first();
    if (!dataTarget || !dataAction) return false;
    if (this.hasAttribute('data-controller')) controllerURL += $(this).attr("data-controller");
    else controllerURL += "delete";
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: controllerURL,
                type: 'POST',
                data: { action: dataAction, target: dataTarget, deleteData: true },
                dataType: 'json',
                success: function (data) {
                    if (data.status === "success")
                        row.remove();
                    else
                        sAlert(data.data, data.status);

                    if (callback && typeof callbackFns?.[callback] === 'function') {
                        callbackFns[callback]($form, res);
                    }
                },
                error: function () {
                    makeError();
                }
            })
        }
    })
});

// stop the form submit
$(document).on('keydown', '.js-form input', function (e) {
    if (e.key === 'Enter' || e.key === 13) {
        e.preventDefault();
        return false;
    }
});