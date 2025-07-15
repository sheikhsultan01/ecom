const callbackFns = {},
    callbeforeFns = {};

$(document).on('submit', '.js-form, .ajax-form', function (e) {
    e.preventDefault();
    const $form = $(this);
    let action = $form.attr('action');
    const hasFileInput = $form.find('input[type="file"]').length > 0;

    const callbackName = $form.data('callback'),
        callbeforeName = $form.data('callbefore');

    // Execute callbefore function if defined
    if (callbeforeName && typeof callbeforeFns[callbeforeName] === 'function') {
        const proceed = callbeforeFns[callbeforeName]($form);
        if (proceed === false) {
            return;  // Stop the submission if the callbefore function returns false
        }
    }

    if (action.indexOf('.php') === -1) action = action + '.php';
    if (action.indexOf('controllers') === -1) action = 'controllers/' + action;
    if (action.indexOf('http') === -1) action = SITE_URL + action;

    // Ajax Request
    const ajaxRequest = {
        url: action,
        type: 'POST',
        dataType: 'json',
        success: function (res) {
            if (callbackName && typeof callbackFns[callbackName] === 'function') {
                callbackFns[callbackName]($form, res);
            } else {
                if (res.status === 'success') {
                    sAlert(res.data, 'success');
                    if ("redirect" in res) {
                        location.assign(res.redirect);
                    }
                } else {
                    sAlert(res.data, 'error');
                }
            }
        },
        error: function (xhr, status, error) {
            sAlert('Something went wrong. Please try again.', 'error');
        }
    };

    if (hasFileInput) {
        ajaxRequest.data = new FormData(this);
        ajaxRequest.processData = false;
        ajaxRequest.contentType = false;
    } else {
        ajaxRequest.data = $form.serialize();
    }

    $.ajax(ajaxRequest);
});