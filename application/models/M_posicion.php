<?php

require_once APPPATH.'libraries/Modelo_DB.php';

class M_posicion extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('posicion');
        parent::setId('id');
    }

    public function obtieneConsulta() {
        $this->ci->db->select("posicion.id,posicion.nombre,posicion.url,posicion.interna_id,posicion.fecha_registro,posicion.fecha_modificacion,posicion.usuario_id,posicion.oculto");
        $this->ci->db->from($this->tabla . " posicion");
    }
  
}
