<?php

require_once APPPATH . 'libraries/Modelo_DB.php';


class M_nosotros extends Modelo_DB{
    public function __construct() {
        parent::__construct();
        parent::setTabla('nosotros');
        parent::setAlias('nosotros');
        parent::setTabla_id('id');

        $this->CI->config->load('exportando', TRUE, TRUE);
    }


    public function get_query() {
        $this->CI->db->select("nosotros.id,nosotros.titulo,nosotros.descripcion,nosotros.imagen,nosotros.url,nosotros.fecha_registro,"
                . "nosotros.fecha_modificacion,nosotros.empleado_id,nosotros.oculto");
        $this->CI->db->from($this->tabla . " nosotros");
        $this->CI->db->order_by("nosotros.id", "asc");
    }


    public function existe_nosotros($titulo, $id = '') {
        if ($id == '') {
            $resultSet = $this->CI->db->select()
                    ->from('nosotros')
                    ->where('nosotros.titulo', $titulo)
                    ->get()
                    ->result();
        } else {
            $stm = $this->CI->db->select(''
                            . 'nosotros.titulo AS nosotros_titulo')
                    ->from('nosotros')
                    ->where('nosotros.id', $id)
                    ->get()
                    ->result();
            $resultSet = $this->CI->db->select()
                    ->from('nosotros')
                    ->where('nosotros.titulo !=', $stm[0]->nosotros_titulo)
                    ->where('nosotros.titulo', $titulo)
                    ->get()
                    ->result();
        }

        if (count($resultSet) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }



    

    public function eliminacion_multiple($id) {
        $data = array(
            'oculto' => 1
        );
        if ($this->CI->db->where('nosotros.id', $id)->update('nosotros', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    

    public function desbloqueo_multiple($id) {
        $data = array(
            'oculto' => 0
        );
        if ($this->CI->db->where('nosotros.id', $id)->update('nosotros', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    

    public function listar_web($limit,$order) {
        $resultSet = $this->CI->db->select(''
                        . 'nosotros.id AS id, '
                        . 'nosotros.titulo AS titulo, '
                        . 'nosotros.descripcion AS descripcion, '
                        . 'nosotros.imagen AS imagen,'
                        . 'nosotros.url AS url,'
                        . 'nosotros.oculto AS oculto, ')
                ->from(' nosotros')
                ->where('nosotros.oculto',0)
                ->order_by('nosotros.fecha_registro', $order)
                ->limit($limit)
                ->get()
                ->result();
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return FALSE;
        }
    }

    
}



?>

