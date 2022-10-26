<?php



require_once APPPATH . 'libraries/Modelo_DB.php';



class M_pop extends Modelo_DB{

    public function __construct() {

        parent::__construct();
        parent::setTabla('pop');
        parent::setAlias('pop');
        parent::setTabla_id('id');
        $this->CI->config->load('exportando', TRUE, TRUE);

    }


    public function get_query() {
        $this->CI->db->select("pop.id,pop.titulo,pop.mensaje,pop.link,pop.numero_clicks,pop.adjunto,pop.fecha_registro,pop.fecha_inicio,pop.fecha_fin,pop.oculto");
        $this->CI->db->from($this->tabla . " pop");
        $this->CI->db->order_by("pop.id", "asc");
    }

     public function existe_pop($titulo, $id = '') {
        if ($id == '') {
            $resultSet = $this->CI->db->select()
                    ->from('pop')
                    ->where('pop.titulo', $titulo)
                    ->get()
                    ->result();
        } else {
            $stm = $this->CI->db->select(''
                            . 'pop.titulo AS pop_titulo')
                    ->from('pop')
                    ->where('pop.id', $id)
                    ->get()
                    ->result();
            $resultSet = $this->CI->db->select()
                    ->from('pop')
                    ->where('pop.titulo !=', $stm[0]->pop_titulo)
                    ->where('pop.titulo', $titulo)
                    ->get()
                    ->result();
        }

        if (count($resultSet) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function actualizar_estado($oculto) {
        $data = array(
            'oculto' => 1
        );

        if ($this->CI->db->where('pop.oculto', $oculto)->update('pop', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function visualizacion_dia($id) {
        $this->ci = & get_instance();
        $sql = "select day(fecha) AS d,count(*) AS visits, clicks_pop.* from clicks_pop where clicks_pop.pop_id= ".$id." group by d order by d asc";
        $resultSet = $this->ci->db->query($sql)->result();
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return FALSE;
        }
    }
    public function visualizacion_dia_general() {
        $this->ci = & get_instance();
        $sql = "select day(fecha) AS d,count(*) AS visits, clicks_pop.* from clicks_pop group by d order by d asc";
        $resultSet = $this->ci->db->query($sql)->result();
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return FALSE;
        }
    }
    
    public function visualizacion_hora($id) {
        $this->ci = & get_instance();
        $sql = "SELECT hour(fecha_registro) AS h, count( * ) AS visitas, clicks_pop.* FROM clicks_pop WHERE pop_id = ".$id." GROUP BY h";
        $resultSet = $this->ci->db->query($sql)->result();
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return FALSE;
        }
    }
    public function visualizacion_hora_general() {
        $this->ci = & get_instance();
        $sql = "SELECT hour(fecha_registro) AS h, count( * ) AS visitas, clicks_pop.* FROM clicks_pop GROUP BY h";
        $resultSet = $this->ci->db->query($sql)->result();
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return FALSE;
        }
    }
    public function numero_clicks() {
        $this->ci = & get_instance();
        $resulSet = $this->ci->db->select(''
                        . 'pop.id AS p_id, '
                        . 'pop.titulo AS p_titulo, '
                        . 'pop.numero_clicks AS p_numero_cliks, '
                        . 'pop.fecha_inicio AS p_fecha_inicio, '
                        . 'pop.fecha_fin AS p_fecha_fin, ')
                ->from('pop')
                ->order_by('pop.numero_clicks', 'desc')
                ->limit(5)
                ->get()
                ->result();
        if (count($resulSet) > 0) {
            return $resulSet;
        } else {
            return FALSE;
        }
    }
 
}


