<?php
require_once APPPATH . 'libraries/Modelo_DB.php';

class M_articulo_tag extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('articulo_tag');
        parent::setAlias('at');
        parent::setTabla_id('at');
    }

    public function get_query() {
        $this->CI->db->select("at.id, at.tag_id, at.articulo_id, t.nombre as tag,t.url as tag_url, at.oculto");
        $this->CI->db->from($this->tabla . " at");
        $this->CI->db->join("tag t","t.id=at.tag_id","join");
        $this->CI->db->order_by('at.id','desc');
    }
    
    
     public function mostrar_tag($url){
        $resultSet = $this->CI->db->select(''
                        . 'articulo_tag.id AS tag_id, '
                        . 'articulo_tag.tag_id AS tag_tag_id, '
                        . 'articulo_tag.articulo_id AS tag_articulo, '
                        . 'articulo_tag.oculto AS tag_oculto,'
                        . 'tag.url AS tags_nombre')
                ->from(' articulo_tag')
                ->join('tag', 'tag.id = articulo_tag.tag_id')
                ->where('tag.url', $url)
                ->where('articulo_tag.oculto', 0)
                ->order_by('articulo_tag.id', 'desc')
                ->get()
                ->result();
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return FALSE;
        }
    }

    public function tag_noticia($id){
        $resultSet = $this->CI->db->select(''
                        . 'articulo_tag.id AS id, '
                        . 'articulo_tag.tag_id AS tag_id, '
                        . 'articulo_tag.articulo_id AS articulo, '
                        . 'articulo_tag.oculto AS oculto,'
                        . 'tag.nombre AS nombre,'
                        . 'tag.url AS url')
                ->from(' articulo_tag')
                ->join('tag', 'tag.id = articulo_tag.tag_id')
                ->where('articulo_tag.articulo_id', $id)
                ->where('articulo_tag.oculto', 0)
                ->order_by('articulo_tag.id', 'desc')
                ->get()
                ->result();
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return FALSE;
        }
    }
   
    
    public function eliminar_todo($id='') {
    
        $delete = $this->CI->db->where('articulo_tag.articulo_id',$id)->delete($this->tabla);
        if ($delete) {
            return true;
        } else {
            return false;
        }
    }
    
}