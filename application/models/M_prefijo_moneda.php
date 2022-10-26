<?php
require_once APPPATH.'libraries/Modelo_DB.php';

class M_prefijo_moneda extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('prefijo_moneda');
        parent::setId('id');
    }

    public function obtieneConsulta() {
        $this->ci->db->select("prefijo_moneda.id,prefijo_moneda.titulo,prefijo_moneda.prefijo,prefijo_moneda.url,prefijo_moneda.fecha_registro,prefijo_moneda.fecha_modificacion,prefijo_moneda.usuario_id,prefijo_moneda.posicion,prefijo_moneda.oculto");
        $this->ci->db->from($this->tabla . " prefijo_moneda");
    }
    
    public function agregar($titulo,$prefijo,$url, $session_id) {
        $posicion = $this->ci->db->select(''
                                . 'prefijo_moneda.posicion AS prefijo_moneda_posicion')->from('prefijo_moneda')
                        ->order_by('prefijo_moneda.posicion', 'desc')->limit(1)->get()->result();
        $data = array(
            'titulo'=> $titulo,
            'prefijo'=> $prefijo,
            'url' => $url,
            'fecha_registro'=> date("Y-m-d H:i:s"),
            'posicion' => ((count($posicion) > 0) ? $posicion[0]->prefijo_moneda_posicion : 0) + 1,
            'usuario_id' => $session_id,
            'oculto' => 0
        );
        if ($this->ci->db->insert('prefijo_moneda', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

   
}