<?php
require_once APPPATH . 'libraries/Modelo_DB.php';
class M_contacto extends Modelo_DB {
    public function __construct() {
        parent::__construct();
        parent::setTabla('contacto');
        parent::setAlias('c');
        parent::setTabla_id('id');
    }

    public function get_query() {
        $this->CI->db->select("c.id, c.nombre,c.correo,c.telefono,c.mensaje,c.fecha_registro,c.oculto,c.asunto");
        $this->CI->db->from($this->tabla . " c");
        $this->CI->db->order_by("c.id", "desc");
    }

}
