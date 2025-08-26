function generateOrderId(created_at, id) {
    let date = moment(created_at);
    let month = date.format("MMM").toUpperCase(); // e.g. DEC
    let day   = date.format("DD");                // e.g. 14
    return month + '-' + day + '-' + id;
}