<?php
require_once APPPATH.'libraries/Modelo_DB.php';

class M_producto_imagen extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('producto_imagen');
        parent::setId('id');
    }

    public function obtieneConsulta() {
        $this->ci->db->select("producto_imagen.imagen,producto_imagen.producto_id,producto_imagen.fecha_registro.producto_imagen.oculto");
        $this->ci->db->from($this->tabla . " producto_imagen");
    }

   
}