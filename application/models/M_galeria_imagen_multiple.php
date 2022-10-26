<?php

require_once APPPATH . 'libraries/Modelo_DB.php';


class M_galeria_imagen_multiple extends Modelo_DB{
    public function __construct() {
        parent::__construct();
        parent::setTabla('galeria_imagen_multiple');
        parent::setAlias('galeria_imagen_multiple');
        parent::setTabla_id('id');

        $this->CI->config->load('exportando', TRUE, TRUE);
    }


    public function get_query() {
        $this->CI->db->select("galeria_imagen_multiple.id,galeria_imagen_multiple.nombre_imagen,galeria_imagen_multiple.galeria_imagen_id");
        $this->CI->db->from($this->tabla . " galeria_imagen_multiple");
        $this->CI->db->order_by("galeria_imagen_multiple.id", "asc");
    }

    
}



?>

