<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Tag extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        $library = array('url_comp','archivo','mantenimiento');
        $helper = array('url');
        $modelo=array('m_tag','m_articulo_tag');
        $this->load->model($modelo);
        $this->load->helper($helper);
        $this->load->library($library);
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['user_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['user_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['user_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function tag_get(){
        $id = $this->get('id');
        $reporte = $this->get('reporte');
        $segment = $this->get('segment');
        $items = $this->get('items');
        
        if($id === NULL){
            $tag = $this->m_tag->mostrar_todo();
        }else{
            $where = array('t.id' => $id, 't.oculto' => 0);
            $tag = $this->m_tag->mostrar($where);
        }
        if($tag){
            $this->response($tag, REST_Controller::HTTP_OK);
        }else{
             $this->response('', REST_Controller::HTTP_OK);
        }
        
    }


   
}