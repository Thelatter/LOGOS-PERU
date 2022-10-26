<?php

require_once APPPATH . 'libraries/Modelo_DB.php';


class M_galeria_imagen extends Modelo_DB{
    public function __construct() {
        parent::__construct();
        parent::setTabla('galeria_imagen');
        parent::setAlias('galeria_imagen');
        parent::setTabla_id('id');

        $this->CI->config->load('exportando', TRUE, TRUE);
    }


    public function get_query() {
        $this->CI->db->select("galeria_imagen.id,galeria_imagen.titulo,galeria_imagen.fecha_registro,"
                . "galeria_imagen.usuario_id,galeria_imagen.oculto");
        $this->CI->db->from($this->tabla . " galeria_imagen");
        $this->CI->db->order_by("galeria_imagen.id", "asc");
    }


    public function existe_galeria_imagen($titulo, $id = '') {
        if ($id == '') {
            $resultSet = $this->CI->db->select()
                    ->from('galeria_imagen')
                    ->where('galeria_imagen.titulo', $titulo)
                    ->get()
                    ->result();
        } else {
            $stm = $this->CI->db->select(''
                            . 'galeria_imagen.titulo AS galeria_imagen_titulo')
                    ->from('galeria_imagen')
                    ->where('galeria_imagen.id', $id)
                    ->get()
                    ->result();
            $resultSet = $this->CI->db->select()
                    ->from('galeria_imagen')
                    ->where('galeria_imagen.titulo !=', $stm[0]->galeria_imagen_titulo)
                    ->where('galeria_imagen.titulo', $titulo)
                    ->get()
                    ->result();
        }

        if (count($resultSet) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
}



?>

