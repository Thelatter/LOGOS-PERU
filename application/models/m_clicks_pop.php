<?php

class M_clicks_pop extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        /*
         * Configuraci�n para librerias, helpers y modelos
         */
        $library = array('complement');
        $helper = array();
        $model = array();
        $this->load->library($library);
        $this->load->helper($helper);
        $this->load->model($model);
        /*
         * Configuraci�n de informaci�n
         */
        $this->config->load('exportando', TRUE, TRUE);
    }

    public function insert($pop_id) {
        $datetime = date('Y-m-d H:i:s');
        $date = date('Y-m-d');
        $ip = $this->input->ip_address();
        $data = array(
            'pop_id' => $pop_id,
            'fecha_registro' => $datetime,
            'fecha' => $date,
            'ip' => $ip,
        );
        if ($this->db->insert('clicks_pop', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function show_all_clicks($id) {
        $sql = "select nl_click.newsletter_id AS newsletter_id, nl_subscriber.id AS subscriber_id, nl_subscriber.email AS email, count(nl_click.link_id) AS total_clicks, 
            nl_link.url AS ultimo_click, nl_click.datetime AS fecha_ultimo from nl_click join nl_link on nl_click.link_id=nl_link.id 
            join nl_subscriber on nl_click.subscriber_id=nl_subscriber.id where nl_click.newsletter_id=" . $id . " 
            group by nl_click.subscriber_id order by nl_click.datetime desc";
        $result = $this->db->query($sql)->result();
        if (count($result) > 0) {
            return $result;
        } else {
            return FALSE;
        }
    }

    public function subscriber_visit($id_n,$id) {
        $sql = "select nl_subscriber.id AS sb_id,nl_subscriber.email AS sb_email, nl_subscriber.name AS sb_name, nl_subscriber.phone_number AS sb_phone, 
             nl_link.url AS click_visit, nl_click.datetime AS date_visit from nl_click join nl_link on nl_click.link_id=nl_link.id join nl_subscriber 
             on nl_click.subscriber_id=nl_subscriber.id where nl_click.subscriber_id=" . $id . " and nl_click.newsletter_id=".$id_n."";
        $result = $this->db->query($sql)->result();
        if (count($result) > 0) {
            return $result;
        } else {
            return FALSE;
        }
    }

    public function subscriber_info($id) {
        $sql = "select nl_subscriber.email AS sb_email, nl_subscriber.name AS sb_name, nl_subscriber.phone_number AS sb_phone 
              from nl_subscriber 
              where nl_subscriber.id=" . $id . "";
        $result = $this->db->query($sql)->result();
        if (count($result) > 0) {
            return $result[0];
        } else {
            return FALSE;
        }
    }

    /* FUNCIONES PARA MOSTRAR LOS TOP DE SUSCRIPTORES */

    public function top_click_subscriber() {
        $sql = "select nl_subscriber.id as subscriber_id, nl_subscriber.name AS name, nl_subscriber.email, count(nl_click.subscriber_id) AS total_clicks from nl_click join nl_subscriber on nl_click.subscriber_id=nl_subscriber.id  group by nl_click.subscriber_id order by total_clicks desc limit 0,5";
        $resultSet = $this->db->query($sql)->result();
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return FALSE;
        }
    }
    
    public function list_click_subscriber($item,$segment) {
        $resultSet=  $this->db->select('nl_subscriber.id as subscriber_id, nl_subscriber.name AS name, nl_subscriber.email, count(nl_click.subscriber_id) AS total_clicks,max(nl_click.datetime) AS datetime')
                ->from('nl_click')
                ->join('nl_subscriber','nl_subscriber.id=nl_click.subscriber_id')
                ->group_by('nl_click.subscriber_id')
                ->order_by('total_clicks','desc')
                ->limit($item,$segment)
                ->get()
                ->result();
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return FALSE;
        }
    }
    
     public function total_row_c_s() {
        $sql = "select nl_subscriber.id as subscriber_id, nl_subscriber.name AS name, nl_subscriber.email, count(nl_click.subscriber_id) AS total_clicks,max(nl_click.datetime) AS datetime 
                from nl_click join nl_subscriber on nl_click.subscriber_id=nl_subscriber.id  group by nl_click.subscriber_id order by total_clicks desc";
        $resultSet = $this->db->query($sql)->result();
        if (count($resultSet) > 0) {
            return count($resultSet);
        } else {
            return FALSE;
        }
    }

    /* LISTAS DE BOLETINES VISUALIZADOS POR SUSCRIPTOR */

    public function list_link_subscriber($id) {
        $sql = "select nl_click.subscriber_id,nl_subscriber.email,nl_link.url AS name_link,nl_click.datetime
                from nl_click join nl_subscriber on nl_click.subscriber_id=nl_subscriber.id join nl_link on nl_click.link_id=nl_link.id 
                where nl_click.subscriber_id=".$id." order by nl_click.datetime desc";
        $resultSet = $this->db->query($sql)->result();
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return FALSE;
        }
    }

    public function count_link_subscriber($id) {
        $sql = "select nl_link.url AS name_link,count(nl_link.url) AS total_visit from nl_click join nl_link on nl_click.link_id=nl_link.id 
                where nl_click.subscriber_id=".$id." group by name_link";
        $resultSet = $this->db->query($sql)->result();
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return FALSE;
        }
    }

}