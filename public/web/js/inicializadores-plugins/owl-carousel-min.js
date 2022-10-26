$('.caracteristicas').owlCarousel({
    loop: true,
    margin:30,
    nav: false,
    dots: false,
    responsive:{
        0:{
            items:1
        },
        700:{
            items:2
        },
        1000:{
            items:3
        }
    },
    autoplay: false,
    autoplayTimeout: 4000,
    touchDrag: false,
    mouseDrag: false,
    autoplayHoverPause: true
});

$('.caracteristifdsfs').owlCarousel({
    loop: true,
    margin:30,
    nav: false,
    dots: true,
    navText: ["<i class='material-icons'>keyboard_arrow_left</i>","<i class='material-icons'>keyboard_arrow_right</i>"],
    items: 1,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true
});

$('.owl-actividades').owlCarousel({
    loop: true,
    margin: 20,
    nav: false,
    dots: true,
    responsive:{
        0:{
            items:1
        },
        700:{
            items:2
        },
        1000:{
            items:3
        }
    },
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true
});