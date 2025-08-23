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