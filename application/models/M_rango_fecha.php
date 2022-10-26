<?php
require_once APPPATH.'libraries/Modelo_DB.php';

class M_rango_fecha extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('rango_fecha');
        parent::setId('id');
    }

    public function obtieneConsulta() {
        $this->ci->db->select("rango_fecha.id,rango_fecha.nombre,rango_fecha.url,rango_fecha.valor,rango_fecha.fecha_registro,rango_fecha.fecha_modificacion,rango_fecha.usuario_id,rango_fecha.posicion,rango_fecha.oculto");
        $this->ci->db->from($this->tabla . " rango_fecha");
    }
     
}