<?php

require_once APPPATH.'libraries/Modelo_DB.php';

class M_visita_web extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('visita_web');
        parent::setId('id');
    }

    public function obtieneConsulta() {
        $this->ci->db->select("visita_web.id,visita_web.usar_id,visita_web.ip_direccion,visita_web.url_web,visita_web.visita,visita_web.fecha_registro,visita_web.oculto");
        $this->ci->db->from($this->tabla . " visita_web");
    }

   
}
