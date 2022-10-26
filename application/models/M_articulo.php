<?php
require_once APPPATH . 'libraries/Modelo_DB.php';

class M_articulo extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('articulo');
        parent::setAlias('articulo');
        parent::setTabla_id('id');

        $this->CI->config->load('exportando', TRUE, TRUE);

    }

    public function get_query() {
        $this->CI->db->select("articulo.id,articulo.titulo,articulo.empleado_id,articulo.url,articulo.descripcion,articulo.autor,articulo.imagen,articulo.ruta,articulo.link,articulo.visita,articulo.fecha_registro,articulo.fecha_modificacion,articulo.oculto,articulo.estado");
        $this->CI->db->from($this->tabla . " articulo");
        $this->CI->db->order_by("articulo.id", "desc");
    }

    public function existe_titulo($titulo, $id = '') {
        if ($id == '') {
            $resultSet = $this->CI->db->select()
                    ->from('articulo')
                    ->where('articulo.titulo', $titulo)
                    ->get()
                    ->result();
        } else {
            $stm = $this->CI->db->select(''
                            . 'articulo.titulo AS n_titulo')
                    ->from('articulo')
                    ->where('articulo.id', $id)
                    ->get()
                    ->result();
            $resultSet = $this->CI->db->select()
                    ->from('articulo')
                    ->where('articulo.titulo !=', $stm[0]->n_titulo)
                    ->where('articulo.titulo', $titulo)
                    ->get()
                    ->result();
        }
        if (count($resultSet) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function tag_articulo($tag_id, $limite = FALSE, $offset = FALSE) {
        $resultSet = $this->CI->db->select(''
                        . 'articulo.id, '
                        . 'articulo.titulo, '
                        . 'articulo.descripcion, '
                        . 'articulo.autor, '
                        . 'articulo.fecha_registro, '
                        . 'articulo.ruta,'
                        . 'articulo.url,'
                        . 'articulo.imagen,'
                        . 'articulo.oculto')
                ->from('articulo')
                ->join('articulo_tag', 'articulo_tag.articulo_id = articulo.id')
                ->join('tag', 'tag.id = articulo_tag.tag_id')
                ->where('articulo_tag.tag_id', $tag_id)
                ->where('articulo.oculto', 0)
                ->order_by('articulo.id', 'desc');
        if ($limite) {
            return $this->CI->db->limit($limite, $offset)->get()->result_array();
        } else {
            return $this->CI->db->get()->result_array();
        }
    }


    public function existe_articulo($titulo, $id = '') {
        if ($id == '') {
            $resultSet = $this->CI->db->select()
                    ->from('articulo')
                    ->where('articulo.titulo', $titulo)
                    ->get()
                    ->result();
        } else {
            $stm = $this->CI->db->select(''
                            . 'articulo.titulo AS articulo_titulo')
                    ->from('articulo')
                    ->where('articulo.id', $id)
                    ->get()
                    ->result();
            $resultSet = $this->CI->db->select()
                    ->from('articulo')
                    ->where('articulo.titulo !=', $stm[0]->articulo_titulo)
                    ->where('articulo.titulo', $titulo)
                    ->get()
                    ->result();
        }
        if (count($resultSet) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }



    public function mostrar_ultimos($num) {
        $resultSet = $this->CI->db->select(''
                        . 'articulo.id AS articulo_id, '
                        . 'articulo.titulo AS articulo_titulo, '
                        . 'articulo.descripcion AS articulo_descripcion, '
                        . 'articulo.fecha_registro AS articulo_fecha_registro,'
                        . 'articulo.autor AS articulo_autor,'
                        . 'articulo.url AS articulo_url,'
                        . 'articulo.autor AS articulo_autor,'
                        . 'articulo.link AS articulo_link,'
                        . 'articulo.imagen AS articulo_imagen')
                ->from('articulo')
                ->where('articulo.oculto', 0)
                ->where('articulo.estado', 0)
                ->order_by('articulo.fecha_registro', 'desc')
                ->limit($num)
                ->get()
                ->result();
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return FALSE;
        }

    }

   
    public function mostrar_ult($limite='', $offset = FALSE) {
        $resultSet = $this->CI->db->select(''
                        . 'articulo.id , '
                        . 'articulo.titulo , '
                        . 'articulo.descripcion, '
                        . 'articulo.fecha_registro,'
                        . 'articulo.autor ,'
                        . 'articulo.url ,'
                        . 'articulo.link ,'
                        . 'articulo.imagen ')
                ->from('articulo')
                ->where('articulo.oculto', 0)
                ->order_by('articulo.fecha_registro', 'desc');
        return $this->CI->db->limit($limite, $offset)->get()->result_array();
    }


    public function ultimo_visto() {
        $resultSet = $this->CI->db->select(''
                        . 'articulo.id AS articulo_id, '
                        . 'articulo.titulo AS articulo_titulo, '
                        . 'articulo.descripcion AS articulo_descripcion, '
                        . 'articulo.fecha_registro AS articulo_fecha_registro,'
                        . 'articulo.autor AS articulo_autor,'
                        . 'articulo.url AS articulo_url,'
                        . 'articulo.link AS articulo_link,'
                        . 'articulo.imagen AS articulo_imagen')
                ->from('articulo')
                ->where('articulo.oculto', 0)
                ->order_by('articulo.fecha_registro', 'desc')
                ->limit(1)
                ->get()
                ->result();
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return FALSE;
        }
    }



    public function listar_random($num) {
        $resultSet = $this->CI->db->select(''
                        . 'articulo.id AS articulo_id, '
                        . 'articulo.titulo AS articulo_titulo, '
                        . 'articulo.descripcion AS articulo_descripcion, '
                        . 'articulo.fecha_registro AS articulo_fecha_registro,'
                        . 'articulo.autor AS articulo_autor,'
                        . 'articulo.ruta AS ruta,'
                        . 'articulo.url AS articulo_url,'
                        . 'articulo.link AS articulo_link,'
                        . 'articulo.imagen AS articulo_imagen')
                ->from('articulo')
                ->where('articulo.oculto', 0)
                ->order_by('articulo.id', 'RANDOM')
                ->limit($num)
                ->get()
                ->result();
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return FALSE;
        }
    }



    public function listar($limite, $offset = FALSE) {
        $resultSet = $this->CI->db->select(''
                        . 'articulo.id, '
                        . 'articulo.titulo, '
                        . 'articulo.descripcion, '
                        . 'articulo.autor, '
                        . 'articulo.imagen, '
                        . 'articulo.link, '
                        . 'articulo.ruta, '
                        . 'articulo.fecha_registro, '
                        . 'articulo.fecha_modificacion, '
                        . 'articulo.oculto ')
                ->from('articulo')
                ->where('articulo.oculto', 0)
                ->order_by('articulo.posicion', 'asc');
        return $this->CI->db->limit($limite, $offset)->get()->result_array();
    }



    public function mostrar_articulo_combo() {
        $resultSet = $this->CI->db->select(''
                        . 'articulo.id, '
                        . 'articulo.titulo, '
                        . 'articulo.descripcion, '
                        . 'articulo.autor, '
                        . 'articulo.imagen, '
                        . 'articulo.link, '
                        . 'articulo.ruta, '
                        . 'articulo.fecha_registro, '
                        . 'articulo.fecha_modificacion, '
                        . 'articulo.oculto ')
                ->from('articulo')
                ->where('articulo.oculto', 0)
                ->order_by('articulo.id', 'asc')
                ->get()
                ->result();
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return FALSE;
        }
    }

    

    public function agregar_visita($id) {
        $stm = $this->CI->db->select(''
                        . 'articulo.visita AS a_visita')
                ->from('articulo')
                ->where('articulo.id', $id)
                ->get()
                ->result();
        $data = array(
            'visita' => $stm[0]->a_visita + 1
        );

        if ($this->CI->db->where('articulo.id', $id)->update('articulo', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    

    public function mostrar_destacados() {
        $resultSet = $this->CI->db->select(''
                        . 'articulo.id, '
                        . 'articulo.titulo, '
                        . 'articulo.descripcion, '
                        . 'articulo.fecha_registro,'
                        . 'articulo.autor,'
                        . 'articulo.ruta,'
                        . 'articulo.url ,'
                        . 'articulo.imagen,'
                        . 'articulo.oculto')
                ->from('articulo')
                ->where('articulo.oculto', 0)
                ->where('articulo.visita !=', 0)
                ->order_by('articulo.visita','desc')
                ->limit(3)
                ->get()
                ->result();
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return FALSE;
        }
    }


    public function actualizar_estado($estado) {
        $data = array(
            'estado' => 0
        );

        if ($this->CI->db->where('articulo.estado', $estado)->update('articulo', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }



    public function articulo_relacionado($tag,$articulo){
        $resultSet = $this->CI->db->select(''
                        . 'articulo.id AS articulo_id, '
                        . 'articulo.ruta AS ruta, '
                        . 'articulo.titulo AS titulo, '
                        . 'articulo.descripcion AS descripcion, '
                        . 'articulo.fecha_registro AS fecha_registro,'
                        . 'articulo.url AS url,')
                    ->from('articulo')
                    ->join('articulo_tag', 'articulo.id = articulo_tag.articulo_id', 'inner')
                    ->join('tag', 'tag.id = articulo_tag.tag_id', 'inner')
                    ->where('tag.url', $tag)
                    ->where('articulo.id !=', $articulo)
                    ->where('articulo.oculto', 0)
                    ->order_by('articulo.fecha_registro', 'desc')
                    ->get()
                    ->result();
          if(count($resultSet)>0){
                return $resultSet;
          }else{
                return FALSE;
          }
    }


}

