var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("slide-box");
    if(n >= slides.length) {
        slideIndex = 1;
    } 
    if (n < 1) {
        slideIndex = slides.length;
    } 
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    console.log(n-1);
    slides[slideIndex-1].style.display = "flex";
}


function openMenu() {
    document.getElementById("navbar").style.display = "flex";
}

function closeMenu() {
    document.getElementById("navbar").style.display = "none";
}