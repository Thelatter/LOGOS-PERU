{strip}
</div>
{*JQUERY*}
<script type="text/javascript" src="{$base_url}public/plugins/jquery/jquery.min.js"></script>
{*JQUERY UI*}
<script type="text/javascript" src="{$base_url}public/plugins/jquery-ui/jquery-ui.min.js"></script>
{*BOOTSTRAP*}
<script src="{$base_url}public/plugins/bootstrap/assets/js/vendor/popper.min.js"></script>
<script src="{$base_url}public/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
{*WOW ANIMATE
<script src="{$base_url}public/plugins/wow-animate/dist/wow.min.js"></script>
<script src="{$base_url}public/web/js/inicializadores-plugins/wow-animate-min.js"></script>*}
{*OWL - CAROUSEL*}
{if isset($owl_carousel)}
<script src="{$base_url}public/plugins/owlcarousel/dist/owl.carousel.min.js"></script>
<script src="{$base_url}public/web/js/inicializadores-plugins/owl-carousel-min.js"></script>
{/if}

{*Light Gallery Plugin Js*}
{if isset($light_gallery)}
<script src="{$base_url}public/plugins/light-gallery/dist/js/lightgallery-all.js"></script>
<script src="{$base_url}public/plugins/light-gallery/modules/lg-thumbnail.min.js"></script>
<script src="{$base_url}public/plugins/light-gallery/modules/lg-fullscreen.min.js"></script>
<script>
{literal}
$(document).ready(function() {
    //galleria de multimedia
    $("#gallery-multimedia").lightGallery({
        selector: 'li a '
    });
});
</script>
{/literal}
{/if}

{if isset($efectoletters)}
<!--script type="text/javascript" src="{$base_url}public/web/js/efecto-letters.js"></script-->
<script type="text/javascript" src="{$base_url}public/plugins/type_js/js/typed.js"></script>
<script src="{$base_url}public/plugins/type_js/js/tweenmax-min.js"></script>
<script type="text/javascript" src="{$base_url}public/web/js/inicializadores-plugins/initialization_type-min.js"></script>
{/if}


{if isset($mixitup_col3)}
<script src="{$base_url}public/plugins/mixitup/mixitup-min.js"></script>
<script src="{$base_url}public/web/js/inicializadores-plugins/mixitup-min.js"></script>
{/if}

{if isset($ver_mas_planes)}
<script src="{$base_url}public/web/js/inicializadores-plugins/ver_mas_planes-min.js"></script>
{/if}

{if isset($acordion_icon)}
<script src="{$base_url}public/web/js/inicializadores-plugins/acordion-icon-min.js"></script>
{/if}

{if isset($contador)}
<script src="{$base_url}public/web/js/inicializadores-plugins/contador-min.js"></script>
{/if}

{*SLICK SLIDER*}
{if isset($slick_slider)}
<script src="{$base_url}public/plugins/slick/slick.min.js"></script>
<script src="{$base_url}public/web/js/inicializadores-plugins/slick-min.js"></script>
{/if}

{*SCROLLY*}
{if isset($anclaje)}
<script src="{$base_url}public/plugins/anclaje/jquery-scrollto-min.js"></script>
<script src="{$base_url}public/plugins/anclaje/index-min.js"></script>
{/if}

{*ALERTIFY*}
<script src="{$base_url}public/plugins/alertifyJS/alertify.min.js"></script>

{if isset($slider)}
<script type="text/javascript" src="{$base_url}public/web/js/inicializadores-plugins/slider-min.js"></script>
{/if}

{*GOOGLE MAPS*}
<script src="{$base_url}public/plugins/googlemap/mygooglemap.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUruOZGZVXOsZHNwa9UckAahh_bwnOAPM&callback=initMap" async defer></script>

{*SCRIPT GENERAL*}
<script type="text/javascript" src="{$base_url}public/web/js/script-min.js"></script>
<script type="text/javascript" src="{$base_url}public/web/js/process-min.js"></script>


{if isset($redes_plugin)}
<script type="text/javascript" src="{$base_url}public/web/js/inicializadores-plugins/script_redes.js"></script>
{/if}
{if isset($jquery_counto)}
<script type="text/javascript" src="{$base_url}public/web/js/inicializadores-plugins/jquery-counto-min.js"></script>
{/if}



</body>

</html>

{/strip}