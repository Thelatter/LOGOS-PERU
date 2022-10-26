<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_tag extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('tag');
        parent::setAlias('t');
        parent::setTabla_id('t');
    }

    public function get_query() {
        $this->CI->db->select("t.id, t.nombre, t.url, t.visita, t.oculto");
        $this->CI->db->from($this->tabla . " t");
        $this->CI->db->order_by('t.id', 'desc');
    }

    public function mostrar_random() {
        $resultSet = $this->CI->db->select(''
                        . 'tag.id AS tag_id,'
                        . 'tag.nombre AS tag_nombre,'
                        . 'tag.url AS tag_url,'
                        . 'tag.visita AS tag_visita,'
                        . 'tag.oculto AS tag_oculto')
                ->from('tag')
                ->where('tag.oculto', 0)
                ->order_by('tag.id', 'RANDOM')
                ->limit(25)
                ->get()
                ->result();
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return FALSE;
        }
    }

    public function etiquetas($limit) {
        $sql = "SELECT * FROM tag WHERE RAND()<(SELECT ((3/COUNT(*))*10) FROM tag) ORDER BY RAND() LIMIT " . $limit;
        $resultSet = $this->CI->db->query($sql)->result_array();
        return $resultSet;
    }

    public function tag_articulo($articulo_id) {
        $resultSet = $this->CI->db->select(''
                        . 'tag.id, '
                        . 'tag.nombre, '
                        . 'tag.url')
                ->from('tag')
                ->join('articulo_tag', 'articulo_tag.tag_id = tag.id')
                ->where('articulo_tag.articulo_id', $articulo_id);
        return $this->CI->db->get()->result_array();
    }

    public function tag_listar() {
        $resulSet = $this->CI->db->select(''
                        . 'tag.id, '
                        . 'tag.nombre, '
                        . 'tag.url')
                ->from('tag')
                ->where('tag.oculto', "0")
                ->get()
                ->result();
        if (count($resulSet) > 0) {
            return $resulSet;
        } else {
            return FALSE;
        }
    }

    public function existe_nombre($nombre, $id = '') {
        if ($id == '') {
            $resultSet = $this->CI->db->select()
                    ->from('tag')
                    ->where('tag.nombre', $nombre)
                    ->get()
                    ->result();
        } else {
            $stm = $this->CI->db->select(''
                            . 'tag.nombre AS t_nombre')
                    ->from('tag')
                    ->where('tag.id', $id)
                    ->get()
                    ->result();
            $resultSet = $this->CI->db->select()
                    ->from('tag')
                    ->where('tag.nombre !=', $stm[0]->t_nombre)
                    ->where('tag.nombre', $nombre)
                    ->get()
                    ->result();
        }
        if (count($resultSet) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function visita($id) {
        $stm = $this->CI->db->select(''
                        . 'tag.visita AS t_visita')
                ->from('tag')
                ->where('tag.id', $id)
                ->get()
                ->result();
        $data = array(
            'visita' => $stm[0]->t_visita + 1
        );
        if ($this->CI->db->where('tag.id', $id)->update('tag', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
