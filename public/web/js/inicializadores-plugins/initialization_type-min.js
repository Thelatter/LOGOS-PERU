$(function(){
    $(".typed_caption_slide").typed({
        strings: ["Escuela de Vida","Hoy Quiero un Cambio","Aprendiendo a Vivir Sin Ti","Yo Sí Puedo"],
        typeSpeed: 50,
        backDelay: 3000,
        loop: true,
        // defaults to false for infinite loop
        loopCount: false,
        callback: function(){ foo(); }
    });
    function foo(){ console.log("Callback"); }
});