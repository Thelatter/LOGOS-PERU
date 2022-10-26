<?php

require_once APPPATH.'libraries/Modelo_DB.php';

class M_pregunta extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('pregunta');
        parent::setId('id');
    }

    public function obtieneConsulta() {
        $this->ci->db->select("pregunta.id,pregunta.tema_id,pregunta.descripcion,pregunta.posicion,pregunta.posicion,pregunta.fecha_registro,pregunta.fecha_modificacion,pregunta.usuario_id,pregunta.oculto");
        $this->ci->db->from($this->tabla . " pregunta");
    }

   
}
