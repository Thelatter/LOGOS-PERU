<?php
require_once APPPATH.'libraries/Modelo_DB.php';

class M_producto extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('producto');
        parent::setId('id');
    }


    public function obtieneConsulta() {
        $this->ci->db->select("producto.id,producto.titulo,producto.descripcion,producto.caracteristica,producto.url,producto.precio,producto.stock,producto.imagen,producto.categoria_id,producto.subcategoria_id,producto.cliente_id,producto.fecha_registro,producto.fecha_modificacion,producto.fecha_destacado,producto.posicion,producto.destacado,producto.oculto");
        $this->ci->db->from($this->tabla . " producto");
    }

}

