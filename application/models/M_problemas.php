<?php
require_once APPPATH.'libraries/Modelo_DB.php';

class M_problemas extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('problemas');
        parent::setId('id');
    }

    public function obtieneConsulta() {
        $this->ci->db->select("problemas.id,problemas.titulo,problemas.url,problemas.fecha_registro,problemas.fecha_modificacion,problemas.usuario_id,problemas.posicion,problemas.oculto");
        $this->ci->db->from($this->tabla . " problemas");
    }

   
}