// Enable tooltips everywhere. Perf issues ?
$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

// Navbar search input animation.
$('#navbarSearchOpen').on('click', function(event) {
    event.preventDefault();

    $(this).hide(400);
    $("#navbarSearchForm").animate({width: "toggle", opacity: "toggle"});
});