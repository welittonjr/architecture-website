/*
  Autor: Wellington Junior
  GitHub: welitto.jr
  Date: 12/02/24 14:44
  Description: Animações para o Site
*/

let sectionService = document.getElementById("service");
let animationAddedService = false;

window.onscroll = () => {
  let top = window.scrollY;
  let offset = sectionService.offsetTop - 900;
  let height = sectionService.offsetHeight;

  if (top >= offset && top < offset + height && !animationAddedService) {
    sectionService.classList.add("animation-slide-in");
    animationAddedService = true;
  }

};
