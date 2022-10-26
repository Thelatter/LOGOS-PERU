/*dauyR2IvUEk)sk]*/
/*global NaN */

$(document).ready(function(){
  if (screen.width<450) {
    $("#myModal").modal('hide');
  };
  if (screen.width>300) {
    $("#myModal").modal("show");
    setTimeout(function(){
    $('#myModal').modal('hide')
    }, 30000);
  };
});


/*IR A UNA SECCIÓN SUAVEMENTE
$(function(){
     $('a[href*=#]').click(function() {
     if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
         && location.hostname == this.hostname) {
             var $target = $(this.hash);
             $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
             if ($target.length) {
                 var targetOffset = $target.offset().top;
                 $('html,body').animate({scrollTop: targetOffset}, 1000);
                 return false;
            }
       }
   });
});*/

$(document).ready(function(){
    //DROPDOWN 1
    $("#li_dropdown1 .sub-menu-toggle").click(function(){
        $("#li_dropdown1 .list_dropdown_mobile").slideToggle();
        $("#li_dropdown1").toggleClass("menu_active");
    });

    $("#li_dropdown2 .sub-menu-toggle").click(function(){
        $("#li_dropdown2 .list_dropdown_mobile").slideToggle();
        $("#li_dropdown2").toggleClass("menu_active");
    });
});

// BOTON MENU
$('#main-over1').click(function() {
    $('.mybar-ceallto').toggleClass('menu--open1');
    $('#page-top').toggleClass('uk-overflow-hidden');
    $('.zopim').toggleClass('zopimnone');
    /*$("body").css({"overflow":"hidden"});*/
});

/* MENU */
$('#main-over1').click(function() {
    $(this).toggleClass('activemain');
    $(this).toggleClass('is-active');
    $('#navhead1').toggleClass('openme');
});


//MENU FLOAT
jQuery(document).ready(function() {
    // define variables
    var navOffset, scrollPos = 0;
    // function to run on page load and window resize
    function stickyUtility() {
        // only update navOffset if it is not currently using fixed position
        if (!jQuery(".navbar_main").hasClass("head-navfixed")) {
            navOffset = jQuery(".navbar_main").offset().top;
        }
        // apply matching height to nav wrapper div to avoid awkward content jumps
        jQuery(".eonav-cntfluid").height(jQuery(".navbar_main").outerHeight());

    } // end stickyUtility function
    // run on page load
    stickyUtility();
    // run on window resize
    jQuery(window).resize(function() {
        stickyUtility();
    });

    // run on scroll event
    jQuery(window).scroll(function() {
        scrollPos = jQuery(window).scrollTop();

        if (scrollPos >= navOffset) {
            jQuery(".navbar_main").addClass("head-navfixed");
        } else {
            jQuery(".navbar_main").removeClass("head-navfixed");
        }
    });
});


//MENU FLOAT
jQuery(document).ready(function() {
    // define variables
    var navOffset, scrollPos = 0;
    // function to run on page load and window resize
    function stickyUtility() {
        // only update navOffset if it is not currently using fixed position
        if (!jQuery(".mybar-celnavbar").hasClass("head-navfixed")) {
            navOffset = jQuery(".mybar-celnavbar").offset().top;
        }
        // apply matching height to nav wrapper div to avoid awkward content jumps
        jQuery(".mybar-ceallto").height(jQuery(".mybar-celnavbar").outerHeight());
        
    } // end stickyUtility function
    // run on page load
    stickyUtility();
    // run on window resize
    jQuery(window).resize(function() {
        stickyUtility();
    });
    // run on scroll event
});
/* MENU ANTIGUO

/*--------------IR ARRIBA----------------*/
$(document).ready(function(){
    $('.ir-arriba').click(function(){
        $('body, html').animate({
            scrollTop: '0px'
        }, 300);
    });
    $(window).scroll(function(){
        if( $(this).scrollTop() > 0 ){
            $('.ir-arriba').slideDown(300);
        } else {
            $('.ir-arriba').slideUp(300);
        }
    });
});

/*------------END IR ARRIBA-------------*/

/*LIGHT GALLERY

$(document).ready(function() {
    $("#lightgallery").lightGallery({
        selector: 'div a '
    }); 

    $ ('#aniimated-thumbnials'). lightGallery ({
        selector: 'div a ',
        youtubePlayerParams: {
            modestbranding: 1,
            showinfo: 0,
            rel: 0,
            controls: 0
        },
        vimeoPlayerParams: {
            byline : 0,
            portrait : 0,
            color : 'A90707'     
        }
    }); 
});*/



/*OWL CAROUSEL*/
$('.owl_phrases').owlCarousel({
    loop:true,
    nav:false,
    dots:false,
    margin:0,
    responsiveClass:true,
    items:1,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true
});

