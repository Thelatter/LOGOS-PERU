<?php



require_once APPPATH . 'libraries/Modelo_DB.php';





class M_eventos_imagen extends Modelo_DB{

    public function __construct() {

        parent::__construct();

        parent::setTabla('eventos_imagen');

        parent::setAlias('eventos_imagen');

        parent::setTabla_id('id');



        $this->CI->config->load('exportando', TRUE, TRUE);

    }





    public function get_query() {

        $this->CI->db->select("eventos_imagen.id,eventos_imagen.nombre_imagen,eventos_imagen.eventos_id");

        $this->CI->db->from($this->tabla . " eventos_imagen");

        $this->CI->db->order_by("eventos_imagen.id", "asc");

    }



    

}

?>



