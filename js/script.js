var slideIndex = 1;
var timer = null;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("slide-box");
    let dots = document.getElementsByClassName("slide-dot");

    clearTimeout(timer);

    if (n == undefined) n = ++slideIndex
    if (n >= (slides.length + 1)) slideIndex = 1;
    if (n < 1) slideIndex = slides.length;

    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" slide-dot-active", "");
    }

    slides[slideIndex-1].style.display = "flex";
    dots[slideIndex-1].className += " slide-dot-active";
    timer = setTimeout(showSlides, 5000);
}

function openMenu() {
    document.getElementById("navbar").style.display = "flex";
}

function closeMenu() {
    document.getElementById("navbar").style.display = "none";
}