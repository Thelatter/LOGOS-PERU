<?php

@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");

class Page extends CI_Controller {

    private $items = array();

    public function __construct() {
        parent::__construct();
        ini_set('memory_limit', '1024M');
        ini_set('max_execution_time', 0);
        ini_set('upload_max_filesize', '200M');

        /*
         * Configuración para librerias, helpers y modelos
         */

        $library = array();
        $helper = array();
        $model = array();
        $this->load->library($library);
        $this->load->helper($helper);
        $this->load->model($model);

        /*
         * Configuración personalizada
         */

        $this->items['carpetaProyecto'] = 'web'; 
        $this->config->load('sistema', TRUE, TRUE);
        $this->items['proyecto'] = 'Plantilla Gimnasio';
        $this->items['proyectoFavicon'] = '{base_url}public/img/logo/favicon.ico';
        $this->items['proyectoPiePagina'] = '';
        $this->items['base_url'] = base_url();
    

    }


    public function home() {
        $data['titulo_red'] = 'Plantilla Gimnasio | ExportandOnline';
        /*$data['page_content'] = 'Los Diseño de Logotipos es un elemento muy importante al momento de hacer que tus clientes se identifiquen con tu empresa. Somos un Equipo Profesional de Diseño Gráfico que hacen tu logotipo final sea originales. Obtén tu diseño de logotipo de alta calidad, Incluye cambios segun el plan adquirido, Cel: 993765495.';*/
        $data['page_content'] = '';

        $data['url_imagen'] = base_url().'public/img/seo/procesocreativo.jpg';
        $data['url_noticia'] = base_url().'home';

        //css
        $data['css_interna'] = 'home-min.css';
        $data['owl_carousel'] = 'active';
        $data['home_active'] = 'active';
        $data['anclaje'] = 'active';
        $data['slider'] = 'active';
        $data['slick_slider'] = 'active';
        
        /*
         * Impresión de páginas
         */
        $data = array_merge($data, $this->items);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/pagina/home', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/footer', $data);
    }
    public function nosotros() {
        $data['titulo_red'] = 'Plantilla Gimnasio | ExportandOnline';
        /*$data['page_content'] = 'Los Diseño de Logotipos es un elemento muy importante al momento de hacer que tus clientes se identifiquen con tu empresa. Somos un Equipo Profesional de Diseño Gráfico que hacen tu logotipo final sea originales. Obtén tu diseño de logotipo de alta calidad, Incluye cambios segun el plan adquirido, Cel: 993765495.';*/
        $data['page_content'] = '';

        $data['url_imagen'] = base_url().'public/img/seo/procesocreativo.jpg';
        $data['url_noticia'] = base_url().'nosotros';

        //css
        $data['css_interna'] = 'nosotros-min.css';
        $data['home_active'] = 'active';
        
        /*
         * Impresión de páginas
         */
        $data = array_merge($data, $this->items);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/pagina/nosotros', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/footer', $data);
    }
    public function servicios() {
        $data['titulo_red'] = 'Plantilla Gimnasio | ExportandOnline';
        /*$data['page_content'] = 'Los Diseño de Logotipos es un elemento muy importante al momento de hacer que tus clientes se identifiquen con tu empresa. Somos un Equipo Profesional de Diseño Gráfico que hacen tu logotipo final sea originales. Obtén tu diseño de logotipo de alta calidad, Incluye cambios segun el plan adquirido, Cel: 993765495.';*/
        $data['page_content'] = '';

        $data['url_imagen'] = base_url().'public/img/seo/procesocreativo.jpg';
        $data['url_noticia'] = base_url().'servicios';

        //css
        $data['css_interna'] = 'servicios-min.css';
        $data['home_active'] = 'active';
        
        /*
         * Impresión de páginas
         */
        $data = array_merge($data, $this->items);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/pagina/servicios', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/footer', $data);
    }     

    public function galeria() {
        $data['titulo_red'] = 'Plantilla Gimnasio | ExportandOnline';
        /*$data['page_content'] = 'Los Diseño de Logotipos es un elemento muy importante al momento de hacer que tus clientes se identifiquen con tu empresa. Somos un Equipo Profesional de Diseño Gráfico que hacen tu logotipo final sea originales. Obtén tu diseño de logotipo de alta calidad, Incluye cambios segun el plan adquirido, Cel: 993765495.';*/
        $data['page_content'] = '';

        $data['url_imagen'] = base_url().'public/img/seo/procesocreativo.jpg';
        $data['url_noticia'] = base_url().'galeria';

        //css
        $data['css_interna'] = 'galeria-min.css';
        $data['owl_carousel'] = 'active';
        $data['mixitup_col3'] = 'active';
        $data['light_gallery'] = 'active';
        
        /*
         * Impresión de páginas
         */
        $data = array_merge($data, $this->items);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/pagina/galeria', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/footer', $data);
    } 

    public function contacto() {
        $data['titulo_red'] = 'Plantilla Gimnasio | ExportandOnline';
        $data['piePagina'] = $this->items['proyectoPiePagina'];

        //css
        $data['css_interna'] = 'contacto-min.css';
        $data['owl_carousel'] = 'active';
        $data['contacto_active'] = 'active';

        /*
         * Impresión de páginas
         */

        $data = array_merge($data, $this->items);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_header', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/pagina/contacto', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/inter_footer', $data);
        $this->smarty_tpl->view($this->items['carpetaProyecto'].'/estructura/footer', $data);
    }


}