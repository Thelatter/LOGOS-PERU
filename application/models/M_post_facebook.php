<?php
require_once APPPATH . 'libraries/Modelo_DB.php';

class M_post_facebook extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('post_facebook');
        parent::setAlias('post_facebook');
        parent::setTabla_id('id');

        $this->CI->config->load('exportando', TRUE, TRUE);
    }

    public function get_query() {
        $this->CI->db->select("post_facebook.id,post_facebook.titulo,post_facebook.alt,post_facebook.url,post_facebook.imagen,post_facebook.ruta,post_facebook.fecha_registro,
        	post_facebook.fecha_modificacion,post_facebook.oculto,post_facebook.empleado_id");
        $this->CI->db->from($this->tabla . " post_facebook");
        $this->CI->db->order_by("post_facebook.id", "desc");
    }

   


}

