<?php /* Smarty version 3.1.27, created on 2018-05-22 20:05:38
         compiled from "C:\wamp\www\Proyectos\Web_Administrable\DAUPERU\versiones\DauPeru_Vnew1\application\views\web\estructura\inter_header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:233375b0478120dfb65_37202856%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8aa329a2919b7272a91e986cb1db3d436e3364ea' => 
    array (
      0 => 'C:\\wamp\\www\\Proyectos\\Web_Administrable\\DAUPERU\\versiones\\DauPeru_Vnew1\\application\\views\\web\\estructura\\inter_header.tpl',
      1 => 1527019536,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '233375b0478120dfb65_37202856',
  'variables' => 
  array (
    'base_url' => 0,
    'home_active' => 0,
    'dau_Active' => 0,
    'revista_active' => 0,
    'multimedia_active' => 0,
    'menu_active' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5b04781220b197_01138561',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b04781220b197_01138561')) {
function content_5b04781220b197_01138561 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '233375b0478120dfb65_37202856';
?>
<body id="page-top" class=""><header class="navigation-allgs"><div class="eonav-cntfluid"><div class="content_navbar"><nav class="navbar_main"><div class="container"><div class="navbar_flex navbar_desk"><div class="logo_main"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
home"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/img/logo/logo-bl-bicelado.png" width="100%" alt="DAU PERÚ - Escuela de vida" title="DAU PERÚ - Escuela de vida" class="logo_bl"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/img/logo/logo-bicelado.png" width="100%" alt="DAU PERÚ - Escuela de vida" title="DAU PERÚ - Escuela de vida" class="logo_col"></a></div><div class="menu_pestanas"><div class="top_menu_pestana"><ul class="list_info_top_pestana"><li><a href="tel:012529639"><span class="fa fa-phone"></span> 252-9639</a></li><li><a href="mailto:info@dauperu.com"><span class="fa fa-envelope"></span> info@dauperu.com</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
trabaja_nosotros" class="btn_campus">TRABAJA CON NOSOTROS</a></li></ul></div><ul class="list_nav"><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
home" class="<?php if (isset($_smarty_tpl->tpl_vars['home_active']->value)) {?>active<?php }?>">INICIO<span>VISÍTANOS</span></a></li><li><a href="#" class="<?php if (isset($_smarty_tpl->tpl_vars['dau_Active']->value)) {?>active<?php }?>">GRUPO DAU<span>CONÓCENOS</span></a><ul class="drop-up"><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
nosotros">Nosotros</a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
organizacion">Organización</a></li></ul></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
revista" class="<?php if (isset($_smarty_tpl->tpl_vars['revista_active']->value)) {?>active<?php }?>">REVISTA<span>INFORMACIÓN</span></a></li><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
canal-multimedia" class="<?php if (isset($_smarty_tpl->tpl_vars['multimedia_active']->value)) {?>active<?php }?>">CANAL MULTIMEDIA<span>DISPONIBLES</span></a></li><li><a href="http://www.campusvirtual-logoterapia.com/home/" target="_blank" class="<?php if (isset($_smarty_tpl->tpl_vars['menu_active']->value)) {?>active<?php }?>">CAMPUS VIRTUAL<span>ALUMNOS</span></a></li><li><a href="http://www.campusvirtual-logoterapia.com/home/" class="<?php if (isset($_smarty_tpl->tpl_vars['menu_active']->value)) {?>active<?php }?>">TIENDA VIRTUAL<span>COMPRA</span></a></li></ul></div></div><div class="navbar_mobile"><div class="menu_hamburguer"><span class="mobile-btn"></span></div><div class="logo_mobile"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
home"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/img/logo/logo.png" width="100%" alt="DAU PERÚ - Escuela de vida" title="DAU PERÚ - Escuela de vida"></a></div></div></div></nav></div></div></header><header><aside class="sect_asider_menu" id="aside_mobile"><nav><div class="nav_head"></div><div class="nav_body"><ul id="accordion" class="accordion"><li><div class="link"><i class="fa fa-home"></i>INICIO</div></li><li><div class="link"><i class="fa fa-users"></i>NOSOTROS<i class="fa fa-chevron-down"></i></div><ul class="submenu"><li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
nosotros">Nosotros</a></li><li><a href="#">Organización</a></li></ul></li><li><div class="link"><i class="fa fa-child"></i>LOGOTERAPIA</div></li><li><div class="link"><i class="fa fa-plus-square"></i>TANATOLOGÍA</div></li><li><div class="link"><i class="fa fa-video-camera"></i>MULTIMEDIA</div></li><li><div class="link"><i class="fa fa-envelope"></i>BOLETÍN</div></li></ul></div></nav></aside></header><div class="wrapsection"><?php }
}
?>