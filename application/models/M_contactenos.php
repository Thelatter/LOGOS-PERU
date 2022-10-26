<?php

require_once APPPATH.'libraries/Modelo_DB.php';

class M_contactenos extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('contactenos');
        parent::setId('id');
    }

    public function obtieneConsulta() {
        $this->ci->db->select("contactenos.id,contactenos.nombre,contactenos.correo,contactenos.descripcion,contactenos.adjunto,contactenos.problema_id,contactenos.fecha_registro,contactenos.fecha_modificacion,contactenos.estado,contactenos.posicion,contactenos.usuario_id,contactenos.oculto");
        $this->ci->db->from($this->tabla . " contactenos");
    }

   
}
