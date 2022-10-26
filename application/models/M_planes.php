<?php

require_once APPPATH.'libraries/Modelo_DB.php';

class M_planes extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('planes');
        parent::setId('id');
    }

    public function obtieneConsulta() {
        $this->ci->db->select("planes.id,planes.titulo,planes.url,planes.rango_id,planes.usuario_id,planes.fecha_registro,planes.fecha_modificacion,planes.posicion,planes.oculto");
        $this->ci->db->from($this->tabla . " planes");
    }

}
