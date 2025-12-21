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





// Type Animation JS

const texts = ["Full-Stack Developer ", "Specialized in React & WordPress", "WooCommerce Developer","WordPress Expert","Django Developer"];
let textIndex = 0;
let charIndex = 0;
let isDeleting = false;

const typeSpeed = 60;
const deleteSpeed = 40;
const delay = 600;

const el = document.getElementById("typewriter");

function typeEffect() {
  const currentText = texts[textIndex];

  if (!isDeleting && charIndex < currentText.length) {
    el.textContent += currentText.charAt(charIndex);
    charIndex++;
    setTimeout(typeEffect, typeSpeed);
  } 
  else if (isDeleting && charIndex > 0) {
    el.textContent = currentText.substring(0, charIndex - 1);
    charIndex--;
    setTimeout(typeEffect, deleteSpeed);
  } 
  else if (!isDeleting && charIndex === currentText.length) {
    isDeleting = true;
    setTimeout(typeEffect, delay);
  } 
  else if (isDeleting && charIndex === 0) {
    isDeleting = false;
    textIndex = (textIndex + 1) % texts.length;
    setTimeout(typeEffect, typeSpeed);
  }
}

typeEffect();

