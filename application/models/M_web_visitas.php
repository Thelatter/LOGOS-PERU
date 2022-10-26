<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_web_visitas extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('web_visitas');
        parent::setAlias('web_visitas');
        parent::setTabla_id('id');
    }

    public function get_query() {
        $this->CI->db->select("web_visitas.id,web_visitas.usuario,web_visitas.agente,web_visitas.direccion_ip,web_visitas.visita,web_visitas.descripcion_id,web_visitas.descripcion,web_visitas.fecha_registro,web_visitas.fecha_activo");
        $this->CI->db->from($this->tabla . " web_visitas");
        $this->CI->db->order_by('web_visitas.id', 'desc');
    }


}
