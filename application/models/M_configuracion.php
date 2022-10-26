<?php

require_once APPPATH.'libraries/Modelo_DB.php';

class M_configuracion extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('configuracion');
        parent::setId('id');
    }

    public function obtieneConsulta() {
        $this->ci->db->select("configuracion.id,configuracion.interna,configuracion.atributos");
        $this->ci->db->from($this->tabla . " configuracion");
        $this->ci->db->order_by("configuracion.id", "desc");
    }

   
}
