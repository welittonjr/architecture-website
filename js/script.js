// rolar para baixo 20px da parte superior do documento, mostre o botão
window.onscroll = function () {
    scrollFunction(),
    effectBgMenuTop()
};

// event para abrir o menu mobile
delegate(document, "click", "#open-menu", () => {
    document.getElementById("navbar").style.display = "flex";
});
// event para fechar menu mobile
delegate(document, "click", "#close-menu", () => {
    document.getElementById("navbar").style.display = "none";
});
// event para slide anterior
delegate(document, "click", "#slide-prev", () => plusSlides(-1));
// event para próximo slide
delegate(document, "click", "#slide-next", () => plusSlides(1));
// event para voltar ao top do site
delegate(document, "click", "#scroll-top", () => scrollBackTop());



// ===========================================
// scritps slide-show
// ===========================================

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

    slides[slideIndex - 1].style.display = "flex";
    dots[slideIndex - 1].className += " slide-dot-active";
    timer = setTimeout(showSlides, 5000);
}

// ===========================================
// scritps backgroud effects
// ===========================================
function effectBgMenuTop() {
    if (
        document.body.scrollTop > 100 ||
        document.documentElement.scrollTop > 100
    ) {
        addClass("menu-top", "menu-bg");
    } else {
        delClass("menu-top", "menu-bg");
    }
}


// ===========================================
// scritps scroll-top
// ===========================================

function scrollFunction() {

    if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
    ) {
        addCss('#scroll-top', {
            'display': 'flex'
        })
    } else {
        addCss('#scroll-top', {
            'display': 'none'
        })
    }
}

// role até o topo do documento
function scrollBackTop() {
    document.body.scrollTop = 0; // Safari
    document.documentElement.scrollTop = 0; // Chrome, Firefox, IE e Opera
}

// ===========================================
// scritps utilitarios
// ===========================================

// função generica para eventlistener
function delegate(el, evt, sel, handler) {
    el.addEventListener(evt, function (event) {
        var t = event.target;
        while (t && t !== this) {
            if (t.matches(sel)) {
                handler.call(t, event);
            }
            t = t.parentNode;
        }
    });
}

// função para adicionar class a um elemento
function addClass(id, classe) {
    let elemento = document.getElementById(id);
    let classes = elemento.className.split(' ');
    let getIndex = classes.indexOf(classe);

    if (getIndex === -1) {
        classes.push(classe);
        elemento.className = classes.join(' ');
    }
}

// função para remove class de um elemento
function delClass(id, classe) {
    let elemento = document.getElementById(id);
    let classes = elemento.className.split(' ');
    let getIndex = classes.indexOf(classe);

    if (getIndex > -1) {
        classes.splice(getIndex, 1);
    }
    elemento.className = classes.join(' ');
}

// função para adicionar class a um css
function addCss(el, style) {
    let element = document.querySelector(el);
    for (const property in style)
        element.style[property] = style[property];
}