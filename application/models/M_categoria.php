<?php

require_once APPPATH.'libraries/Modelo_DB.php';

class M_categoria extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('categoria');
        parent::setId('id');
    }

    public function obtieneConsulta() {
        $this->ci->db->select("categoria.id,categoria.titulo,categoria.imagen,categoria.url,categoria.descripcion,categoria.visita,categoria.posicion,categoria.fecha_registro,categoria.fecha_modificacion,categoria.usuario_id,categoria.destacado,categoria.oculto");
        $this->ci->db->from($this->tabla . " categoria");
    }
   
}
