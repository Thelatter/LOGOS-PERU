<?php

require_once APPPATH.'libraries/Modelo_DB.php';

class M_subcategoria extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('subcategoria');
        parent::setId('id');
    }

    public function obtieneConsulta() {
        $this->ci->db->select("subcategoria.id,subcategoria.titulo,subcategoria.imagen,subcategoria.url,subcategoria.descripcion,subcategoria.visita,subcategoria.posicion,subcategoria.categoria_id,subcategoria.fecha_registro,subcategoria.fecha_modificacion,subcategoria.usuario_id,subcategoria.destacado,subcategoria.oculto");
        $this->ci->db->from($this->tabla . " subcategoria");
    }

}
