<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_slider extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('slider');
        parent::setAlias('slider');
        parent::setTabla_id('id');

    }


    public function get_query() {
        $this->CI->db->select("slider.id,slider.titulo,slider.subtitulo,slider.link,slider.imagen,slider.url,slider.fecha_registro,slider.fecha_modificacion,slider.posicion,slider.empleado_id,slider.oculto");
        $this->CI->db->from($this->tabla . " slider");
        $this->CI->db->order_by("slider.posicion", "asc");

    }


    public function agregar($image,$link,$titulo,$subtitulo,$url,$session_id) {
        $posicion = $this->CI->db->select(''
                                . 'slider.posicion AS slider_posicion')->from('slider')
                        ->order_by('slider.posicion', 'desc')->limit(1)->get()->result();
        $data = array(
            'titulo'=>$titulo,
            'subtitulo' => $subtitulo,
            'link'=>$link,
            'imagen' => $image,
            'url' => $url,
            'fecha_registro'=>date("Y-m-d H:i:s"),
            'posicion' => ((count($posicion) > 0) ? $posicion[0]->slider_posicion : 0) + 1,
            'empleado_id' => $session_id,
            'oculto' => 0
        );
        if ($this->CI->db->insert('slider', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    public function ordenar_posicion($order) {
        $images = $this->CI->db->select(''
                        . 'slider.posicion AS posicion, '
                        . 'slider.id AS slider_id')
                ->from('slider')
                ->order_by('slider.posicion', 'asc')
                ->get()
                ->result();
        $i = 0;
        foreach ($images as $items) {
            $data = array(
                'posicion' => $order[$i]
            );
            $this->CI->db->where('id', $items->slider_id)->update('slider', $data);
            $i++;
        }
    }

    public function posicion() {
        $sql = "select min(posicion) AS min,max(posicion) AS max from slider";
        $result = $this->CI->db->query($sql)->result();
        if (count($result) > 0) {
            return $result;
        } else {
            return FALSE;
        }
    }


    public function show_all_slider() {
        $resultSet = $this->CI->db->select(''
                        . 'slider.id AS id, '
                        . 'slider.imagen AS nombre, '
                        . 'slider.posicion AS posicion, '
                        . 'slider.oculto AS oculto, ')
                ->from(' slider')
                ->order_by('slider.posicion', 'asc')
                ->get()
                ->result();
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return FALSE;
        }
    }

    public function mostrar_slider() {
        $resultSet = $this->CI->db->select(''
                        . 'slider.id, '
                        . 'slider.titulo, '
                        . 'slider.link, '
                        . 'slider.imagen')
                ->from('slider')
                ->where('slider.oculto', 0)
                ->order_by('slider.posicion','asc')
                ->get()
                ->result();
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return FALSE;
        }
    }
}



