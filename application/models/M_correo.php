<?php



require_once APPPATH . 'libraries/Modelo_DB.php';



class M_correo extends Modelo_DB{

    public function __construct() {

        parent::__construct();

        parent::setTabla('correo');

        parent::setAlias('correo');

        parent::setTabla_id('id');



        $this->CI->config->load('exportando', TRUE, TRUE);

    }

    

    public function get_query() {

        $this->CI->db->select("correo.id,correo.nombre,correo.correo,correo.fecha_registro,correo.oculto");

        $this->CI->db->from($this->tabla . " correo");

        $this->CI->db->order_by("correo.id", "asc");

    }

    

    public function existe_correo($correo, $id = '') {

        if ($id == '') {

            $resultSet = $this->CI->db->select()

                    ->from('correo')

                    ->where('correo.correo', $correo)

                    ->get()

                    ->result();

        } else {

            $stm = $this->CI->db->select(''

                            . 'correo.correo AS moneda_correo')

                    ->from('correo')

                    ->where('correo.id', $id)

                    ->get()

                    ->result();

            $resultSet = $this->CI->db->select()

                    ->from('correo')

                    ->where('correo.correo !=', $stm[0]->moneda_correo)

                    ->where('correo.correo', $correo)

                    ->get()

                    ->result();

        }

        if (count($resultSet) > 0) {

            return TRUE;

        } else {

            return FALSE;

        }

    }

    

    public function actualizar_moneda($oculto) {

        $data = array(

            'oculto' => 1

        );

        if ($this->CI->db->where('correo.oculto', $oculto)->update('correo', $data)) {

            return TRUE;

        } else {

            return FALSE;

        }

    }

  

}



