// jQuery Ready
jQuery(document).ready(function($){

    // OWL
    $('#slider-carousel').owlCarousel({
        loop:true,
        nav:true,
        items:1
    });

    $('#banner-slider').owlCarousel({
        loop:true,
        items:1
    });

});


// ================================
// MENU SHOW / HIDE (Pure JS)
// ================================
    const icon = document.querySelector(".header-menu-icon img");
    const menu = document.querySelector(".header-menu");
    if (icon && menu) {
        icon.addEventListener("click", function () {
            menu.classList.toggle("show");
        });
    }

