$('#navbarSearchOpen').on('click', function(event) {
    event.preventDefault();

    $(this).hide(400);
    $("#navbarSearchForm").animate({width: "toggle", opacity: "toggle"});
});