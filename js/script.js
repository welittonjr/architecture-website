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

