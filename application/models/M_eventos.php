<?php



require_once APPPATH . 'libraries/Modelo_DB.php';





class M_eventos extends Modelo_DB{

    public function __construct() {

        parent::__construct();

        parent::setTabla('eventos');

        parent::setAlias('eventos');

        parent::setTabla_id('id');



        $this->CI->config->load('sistema', TRUE, TRUE);

    }





    public function get_query() {

        $this->CI->db->select("eventos.id,eventos.titulo,eventos.fecha_registro,"

                . "eventos.url,eventos.usuario_id,eventos.oculto");

        $this->CI->db->from($this->tabla . " eventos");

        $this->CI->db->order_by("eventos.id", "asc");

    }





    public function existe_eventos($titulo, $id = '') {

        if ($id == '') {

            $resultSet = $this->CI->db->select()

                    ->from('eventos')

                    ->where('eventos.titulo', $titulo)

                    ->get()

                    ->result();

        } else {

            $stm = $this->CI->db->select(''

                            . 'eventos.titulo AS eventos_titulo')

                    ->from('eventos')

                    ->where('eventos.id', $id)

                    ->get()

                    ->result();

            $resultSet = $this->CI->db->select()

                    ->from('eventos')

                    ->where('eventos.titulo !=', $stm[0]->eventos_titulo)

                    ->where('eventos.titulo', $titulo)

                    ->get()

                    ->result();

        }



        if (count($resultSet) > 0) {

            return TRUE;

        } else {

            return FALSE;

        }

    }

    

}


?>



