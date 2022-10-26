<?php

class M_captcha extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_captcha($cap) {
        //insertamos el captcha en la bd
        $data = array(
            'captcha_time' => $cap['time'],
            'ip_address' => $this->input->ip_address(),
            'word' => $cap['word']
        );
        $query = $this->db->insert_string('captcha', $data);
        $this->db->query($query);
    }

    //   public function remove_old_captcha($expiration)

    public function delete($expiration) {
        //eliminamos los registros de la base de datos cuyo 
        //captcha_time sea menor a expiration
        $this->db->where('captcha_time <', $expiration);
        $this->db->delete('captcha');
    }

    public function check($captcha) {
        //comprobamos si existe un registro con los datos
        //envÃ­ados desde el formulario
        $this->db->where('word', $captcha);
        //   $this->db->where('ip_address',$ip);
        //    $this->db->where('captcha_time >',$expiration);
        $query = $this->db->get('captcha');
        //devolvemos el nÃºmero de filas que coinciden
        return $query->num_rows();
    }

    public function captcha_exists($captcha) {
        $resultSet = $this->db->select(''
                        . 'captcha.captcha_id AS c_id, '
                        . 'captcha.captcha_time AS c_time,'
                        . 'captcha.ip_address AS c_ip, '
                        . 'captcha.word AS c_word')
                ->from('captcha')
                ->where('captcha.word', $captcha)
                ->get()
                ->result();
        if (count($resultSet) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
