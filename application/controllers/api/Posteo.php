<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
class Posteo extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $library = array('complementos', 'url_comp', 'mantenimiento');
        $helper  = array();
        $modelo = array('m_post_facebook');
        $this->load->library($library);
        $this->load->model($modelo);
        $this->load->helper($helper);
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['user_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['user_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['user_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function posteo_get(){
        $id = $this->get('id');
        $segment = $this->get('segment');
        $items = $this->get('items');
        if($id === NULL){
            $posteo = $this->m_post_facebook->mostrar_todo($items,$segment);            
        }else{
            $condicion = array('post_facebook.id' => $id);
            $posteo = $this->m_post_facebook->mostrar($condicion);
        }
     
        if($posteo){
            $this->response($posteo, REST_Controller::HTTP_OK);
        }else{
            $this->response('', REST_Controller::HTTP_OK);
        }    
    }

    
    public function posteo_post(){
            $id = $this->input->post('id');
            $titulo = $this->input->post('titulo');
            $alt = $this->input->post('alt');
            $url = $this->input->post('url');
            $img = $this->input->post('imagen');
            $imagen = base64_decode($img);
            
            $empleado_id = $this->input->post('empleado_id');
            //VALIDACION DE CAMPOS
            $error = '';
            $error .= $this->mantenimiento->validacion($titulo , 'required|maxlenght[250]', ' Etiqueta Title');
            $error .= $this->mantenimiento->validacion($alt , 'required|maxlenght[250]', ' Etiqueta Alt');
            $error .= $this->mantenimiento->validacion($url, 'url', 'Enlace');

            if ($error != '') {
                $msj=['tipo'=>1,'texto'=>$error];
                $this->response($msj, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
                EXIT;
            }
         
            if($id == ''){
                if ($imagen == '') {
                    $msj=['tipo'=>1,'texto'=>'Debe de ingresar una imagen'];
                    $this->response($msj, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
                    EXIT;
                }
               
                $data = array(
                    'titulo' => $titulo,
                    'alt' => $alt,
                    'url' => $url,
                    'imagen' => $imagen,
                    'empleado_id' => $empleado_id,
                    'fecha_registro' => date("Y-m-d H:i:s"),
                    'ruta' => 'http://tour-gastronomico.com/multimanager/public/imagen/posteo/logosperu/',
                );
                $result = $this->m_post_facebook->insertar($data);
                if($result===TRUE){
                    $msj=['tipo'=>2,'texto'=>'se registro correctamente'];
                    $this->response($msj, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
                    EXIT;
                }else{
                    $msj=['tipo'=>1,'texto'=>'No se pudo registrar'];
                    $this->response($msj, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
                }
                
            }else{
                if($imagen != ''){
                    $nuevaImagen = $imagen;
                }else{
                    $condicion = array('post_facebook.id' => $id);
                    $postFacebook = $this->m_post_facebook->mostrar($condicion);
                    $nuevaImagen = $postFacebook['imagen'];
                }
                 $data = array(
                    'titulo' => $titulo,
                    'alt' => $alt,
                    'url' => $url,
                    'imagen' => $nuevaImagen,
                    'empleado_id' => $empleado_id,
                    'fecha_registro' => date("Y-m-d H:i:s"),
                    'ruta' => 'http://tour-gastronomico.com/multimanager/public/imagen/posteo/logosperu/',
                );
                $result=$this->m_post_facebook->actualizar($data,'id',$id);
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

    public function posteo_delete()
    {
    $id = (int) $this->input->get('id');
    $tipo = $this->input->get('tipo');
        if($tipo == 'permitir'){
            $condicion = array('post_facebook.id' => $id, 'post_facebook.oculto' => 1);
            $resultSet = $this->m_post_facebook->exists($condicion);
            if ($resultSet == 0) {
                $msj=['tipo'=>1,'texto'=>'No se puede desbloquear'];
                $this->response($msj, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
                EXIT;
            } else {
                $this->m_post_facebook->permitir($id);
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
                $condicion = array('post_facebook.id' => $id, 'post_facebook.oculto' => 0);
                $resultSet = $this->m_post_facebook->exists($condicion);
                if ($resultSet == 0) {
                    $msj=['tipo'=>1,'texto'=>'No se puede eliminar'];
                    $this->response($msj, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
                    EXIT;
                } else {
                    $this->m_post_facebook->ocultar($id);
                    $msj=['tipo'=>2,'texto'=>'Se bloqueo correctamente'];
                    $this->response($msj, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
                    EXIT;
                }
            }
        }
    }


}