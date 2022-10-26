<?php /* Smarty version 3.1.27, created on 2022-10-26 17:18:54
         compiled from "C:\xampp\htdocs\application\views\web\estructura\header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:180344012563594fded1d2e6_34792739%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8c352296a66cec3ee7946666a6fd952c6bbb5ab' => 
    array (
      0 => 'C:\\xampp\\htdocs\\application\\views\\web\\estructura\\header.tpl',
      1 => 1529092832,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180344012563594fded1d2e6_34792739',
  'variables' => 
  array (
    'titulo_red' => 0,
    'page_content' => 0,
    'url_imagen' => 0,
    'url_noticia' => 0,
    'base_url' => 0,
    'owl_carousel' => 0,
    'mixitup_col3' => 0,
    'light_gallery' => 0,
    'slick_slider' => 0,
    'css_interna' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_63594fdedbe3e1_94829299',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_63594fdedbe3e1_94829299')) {
function content_63594fdedbe3e1_94829299 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '180344012563594fded1d2e6_34792739';
?>
<!DOCTYPE html><!--To change this license header, choose License Headers in Project Properties.To change this template file, choose Tools | Templatesand open the template in the editor.--><html lang="es"><head><title><?php echo $_smarty_tpl->tpl_vars['titulo_red']->value;?>
</title><meta charset="UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1,requiresActiveX=true" /><meta name="KeyWords" content="Diseño de Logotipos, logos , logotipos, servicios de logos, Diseño Gráfico" /><meta name="author" content="Logos Perú" /><!--<meta name="description" content="Transporte Marver - Transporte de personal en Lima Perú, Turismo" />--><meta name="description" content="<?php if (isset($_smarty_tpl->tpl_vars['page_content']->value)) {
echo $_smarty_tpl->tpl_vars['page_content']->value;
}?>" /><meta name="google-site-verification" content="ArM228JvRbNQMDmfw-YqBKFL0fWhFKIIgSMuB5sr75I" /><meta name="msvalidate.01" content="A01D8EBEAA551809606CCFFE234E6DF5" /><meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"><meta name="GENERATOR" content="Microsoft FrontPage 4.0" /><meta name="DC.Identifier" content="index.html" /><meta name="DC.Language" SCHEME="RFC1766" content="SPANISH" /><meta name="distribution" content="all"><meta name="VW96.objecttype" content="Homepage" /><meta name="resource-type" content="Homepage" /><meta name="Revisit" content="1 days" /><meta name="robots" content="index,follow" /><meta name="GOOGLEBOT" content="index follow" /><meta name="Revisit" content="1 days" /><meta http-equiv="Pragma" content="no-cache" /><meta http-equiv="Cache-Control" content="no-cache" /><meta name="ROBOTS" content="ALL" /><meta name="ProgId" content="FrontPage.Editor.Document" /><meta property="fb:admins" content="129856497709093" /><meta property="article:publisher" content="https://www.facebook.com/DLogosPeru/" /><meta property="og:type" content="article" /><meta property="og:site_name" content="Logos Perú" /><meta property="og:title" content="<?php if (isset($_smarty_tpl->tpl_vars['titulo_red']->value)) {
echo $_smarty_tpl->tpl_vars['titulo_red']->value;
}?>" /><meta property="og:description" content="<?php if (isset($_smarty_tpl->tpl_vars['page_content']->value)) {
echo $_smarty_tpl->tpl_vars['page_content']->value;
}?>"/><meta property="og:image" content="<?php if (isset($_smarty_tpl->tpl_vars['url_imagen']->value)) {
echo $_smarty_tpl->tpl_vars['url_imagen']->value;
}?>"/><meta property="og:url" content="<?php if (isset($_smarty_tpl->tpl_vars['url_noticia']->value)) {
echo $_smarty_tpl->tpl_vars['url_noticia']->value;
}?>"/><meta name="twitter:site" content="@DLogosPeru"><meta name="twitter:title" content="<?php if (isset($_smarty_tpl->tpl_vars['titulo_red']->value)) {
echo $_smarty_tpl->tpl_vars['titulo_red']->value;
}?>"><meta name="twitter:description" content="<?php if (isset($_smarty_tpl->tpl_vars['page_content']->value)) {
echo $_smarty_tpl->tpl_vars['page_content']->value;
}?>"><meta name="twitter:creator" content="@DLogosPeru"><meta name="twitter:image" content="<?php if (isset($_smarty_tpl->tpl_vars['url_imagen']->value)) {
echo $_smarty_tpl->tpl_vars['url_imagen']->value;
}?>"><meta name="theme-color" content="#e7000b"><!-- All in One SEO Pack 2.3.9.2 by Michael Torbert of Semper Fi Web Design[634,736] --><?php echo '<script'; ?>
 type="application/ld+json">{"@context": "http://schema.org","@type": "WebSite",         "name": "Logos Perú",          "url": "https://logosperu.com/"}<?php echo '</script'; ?>
><link rel="alternate" href="" hreflang="es" /><link rel="canonical" href="" /><link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/img/logo/favicon.ico" type="image/x-icon" /><link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/img/logo/favicon.ico" type="image/x-icon" /><?php echo '<script'; ?>
> var base_url = "<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
";<?php echo '</script'; ?>
><link rel="apple-touch-icon" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/img/logo/favicon.ico" /><link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" type="text/css"/><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/font-awesome/css/font-awesome.min.css" type="text/css" /><link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" type="text/css" /><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/bootstrap/dist/css/bootstrap.min.css" type="text/css" /><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/animate/animate-min.css" type="text/css" /><?php if (isset($_smarty_tpl->tpl_vars['owl_carousel']->value)) {?><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/owlcarousel/dist/assets/owl.carousel.min.css" type="text/css" /><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/owlcarousel/dist/assets/owl.theme.default.min.css" type="text/css" /><?php }
if (isset($_smarty_tpl->tpl_vars['mixitup_col3']->value)) {?><link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/mixitup/style-min.css" rel="stylesheet" type="text/css" /><?php }
if (isset($_smarty_tpl->tpl_vars['light_gallery']->value)) {?><link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/light-gallery/dist/css/lightgallery.css" rel="stylesheet"><?php }
if (isset($_smarty_tpl->tpl_vars['slick_slider']->value)) {?><link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/slick/slick.css" rel="stylesheet"><?php }?><link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/alertifyJS/css/alertify.min.css" rel="stylesheet" type="text/css" /><link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/alertifyJS/css/themes/default-min.min.css" rel="stylesheet" type="text/css" /><link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/plugins/alertifyJS/css/themes/semantic-min.min.css" rel="stylesheet" type="text/css" /><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/web/css/estructura/menu_style-min.css" type="text/css" /><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/web/css/internas/<?php if (isset($_smarty_tpl->tpl_vars['css_interna']->value)) {
echo $_smarty_tpl->tpl_vars['css_interna']->value;
}?>" type="text/css" /></head><?php }
}
?>