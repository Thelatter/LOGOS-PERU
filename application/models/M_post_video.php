<?php
require_once APPPATH . 'libraries/Modelo_DB.php';

class M_post_video extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('post_video');
        parent::setAlias('post_video');
        parent::setTabla_id('id');

        $this->CI->config->load('exportando', TRUE, TRUE);
    }

    public function get_query() {
        $this->CI->db->select("post_video.id,post_video.titulo,post_video.url,post_video.enlace,post_video.fecha_registro,post_video.fecha_modificacion,post_video.empleado_id,post_video.empleado_id,post_video.oculto");
        $this->CI->db->from($this->tabla . " post_video");
        $this->CI->db->order_by("post_video.id", "desc");
    }

   


}

