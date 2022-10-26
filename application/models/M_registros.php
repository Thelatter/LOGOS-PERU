<?php

require_once APPPATH.'libraries/Modelo_DB.php';

class M_registros extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('registros');
        parent::setId('id');
    }

    public function obtieneConsulta() {
        $this->ci->db->select("registros.id,registros.idUsuario,registros.descripcion,registros.fecha_registro,registros.oculto");
        $this->ci->db->from($this->tabla . " registros");
        $this->ci->db->order_by("registros.id", "desc");
    }

   
}
