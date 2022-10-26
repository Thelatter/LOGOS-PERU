<?php

class M_access_logs extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        /*
         * Configuración para librerias, helpers y modelos
         */
        $library = array();
        $helper = array();
        $model = array();
        $this->load->model($model);
        /*
         * Configuración de información
         */
        $this->config->load('exportando', TRUE, TRUE);
    }

    public function show_all_logs() {
        $resultSet = $this->db->select(''
                        . 'access_logs.id AS l_id, '
                        . 'access_logs.ip_address AS l_ip, '
                        . 'access_logs.description AS l_description, '
                        . 'access_logs.register_date AS l_register')
                ->from('access_logs')
                ->order_by('access_logs.id', 'desc')
                ->get()
                ->result();
        /*
         * Debug de consulta
         */
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return FALSE;
        }
    }

    public function show_info_logs($ip, $time) {
        $resultSet = $this->db->select(''
                        . 'access_logs.id AS l_id, '
                        . 'access_logs.ip_address AS l_ip, '
                        . 'access_logs.description AS l_description, '
                        . 'access_logs.register_date AS l_register')
                ->from('access_logs')
                ->where('access_logs.ip_address', $ip)
                ->where('access_logs.register_date >', time() - $time)
                ->order_by('access_logs.id', 'desc')
                ->get()
                ->result();
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return FALSE;
        }
    }

    public function insert($ip, $description) {
        $data = array(
            'ip_address' => $ip,
            'description' => $description,
            'register_date' => time()
        );
        if ($this->db->insert('access_logs', $data)):
            return TRUE;
        endif;
    }

}
