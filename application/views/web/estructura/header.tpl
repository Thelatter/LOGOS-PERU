{strip}
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<html lang="es">
    <head>
        <title>{$titulo_red}</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1,requiresActiveX=true" />
        {*<meta name="KeyWords" content="Diseño de Logotipos, logos, logo, logotipos, servicios de logos, Diseño Gráfico, logo design, make a logo, design a logo, how to design a logo" />*}
        <meta name="KeyWords" content="Diseño de Logotipos, logos , logotipos, servicios de logos, Diseño Gráfico" />
        <meta name="author" content="Logos Perú" />
        <!--<meta name="description" content="Transporte Marver - Transporte de personal en Lima Perú, Turismo" />-->
        <meta name="description" content="{if isset($page_content)}{$page_content}{/if}" />
        <meta name="google-site-verification" content="ArM228JvRbNQMDmfw-YqBKFL0fWhFKIIgSMuB5sr75I" />
        <meta name="msvalidate.01" content="A01D8EBEAA551809606CCFFE234E6DF5" />
        {*META*}
        {*<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />*}
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="GENERATOR" content="Microsoft FrontPage 4.0" />
        <meta name="DC.Identifier" content="index.html" />
        <meta name="DC.Language" SCHEME="RFC1766" content="SPANISH" />
        <meta name="distribution" content="all">
        <meta name="VW96.objecttype" content="Homepage" />
        <meta name="resource-type" content="Homepage" />
        <meta name="Revisit" content="1 days" />
        <meta name="robots" content="index,follow" />
        <meta name="GOOGLEBOT" content="index follow" />
        <meta name="Revisit" content="1 days" /> 
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Cache-Control" content="no-cache" />
        <meta name="ROBOTS" content="ALL" />
        <meta name="ProgId" content="FrontPage.Editor.Document" />

        {* METAS PARA FACEBOOK *}
        <meta property="fb:admins" content="129856497709093" />
        <meta property="article:publisher" content="https://www.facebook.com/DLogosPeru/" />
        <meta property="og:type" content="article" />
        <meta property="og:site_name" content="Logos Perú" />
        <meta property="og:title" content="{if isset($titulo_red)}{$titulo_red}{/if}" />
        <meta property="og:description" content="{if isset($page_content)}{$page_content}{/if}"/>
        <meta property="og:image" content="{if isset($url_imagen)}{$url_imagen}{/if}"/>
        <meta property="og:url" content="{if isset($url_noticia)}{$url_noticia}{/if}"/>



        {*METAS PARA TWITTER*}

        <meta name="twitter:site" content="@DLogosPeru">
        <meta name="twitter:title" content="{if isset($titulo_red)}{$titulo_red}{/if}">
        <meta name="twitter:description" content="{if isset($page_content)}{$page_content}{/if}">
        <meta name="twitter:creator" content="@DLogosPeru">
        <meta name="twitter:image" content="{if isset($url_imagen)}{$url_imagen}{/if}">
        <meta name="theme-color" content="#e7000b">
        
        <!-- All in One SEO Pack 2.3.9.2 by Michael Torbert of Semper Fi Web Design[634,736] -->
        <script type="application/ld+json">
                {
                  "@context": "http://schema.org",
                  "@type": "WebSite",         "name": "Logos Perú",          "url": "https://logosperu.com/"
                }
        </script>
        <link rel="alternate" href="" hreflang="es" />
        <link rel="canonical" href="" />
        <link rel="icon" href="{$base_url}public/img/logo/favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="{$base_url}public/img/logo/favicon.ico" type="image/x-icon" />
        <script> var base_url = "{$base_url}";</script>
        
        <link rel="apple-touch-icon" href="{$base_url}public/img/logo/favicon.ico" />
        {*FUENTES*} 
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" type="text/css"/>
        {*FONT AWESOME*} 
        <link rel="stylesheet" href="{$base_url}public/plugins/font-awesome/css/font-awesome.min.css" type="text/css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" type="text/css" />
        {*Bootstrap Core CSS*}
        <link rel="stylesheet" href="{$base_url}public/plugins/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="{$base_url}public/plugins/animate/animate-min.css" type="text/css" />
        
        {*OWL CAROUSEL*}
        {if isset($owl_carousel)}
        <link rel="stylesheet" href="{$base_url}public/plugins/owlcarousel/dist/assets/owl.carousel.min.css" type="text/css" />
        <link rel="stylesheet" href="{$base_url}public/plugins/owlcarousel/dist/assets/owl.theme.default.min.css" type="text/css" />
        {/if}

        {if isset($mixitup_col3)}
        <link href="{$base_url}public/plugins/mixitup/style-min.css" rel="stylesheet" type="text/css" />
        {/if}

        {*Light Gallery Plugin Js*}
        {if isset($light_gallery)}
        <link href="{$base_url}public/plugins/light-gallery/dist/css/lightgallery.css" rel="stylesheet">
        {/if}

        {*SLICK SLIDER*}
        {if isset($slick_slider)}
        <link href="{$base_url}public/plugins/slick/slick.css" rel="stylesheet">
        {/if}

        {*ALERTIFY*}
        <link href="{$base_url}public/plugins/alertifyJS/css/alertify.min.css" rel="stylesheet" type="text/css" />
        <link href="{$base_url}public/plugins/alertifyJS/css/themes/default-min.min.css" rel="stylesheet" type="text/css" />
        <link href="{$base_url}public/plugins/alertifyJS/css/themes/semantic-min.min.css" rel="stylesheet" type="text/css" />

        {*Estilos Css*}
        <link rel="stylesheet" href="{$base_url}public/web/css/estructura/menu_style-min.css" type="text/css" />
        {*ESTILOS INTERNAS*}
        <link rel="stylesheet" href="{$base_url}public/web/css/internas/{if isset($css_interna)}{$css_interna}{/if}" type="text/css" />

        
    </head>
{/strip}