<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_cliente extends Modelo_DB{

    public function __construct() {
        parent::__construct();
        parent::setTabla('cliente');
        parent::setAlias('cliente');
        parent::setTabla_id('id');

        $this->CI->config->load('exportando', TRUE, TRUE);
    }

    public function get_query() {
        $this->CI->db->select("cliente.id,cliente.titulo,cliente.imagen,cliente.fecha_registro,cliente.fecha_modificacion,cliente.oculto");
        $this->CI->db->from($this->tabla . " cliente");
        $this->CI->db->order_by("cliente.id", "desc");
    }

    public function existe_cliente($titulo, $id = '') {
        if ($id == '') {
            $resultSet = $this->CI->db->select()
                    ->from('cliente')
                    ->where('cliente.titulo', $titulo)
                    ->get()
                  ->result();

        } else {
            $stm = $this->CI->db->select(''
                            . 'cliente.titulo AS cliente_titulo')
                    ->from('cliente')
                    ->where('cliente.id', $id)
                    ->get()
                    ->result();
            $resultSet = $this->CI->db->select()
                    ->from('cliente')
                    ->where('cliente.titulo !=', $stm[0]->cliente_titulo)
                    ->where('cliente.titulo', $titulo)
                    ->get()
                    ->result();
        }

        if (count($resultSet) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }

    }

    

    public function agregar($titulo,$imagen) {
        $posicion = $this->CI->db->select(''
                                . 'cliente.posicion AS cliente_posicion')->from('cliente')
                        ->order_by('cliente.posicion', 'desc')->limit(1)->get()->result();
        $data = array(
            'titulo'=>$titulo,
            'imagen'=>$imagen,
            'fecha_registro' => date("Y-m-d H:i:s"),
            'posicion' => ((count($posicion) > 0) ? $posicion[0]->cliente_posicion : 0) + 1,
            'cliente_id' => $session_id,
            'oculto' => 0
        );

        if ($this->CI->db->insert('cliente', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }

    }      

}

