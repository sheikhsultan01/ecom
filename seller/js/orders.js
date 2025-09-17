// Callback function to fill Orders details in modal
ss.fn.cb.showCustomerOrderDetailsCB = function ($popup, e) {
    let $btn = $(e.relatedTarget),
        data = JSON.parse($btn.find('code').text()),
        address = JSON.parse(data.address),
        products = JSON.parse(data.products);

    // Set Customer Information
    let $customerDetail = $('#orderDetailsModal').find('.customer-details');
    $customerDetail.find('.customer-name').text(data.name);
    $customerDetail.find('.customer-phone').text(data.phone);
    $customerDetail.find('.customer-email').text(data.email);

    // Set Order Information
    let $orderInfo = $('#orderDetailsModal').find('.order-information');
    $orderInfo.find('.order-date').text(formatDate(data.created_at, 'MMMM DD, YYYY'));
    $orderInfo.find('.order-status').removeClass('pending confirmed completed cancelled in_transit');
    $orderInfo.find('.order-status').text(toCapitalize(data.status)).addClass(`${data.status}`).attr('data-status', data.status);
    $('.update-order-status').find('.dropdown-item').removeClass('active');
    $('.update-order-status').find(`[data-type="${data.status}"]`).addClass('active');

    // Set Shipping Address
    let $shipAddress = $('.shipping-address');
    $shipAddress.find('.street-address').text(address.street_address);
    $shipAddress.find('.street-number').text(address.street_number);
    $shipAddress.find('.town-city').text(address.state + ", " + address.town_city + " " + address.postal_code);
    $shipAddress.find('.country').text(address.country);

    // Display the products
    let $productTable = $('#orderDetailsModal').find('.products-table');
    let $productSummary = $('#orderDetailsModal').find('.product-summary');

    let productHtml = '',
        subTotal = 0,
        total = 0,
        count = 1;
    products.forEach(ele => {
        let { price, qty, sale_price, title } = ele;
        let prodSubTotal = sale_price * qty,
            prodTotal = price * qty;

        subTotal += toNumber(prodSubTotal);
        total += toNumber(prodTotal);

        productHtml += `<tr>
                                <td>${count}</td>
                                <td>${title}</td>
                                <td>${CURRENCY + price}</td>
                                <td>${qty}</td>
                                <td class="text-end">${CURRENCY + prodTotal}</td>
                            </tr>`;
        count++;
    });

    $productTable.html(productHtml);
    $productSummary.find('.subtotal').text(CURRENCY + subTotal);
    $productSummary.find('.discount').text((total - subTotal));
    $productSummary.find('.total-amount').text(CURRENCY + total);
    $('#orderDetailsModal').find('.order-id').text(generateOrderId(data.created_at, data.id));
    $('#orderDetailsModal').find('.curr-order-id').attr('data-id', data.id);

}

// Ajax request to update order status
$(document).on('click', '.update-order-status .dropdown-item:not(.active)', function (e) {
    e.preventDefault();
    let $this = $(this),
        type = $this.data('type'),
        id = $this.closest('.update-order-status').attr('data-id'),
        $orderInfo = $('#orderDetailsModal').find('.order-information'),
        $orderStatus = $orderInfo.find('.order-status'),
        oldOrderStatus = $orderInfo.find('.order-status').attr('data-status');

    $('.update-order-status').find('.dropdown-item').removeClass('active');
    $this.addClass('active');

    $.ajax({
        url: "controllers/orders",
        type: "POST",
        data: { updateOrderStatus: true, status: type, id },
        dataType: "json",
        success: function (res) {
            let { data, status } = res;
            if (status === 'success') {
                refreshSource('orders'); // Refresh the Orders data in table

                // Change the status in Order modal
                $orderStatus.text(toCapitalize(type)).removeClass(`${oldOrderStatus}`);
                $orderStatus.addClass(`${type}`).attr('data-status', type);

                notify(data, status);
            } else {
                notify(data, status);
            }
        }
    });
});

// Function to calculate the orders percenage
function calOrdersPer(total, completed) {
    let percentage = (completed / total) * 100;
    return Math.round(percentage);
}

// Function to set the orders percentage
function setOrdersPercentage() {
    let $orderPer = $('.orders-stats').find('.progress-bar');
    $orderPer.each(function () {
        let percentage = $(this).attr('data-percentage');
        $(this).css('width', `${percentage}%`);
    });
}

// Orders Success Callback
function OrdersSuccessCB(res, $ele) {
    setOrdersPercentage();
}