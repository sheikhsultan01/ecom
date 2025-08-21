<?php
// Function for order the records
function getOrderByClause($sort)
{
    switch ($sort) {
        case 'name-asc':
            return 'p.title ASC';
        case 'name-desc':
            return 'p.title DESC';
        case 'price-asc':
            return 'p.price ASC';
        case 'price-desc':
            return 'p.price DESC';
        case 'stock-asc':
            return 'p.quantity ASC';
        case 'stock-desc':
            return 'p.quantity DESC';
        default:
            return 'p.id DESC';
    }
}

// Funciton to check stock
function getStockFilter($stock)
{
    switch ($stock) {
        case 'inStock':
            return "p.quantity > p.alert_qty";
        case 'lowStock':
            return "p.quantity > 0 AND p.quantity <= p.alert_qty";
        case 'outOfStock':
            return "p.quantity = 0";
        default:
            return "1=1";
    }
}
