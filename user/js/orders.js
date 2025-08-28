function calculateProgressWidth() {
    const $steps = $('.tracking-step-horizontal');
    const totalSteps = $steps.length;
    let completedSteps = 0;
    let activeStep = 0;

    $steps.each(function (index) {
        const $step = $(this);
        if ($step.hasClass('completed')) {
            completedSteps = index + 1;
        } else if ($step.hasClass('active')) {
            activeStep = index + 1;
            completedSteps = index + 0.5;
        }
    });

    const progressPercentage = totalSteps > 1 ?
        ((completedSteps - 0.5) / (totalSteps - 1)) * 100 :
        0;

    return Math.min(Math.max(progressPercentage, 0), 100);
}

function updateProgressLine() {
    const $progressLine = $('#progressLine');
    const $steps = $('.tracking-step-horizontal');
    const $stepsContainer = $('.tracking-steps');

    if ($steps.length < 2) return;

    const firstStep = $steps[0];
    const lastStep = $steps[$steps.length - 1];

    const firstStepRect = firstStep.getBoundingClientRect();
    const lastStepRect = lastStep.getBoundingClientRect();
    const containerRect = $stepsContainer[0].getBoundingClientRect();

    const firstStepCenter = (firstStepRect.left + firstStepRect.right) / 2 - containerRect.left;
    const lastStepCenter = (lastStepRect.left + lastStepRect.right) / 2 - containerRect.left;

    const lineWidth = lastStepCenter - firstStepCenter;

    $('.tracking-line-horizontal').css({
        left: firstStepCenter + 'px',
        width: lineWidth + 'px'
    });

    const progressWidth = calculateProgressWidth();
    const actualProgressWidth = (lineWidth * progressWidth) / 100;

    $progressLine.css({
        left: firstStepCenter + 'px',
        width: actualProgressWidth + 'px'
    });
}

function setProgress(step) {
    const $steps = $('.tracking-step-horizontal');
    const $statusInfo = $('#statusInfo');

    $steps.each(function (index) {
        const $stepElement = $(this);
        const stepNumber = index + 1;
        const $icon = $stepElement.find('.tracking-icon-horizontal');

        $stepElement.removeClass('completed active');
        $icon.removeClass('completed active');

        if (stepNumber < step) {
            $stepElement.addClass('completed');
            $icon.addClass('completed');
        } else if (stepNumber === step) {
            $stepElement.addClass('active');
            $icon.addClass('active');
        }
    });

    setTimeout(updateProgressLine, 100);
}

// Initialize progress line on page load
$(document).ready(function () {
    updateProgressLine();
});

// Update progress line on window resize
$(window).on('resize', function () {
    setTimeout(updateProgressLine, 100);
});

function resetVerticalTimeline() {
    const $timeline = $('.order-timeline');
    $timeline.empty();
}

function updateVerticalTimeline(data) {
    const $timeline = $('.order-timeline');
    resetVerticalTimeline();

    const timelineStatusMap = {
        "pending": {
            title: "Order Placed",
            text: "You placed an order."
        },
        "confirmed": {
            title: "Order Confirmed",
            text: "Your order has been confirmed and payment has been processed."
        },
        "preparing": {
            title: "Order Prepared",
            text: "Your order has been prepared and packaged for shipping."
        },
        "in_transit": {
            title: "Order Shipped",
            text: "Your order has been picked up by the courier and is on its way to you."
        },
        "completed": {
            title: "Delivered",
            text: "Your order has been delivered successfully."
        }
    };

    // Latest top par dikhane ke liye reverse
    data.slice().reverse().forEach(item => {
        const formattedTime = moment(item.created_at).format("MMM DD, YYYY [at] h:mm A");

        if (item.status === "confirmed") {
            // Pehle Preparing
            const preparingMap = timelineStatusMap["preparing"];
            const $preparingItem = $(`
                <div class="timeline-item">
                    <p class="timeline-time">${formattedTime}</p>
                    <h6 class="timeline-title">${preparingMap.title}</h6>
                    <p class="timeline-text">${preparingMap.text}</p>
                </div>
            `);
            $timeline.append($preparingItem);

            // Fir Confirmed
            const confirmedMap = timelineStatusMap["confirmed"];
            const $confirmedItem = $(`
                <div class="timeline-item">
                    <p class="timeline-time">${formattedTime}</p>
                    <h6 class="timeline-title">${confirmedMap.title}</h6>
                    <p class="timeline-text">${confirmedMap.text}</p>
                </div>
            `);
            $timeline.append($confirmedItem);
        } else {
            const map = timelineStatusMap[item.status];
            if (!map) return;

            const $item = $(`
                <div class="timeline-item">
                    <p class="timeline-time">${formattedTime}</p>
                    <h6 class="timeline-title">${map.title}</h6>
                    <p class="timeline-text">${map.text}</p>
                </div>
            `);

            $timeline.append($item);
        }
    });

    $('.order-tracking-vertical').removeClass('d-none');  // Display vertical line
    $('.empty-select-order').addClass('d-none');
}

function resetOrderTimeline() {
    const $steps = $('.tracking-step-horizontal');

    $steps.each(function () {
        const $step = $(this);
        const $icon = $step.find('.tracking-icon-horizontal');

        // Sab classes remove kardo
        $step.removeClass('completed active');
        $icon.removeClass('completed active');

        // Default text wapis daal do
        let defaultText = $step.data('status') === 'completed'
            ? 'Est: ' + moment().add(1, 'days').format("MMM DD") // Example: Est: Aug 29
            : '';

        $step.find('.tracking-time-horizontal').text(defaultText);
    });

    // Pehla step (Order Placed / Pending) ko default active bana do
    const $firstStep = $('.tracking-step-horizontal[data-step="1"]');
    $firstStep.addClass('active');
    $firstStep.find('.tracking-icon-horizontal').addClass('active');

    setTimeout(updateProgressLine, 100);
}

function updateOrderTimeline(data) {
    resetOrderTimeline(); // Reset Time line

    const statusStepMap = {
        "pending": 1,
        "confirmed": 2,
        "preparing": 3,
        "in_transit": 4,
        "completed": 5
    };

    let lastStep = 1;
    let hasConfirmed = false;
    let confirmedTime = null;

    data.forEach(item => {
        const stepNumber = statusStepMap[item.status];
        if (!stepNumber) return;

        const formattedTime = formatDate(item.created_at, "MMM DD, h:mm A");

        if (item.status === "confirmed") {
            hasConfirmed = true;
            confirmedTime = formattedTime;

            // Confirmed → completed
            const $confirmedStep = $(`.tracking-step-horizontal[data-step="2"]`);
            $confirmedStep.addClass("completed").removeClass("active");
            $confirmedStep.find(".tracking-icon-horizontal").addClass("completed").removeClass("active");
            $confirmedStep.find(".tracking-time-horizontal").text(formattedTime);

            // Preparing → active (initially)
            const $preparingStep = $(`.tracking-step-horizontal[data-step="3"]`);
            $preparingStep.addClass("active").removeClass("completed");
            $preparingStep.find(".tracking-icon-horizontal").addClass("active").removeClass("completed");
            $preparingStep.find(".tracking-time-horizontal").text(formattedTime);

            lastStep = 3;
        } else if (item.status === "in_transit" && hasConfirmed) {
            // Agar in_transit hai → preparing ko complete karna hai
            const $preparingStep = $(`.tracking-step-horizontal[data-step="3"]`);
            $preparingStep.addClass("completed").removeClass("active");
            $preparingStep.find(".tracking-icon-horizontal").addClass("completed").removeClass("active");
            $preparingStep.find(".tracking-time-horizontal").text(confirmedTime); // same time from confirmed

            // In transit → active
            const $inTransitStep = $(`.tracking-step-horizontal[data-step="4"]`);
            $inTransitStep.addClass("active").removeClass("completed");
            $inTransitStep.find(".tracking-icon-horizontal").addClass("active").removeClass("completed");
            $inTransitStep.find(".tracking-time-horizontal").text(formattedTime);

            lastStep = 4;
        } else {
            // Normal case
            const $step = $(`.tracking-step-horizontal[data-step="${stepNumber}"]`);
            $step.addClass("completed").removeClass("active");
            $step.find(".tracking-icon-horizontal").addClass("completed").removeClass("active");
            $step.find(".tracking-time-horizontal").text(formattedTime);

            lastStep = stepNumber;
        }
    });

    // Agar last step complete ho gaya hai → usko active bana do
    if (lastStep) {
        const $lastStep = $(`.tracking-step-horizontal[data-step="${lastStep}"]`);
        $lastStep.removeClass("completed").addClass("active");
        $lastStep.find(".tracking-icon-horizontal").removeClass("completed").addClass("active");
    }

    setTimeout(updateProgressLine, 100);
    $('.order-tracking-horizontal').removeClass('d-none');
}

function displayOrderTimeline(statuses) {
    updateOrderTimeline(statuses);  // Update Order Timeline
    updateVerticalTimeline(statuses); // Update Verticla Timeline
}

// Function to fetch orderDetail
function getOrderDetails(orderId) {

    let $orderCard = $('.order-detail-card'),
        $orderProdCon = $orderCard.find('.order-products'),
        $addressCon = $('.shipping-details').find('.address-card');

    $.ajax({
        url: "controllers/orders",
        type: "POST",
        data: { getOrderDetails: true, id: orderId },
        dataType: "json",
        success: function (res) {
            let { data, status } = res;
            if (status === 'success') {
                displayOrderTimeline(data.order_statuses);  // Display order time line

                let prodHtml = '';
                let products = JSON.parse(data.products);

                let subTotal = 0,
                    total = 0;
                products.forEach(ele => {
                    let { images, price, qty, sale_price, title } = ele;
                    let prodSubTotal = price * qty,
                        prodTotal = sale_price * qty;
                    subTotal += toNumber(prodSubTotal);
                    total += toNumber(prodTotal);

                    prodHtml += `<div class="order-product">
                                    <div class="product-image">
                                        <img src="${mergeUrl(SITE_URL, 'images/products/', getPrimaryImage(images))}" alt="Img">
                                    </div>
                                    <div class="product-details">
                                        <h6 class="product-name">${title}</h6>
                                        <p class="product-variant">Premium Quality, 100g</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="product-price">${CURRENCY + sale_price}</span>
                                            <span class="product-quantity">Qty: ${qty}</span>
                                        </div>
                                    </div>
                                </div>`;
                });
                $orderProdCon.html(prodHtml);  // Set products
                $orderCard.find('.subtotal').text(CURRENCY + subTotal);
                $orderCard.find('.discount').text(CURRENCY + (total - subTotal));
                $orderCard.find('.total-amount').text(CURRENCY + total);

                // Set Shipping details of user
                let address = JSON.parse(data.address);
                $addressCon.find('.street-address').text(address.street_address);
                $addressCon.find('.street-number').text(address.street_number);
                $addressCon.find('.town-city').text(address.state + ", " + address.town_city + " " + address.postal_code);
                $addressCon.find('.country').text(address.country);

                // Display order items & shipping address cards
                $('#orderDetailCard').removeClass('d-none');
                $('#shippingDetailCard').removeClass('d-none');

            }
        }
    });
}

// Fetch current order records
$(document).on('click', '.orders-select-btn .dropdown-item', function (e) {
    e.preventDefault();
    let $btn = $(this),
        orderId = $btn.attr('data-id'),
        $orderDropdown = $('#orderDropdown');
    let allBtns = $('.orders-select-btn .dropdown-item');
    allBtns.removeClass('active');
    $btn.addClass('active');
    $orderDropdown.text($btn.text());

    getOrderDetails(orderId); // Fetch & display order details

    $('.card-title .order-number').text("for " + $btn.text());
});

// Fetch Order Details on click on action button
$(document).on('click', '.order-actions .order-action-btn', function (e) {
    e.preventDefault();
    let $btn = $(this),
        type = $btn.attr('data-type'),
        orderId = $btn.closest('tr').find('.order-id');
    id = $btn.attr('data-id');

    getOrderDetails(id); // Fetch & display order details
    $('#tracking-tab').click();

    $('.card-title .order-number').text("for Order " + orderId.text());

    // Check type and scroll page accordingly
    setTimeout(function () {
        if (type === "track") {
            $('html, body').animate({
                scrollTop: $('.order-tracking-horizontal').offset().top - 200
            }, 600);
        }
        else if (type === "details") {
            $('html, body').animate({
                scrollTop: $('#orderDetailCard').offset().top - 100
            }, 600);
        }
    }, 100);
})