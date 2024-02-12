let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides((slideIndex += n));
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("deposition");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length || n == slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "inline-block";
  slides[slideIndex].style.display = "inline-block";
  dots[slideIndex - 1].className += " active";

  setTimeout(function () {
    console.log("Olá mundo");
    showSlides((slideIndex += 1));
  }, 5000);
}

// let touchStartX = 0;
// let touchEndX = 0;

// document.getElementById("depositions").addEventListener("touchstart", (e) => {
//   touchStartX = e.changedTouches[0].screenX;
// });

// document.getElementById("depositions").addEventListener("touchend", (e) => {
//   touchEndX = e.changedTouches[0].screenX;
//   handleSwipe();
// });

// function handleSwipe() {
//   const threshold = 50; // ajuste conforme necessário

//   if (touchEndX < touchStartX - threshold) {
//     plusSlides(1); // deslizar para a direita
//   } else if (touchEndX > touchStartX + threshold) {
//     plusSlides(-1); // deslizar para a esquerda
//   }
// }

document.addEventListener("DOMContentLoaded", function () {
  const openModalBtn = document.getElementById("openModalBtn");
  const modalContainer = document.getElementById("modalContainer");
  const closeModalBtn = document.getElementById("closeModalBtn");

  openModalBtn.addEventListener("click", function () {
    modalContainer.style.display = "flex";
  });

  closeModalBtn.addEventListener("click", function () {
    modalContainer.style.display = "none";
  });

  // Fechar modal clicando fora do conteúdo
  modalContainer.addEventListener("click", function (event) {
    if (event.target === modalContainer) {
      modalContainer.style.display = "none";
    }
  });
});


