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

// Add click handlers for order history buttons
$('.order-actions .btn:first-child').on('click', function () {
    document.getElementById('tracking-tab').click();
});

$('.order-actions .btn:last-child').on('click', function () {
    document.getElementById('tracking-tab').click();
});

// Handle order selection from dropdown
const orderDropdownItems = document.querySelectorAll('.dropdown-item');
$('.dropdown-item').on('click', function (e) {
    e.preventDefault();
    $('#orderDropdown').text(this.textContent);
    $('.dropdown-item').removeClass('active');
    $(this).addClass('active');
});