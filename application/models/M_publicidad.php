<?php

require_once APPPATH.'libraries/Modelo_DB.php';

class M_publicidad extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('publicidad');
        parent::setId('id');
    }

    public function obtieneConsulta() {
        $this->ci->db->select("publicidad.id,publicidad.nombre,publicidad.url,publicidad.imagen,publicidad.cliente_id,publicidad.interna_id,publicidad.planes_id,publicidad.posicion_id,publicidad.fecha_registro,publicidad.fecha_modificacion,publicidad.fecha_destacado,publicidad.fecha_publicacion,publicidad.fecha_finalizacion,publicidad.publicacion,publicidad.destacado,publicidad.oculto");
        $this->ci->db->from($this->tabla . " publicidad");
    }

}
