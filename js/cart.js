// Callback on update Quantity 
ss.fn.cb.quantityUpdateCB = function ($form, res) {
    if (res.status == "success") {
        refreshSource('cartItems');
        return true;
    }
    notify(res.data, res.status)
}

// Callback on delete Cart Item
ss.fn.cb.deleteCartItemCB = function ($form, res) {
    if (res.status == "success") {
        refreshSource('cartItems');
        return true;
    }
    notify(res.data, res.status)
}

// Edit Address Callback
ss.fn.cb.editAddressModalCB = function ($popup, e) {
    let $btn = $(e.relatedTarget);

    // Initialize google map
    new LocationMap('map-canvas', 'map-lat', 'map-lng', {
        'street_number': 'street_number',
        'route': 'street_address',
        'locality': 'town_city',
        'administrative_area_level_1': 'state',
        'country': 'country',
        'postal_code': 'postal_code'
    }, "#addressForm");
};

// Show address Callback
ss.fn.cb.showAddressCB = function ($popup, e) {
    let $btn = $(e.relatedTarget),
        data = JSON.parse($btn.find('code').text()),
        addresses = data.addresses,
        total_amount = data.total_amount;
    let hasAddresses = false;

    // Check object ya array dono ke liye
    if (addresses && typeof addresses === 'object') {
        hasAddresses = Array.isArray(addresses)
            ? addresses.length > 0
            : Object.keys(addresses).length > 0;
    }

    if (hasAddresses) {
        let addressHtml = '';
        Object.entries(addresses).forEach(([uid, address]) => {
            let { address_type, country, address_uid, is_default, postal_code, state, street_address, street_number, town_city } = address;

            let editJson = JSON.stringify({
                ...address,
                modalHeading: "Edit"
            }).replace(/"/g, '&quot;');

            if (address) {
                addressHtml += `<div class="address-card">
                            <div class="d-flex gap-2 align-items-center mb-2">
                                <input type="radio" name="address_uid" value="${address_uid}" class="form-check-input m-0 address-select-btn" ${is_default == '1' ? 'checked' : ''}>
                                <span class="address-type m-0 ${address_type}">${toCapitalize(address_type)}</span>
                            </div>
                            <div class="address-actions">
                                <button class="btn btn-sm btn-outline-primary me-1 editTableInfo" data-bs-toggle="modal" data-bs-target="#saveAddressMdl">
                                    <code class="d-none">${editJson}</code>
                                    <i class="hgi hgi-stroke hgi-pen-01"></i>
                                </button>
                            </div>
                            <p class="mb-1">${street_address + ", " + street_number}</p>
                            <p class="mb-1">${state + ", " + town_city + " " + postal_code}</p>
                            <p class=" mb-0">${country}</p>
                        </div>`;
            }

        });

        $('#mdlVerifyAddress').find('.address-list').html(addressHtml); // Display the address cards
        $('#mdlVerifyAddress').find('.order-total-amount').val(total_amount);  // Set Total Amount

    } else {
        let $addressCont = $('.address-list');
        $addressCont.html(`<div class="empty-address">
                            <div class="address-msg-container my-5">
                                <div class="d-flex flex-column align-items-center gap-3">
                                    <span>
                                        <i class="hgi hgi-stroke hgi-home-03"></i>
                                    </span>
                                    <span class="text mt-2">No Address Added yet!</span>
                                </div>
                            </div>
                        </div>`);
    }

}

// Event to select the address
$(document).on("click", ".address-card", function (e) {
    if (!$(e.target).is("input.address-select-btn")) {
        $(this).find("input.address-select-btn").prop("checked", true).trigger("change");
    }
});