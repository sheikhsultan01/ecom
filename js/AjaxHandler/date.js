$(document).on("change", ".jd-date-selector-type", function (e) {
    e.preventDefault();
    const type = $(this).val();
    const $startDate = $(this).closest('.jd-date-selector').find('.jd-date-start');
    const $endDate = $(this).closest('.jd-date-selector').find('.jd-date-end');
    const $dateInputs = $(this).closest('.jd-date-selector').find('.jd-date-inputs');

    if (type === 'custom') {
        e.stopImmediatePropagation();
        $dateInputs.slideDown(100);
        return false;
    } else {
        $dateInputs.slideUp(100);
    }

    // Clear dates if "date" is selected
    if (type === 'date') {
        $startDate.val('');
        $endDate.val('');
        $startDate.trigger('change');
        $startDate.trigger('input');
        return;
    }

    const today = new Date();
    let start = new Date();
    let end = new Date();

    switch (type) {
        case 'today':
            start = today;
            end = today;
            break;

        case 'yesterday':
            start.setDate(today.getDate() - 1);
            end.setDate(today.getDate() - 1);
            break;

        case 'last_7_days':
            start.setDate(today.getDate() - 6);
            break;

        case 'last_30_days':
            start.setDate(today.getDate() - 29);
            break;

        case 'this_month':
            start = new Date(today.getFullYear(), today.getMonth(), 1);
            end = new Date(today.getFullYear(), today.getMonth() + 1, 0);
            break;

        case 'last_month':
            const lastMonth = new Date(today.getFullYear(), today.getMonth() - 1);
            start = new Date(lastMonth.getFullYear(), lastMonth.getMonth(), 1);
            end = new Date(lastMonth.getFullYear(), lastMonth.getMonth() + 1, 0);
            break;
    }

    // Format dates to YYYY-MM-DD using local timezone
    function formatDate(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    $startDate.val(formatDate(start));
    $endDate.val(formatDate(end));
    $startDate.trigger('change');
    $startDate.trigger('input');
});