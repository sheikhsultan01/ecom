$(document).on("mouseenter", ".category-item", function () {
    // Remove active class from all items
    $(".category-item").removeClass("active");
    $(".subcategory-content").removeClass("active");

    // Add active class to current hovered item
    $(this).addClass("active");

    // Show corresponding subcategory content
    const id = $(this).data("id"); // using jQuery's data method
    $("#" + id).addClass("active");
});