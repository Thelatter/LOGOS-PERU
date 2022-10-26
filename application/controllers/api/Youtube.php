<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
class Youtube extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $library = array('url_comp', 'mantenimiento');
        $helper  = array();
        $modelo = array('m_post_video');
        $this->load->library($library);
        $this->load->model($modelo);
        $this->load->helper($helper);
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['user_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['user_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['user_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function youtube_get(){
        $id = $this->get('id');
        $segment = $this->get('segment');
        $items = $this->get('items');
        if($id === NULL){
            $youtube = $this->m_post_video->mostrar_todo($items,$segment);            
        }else{
            $condicion = array('post_video.id' => $id);
            $youtube = $this->m_post_video->mostrar($condicion);
        }
     
        if($youtube){
            $this->response($youtube, REST_Controller::HTTP_OK);
        }else{
            $this->response('', REST_Controller::HTTP_OK);
        }    
    }

    
    public function youtube_post(){
            $id = $this->input->post('id');
            $titulo = $this->input->post('titulo');
            $enlace = $this->input->post('enlace');
            $url = $this->url_comp->convertir_url($titulo);
            $empleado_id = $this->input->post('empleado_id');
            //VALIDACION DE CAMPOS
            $error = '';
            $error .= $this->mantenimiento->validacion($titulo , 'required|maxlenght[250]', ' Título');
            $error .= $this->mantenimiento->validacion($enlace, 'url|maxlenght[300]', 'Enlace');

            if ($error != '') {
                $msj=['tipo'=>1,'texto'=>$error];
                $this->response($msj, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
                EXIT;
            }
         
            if($id == ''){ 
                $data = array(
                    'titulo' => $titulo,
                    'url' => $url,
                    'enlace' => $enlace,
                    'empleado_id' => $empleado_id,
                    'fecha_registro' => date("Y-m-d H:i:s"),
                );
                $result = $this->m_post_video->insertar($data);
                if($result===TRUE){
                    $msj=['tipo'=>2,'texto'=>'se registro correctamente'];
                    $this->response($msj, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
                    EXIT;
                }else{
                    $msj=['tipo'=>1,'texto'=>'No se pudo registrar'];
                    $this->response($msj, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
                }
                
            }else{
                 $data = array(
                    'titulo' => $titulo,
                    'url' => $url,
                    'enlace' => $enlace,
                    'empleado_id' => $empleado_id,
                    'fecha_modificacion' => date("Y-m-d H:i:s"),
                );
                $result=$this->m_post_video->actualizar($data,'id',$id);
                if($result === TRUE){
                    $msj=['tipo'=>2,'texto'=>'Datos actualizados'];
                        $this->response($msj, REST_Controller::HTTP_CREATED);
                    EXIT;
                }else {
                    $msj=['tipo'=>1,'texto'=>'Ocurrio un error'];
                    $this->response($msj, REST_Controller::HTTP_CREATED);
                    EXIT;
                } 
                
            }
    }

    public function youtube_delete()
    {
    $id = (int) $this->input->get('id');
    $tipo = $this->input->get('tipo');
        if($tipo == 'permitir'){
            $condicion = array('post_video.id' => $id, 'post_video.oculto' => 1);
            $resultSet = $this->m_post_video->exists($condicion);
            if ($resultSet == 0) {
                $msj=['tipo'=>1,'texto'=>'No se puede desbloquear'];
                $this->response($msj, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
                EXIT;
            } else {
                $this->m_post_video->permitir($id);
                $msj=['tipo'=>2,'texto'=>'Se desbloqueo correctamente'];
                $this->response($msj, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
                EXIT;
            }
        }else{
            if ($id <= 0){
                $msj=['tipo'=>1,'texto'=>'No se puede eliminar'];
                $this->response($msj, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
                EXIT;
            }else{
                $condicion = array('post_video.id' => $id, 'post_video.oculto' => 0);
                $resultSet = $this->m_post_video->exists($condicion);
                if ($resultSet == 0) {
                    $msj=['tipo'=>1,'texto'=>'No se puede eliminar'];
                    $this->response($msj, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
                    EXIT;
                } else {
                    $this->m_post_video->ocultar($id);
                    $msj=['tipo'=>2,'texto'=>'Se bloqueo correctamente'];
                    $this->response($msj, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
                    EXIT;
                }
            }
        }
    }


}