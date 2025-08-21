// Function to check stock status
function checkStockStatus(qty, alert_qty, type = 'name') {
    let status = '';
    let cssClass = '';

    if (qty === 0) {
        status = 'Out of Stock';
        cssClass = 'out-stock';
    } else if (qty <= alert_qty) {
        status = 'Low Stock';
        cssClass = 'low-stock';
    } else {
        status = 'In Stock';
        cssClass = 'in-stock';
    }
    return (type === 'class') ? cssClass : status;
}
