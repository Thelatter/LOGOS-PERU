<?php

require_once APPPATH.'libraries/Modelo_DB.php';

class M_interna extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('interna');
        parent::setId('id');
    }

    public function obtieneConsulta() {
        $this->ci->db->select("interna.id,interna.nombre,interna.url,interna.fecha_registro,interna.fecha_modificacion,interna.posicion,interna.usuario_id,interna.oculto");
        $this->ci->db->from($this->tabla . " interna");
    }

   
}
