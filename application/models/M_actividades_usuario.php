<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_actividades_usuario extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('actividades_usuario');
        parent::setAlias('actividades_usuario');
        parent::setTabla_id('id');
    }

    public function get_query() {
        $this->CI->db->select("actividades_usuario.id,actividades_usuario.ip_direccion,actividades_usuario.id_usuario,actividades_usuario.tipo,actividades_usuario.descripcion,actividades_usuario.fecha_registro");
        $this->CI->db->from($this->tabla . " actividades_usuario");
        $this->CI->db->order_by('actividades_usuario.fecha_registro', 'desc');
    }
    
    public function reporte_actividad($tipo){
        $sql = "SELECT COUNT(*) AS total , usuario.usuario as usuario FROM actividades_usuario JOIN usuario ON actividades_usuario.id_usuario = usuario.id WHERE actividades_usuario.tipo = ".$tipo." GROUP BY id_usuario";
        $resultSet = $this->CI->db->query($sql)->result();
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return FALSE;
        }
    }
    
    public function reporte_actividad_hora($tipo){
        $sql = "SELECT COUNT( * ) AS total, actividades_usuario.fecha_registro AS fecha_registro FROM actividades_usuario JOIN usuario ON actividades_usuario.id_usuario = usuario.id WHERE actividades_usuario.tipo = ".$tipo." GROUP BY DATE_FORMAT( actividades_usuario.fecha_registro,'%H') ASC";
        $resultSet = $this->CI->db->query($sql)->result();
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return FALSE;
        }
    }

    public function reporte_actividad_usuario($id){
        $sql = "SELECT COUNT(*) AS total , tipo_actividad.nombre as nombre FROM actividades_usuario JOIN tipo_actividad ON actividades_usuario.tipo = tipo_actividad.id WHERE actividades_usuario.id_usuario = ".$id." GROUP BY tipo";
        $resultSet = $this->CI->db->query($sql)->result();
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return FALSE;
        }
    }

    public function reporte_actividad_hora_usuario($tipo,$id){
        $sql = "SELECT COUNT( * ) AS total, actividades_usuario.fecha_registro AS fecha_registro FROM actividades_usuario JOIN usuario ON actividades_usuario.id_usuario = usuario.id WHERE actividades_usuario.tipo = ".$tipo." and actividades_usuario.id_usuario = ".$id." GROUP BY DATE_FORMAT( actividades_usuario.fecha_registro,'%H') ASC";
        $resultSet = $this->CI->db->query($sql)->result();
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return FALSE;
        }
    }

}
