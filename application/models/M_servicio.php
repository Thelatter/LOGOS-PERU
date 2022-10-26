<?php

require_once APPPATH . 'libraries/Modelo_DB.php';


class M_servicio extends Modelo_DB{
    public function __construct() {
        parent::__construct();
        parent::setTabla('servicio');
        parent::setAlias('servicio');
        parent::setTabla_id('id');

        $this->CI->config->load('exportando', TRUE, TRUE);
    }


    public function get_query() {
        $this->CI->db->select("servicio.id,servicio.titulo,servicio.descripcion,servicio.imagen,servicio.url,servicio.fecha_registro,"
                . "servicio.fecha_modificacion,servicio.empleado_id,servicio.oculto");
        $this->CI->db->from($this->tabla . " servicio");
        $this->CI->db->order_by("servicio.id", "asc");
    }


    public function existe_servicio($titulo, $id = '') {
        if ($id == '') {
            $resultSet = $this->CI->db->select()
                    ->from('servicio')
                    ->where('servicio.titulo', $titulo)
                    ->get()
                    ->result();
        } else {
            $stm = $this->CI->db->select(''
                            . 'servicio.titulo AS servicio_titulo')
                    ->from('servicio')
                    ->where('servicio.id', $id)
                    ->get()
                    ->result();
            $resultSet = $this->CI->db->select()
                    ->from('servicio')
                    ->where('servicio.titulo !=', $stm[0]->servicio_titulo)
                    ->where('servicio.titulo', $titulo)
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
        if ($this->CI->db->where('servicio.id', $id)->update('servicio', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    

    public function desbloqueo_multiple($id) {
        $data = array(
            'oculto' => 0
        );
        if ($this->CI->db->where('servicio.id', $id)->update('servicio', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    

    public function listar_web($limit,$order) {
        $resultSet = $this->CI->db->select(''
                        . 'servicio.id AS id, '
                        . 'servicio.titulo AS titulo, '
                        . 'servicio.descripcion AS descripcion, '
                        . 'servicio.imagen AS imagen,'
                        . 'servicio.url AS url,'
                        . 'servicio.oculto AS oculto, ')
                ->from(' servicio')
                ->where('servicio.oculto',0)
                ->order_by('servicio.fecha_registro', $order)
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

