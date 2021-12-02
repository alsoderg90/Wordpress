jQuery( document ).ready(function() {
    var button = document.getElementsByClassName('navbar-toggler')[0]
    navbarEvent(button)
});

function navbarEvent(button) {

    (function($) {
        button.addEventListener('click', function(e) {
            var div = $("#navbarSuppoertedContent").toggle();
            var style = window.getComputedStyle(div[0], null).display;
            var menu = $("#menu-main-menu")
        })       
    })( jQuery );
 
 
};
