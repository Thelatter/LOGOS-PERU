<?php

require_once APPPATH.'libraries/Modelo_DB.php';

class M_tema extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('tema');
        parent::setId('id');
    }

    public function obtieneConsulta() {
        $this->ci->db->select("tema.id,tema.titulo,tema.url,tema.fecha_registro,tema.fecha_modificacion,tema.posicion,tema.usuario_id,tema.oculto");
        $this->ci->db->from($this->tabla . " tema");
    }

   
}
