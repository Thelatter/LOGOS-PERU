<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
class Articulo_tag extends REST_Controller {

    function __construct()
    {
        
        parent::__construct();
        $library = array('url_comp','archivo','mantenimiento');
        $helper = array('url');
        $modelo=array('m_articulo_tag');
        $this->load->model($modelo);
        $this->load->helper($helper);
        $this->load->library($library);
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['user_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['user_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['user_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function articulo_tag_get()
    {
        $id = $this->get('id');
        $top = $this->get('top');
        $segment = $this->get('segment');
        $items = $this->get('items');
        //$this->response($top, REST_Controller::HTTP_CREATED); EXIT;
        if($top == '1'){
        	$lista = $this->m_articulo_tag->top_tag($items, $segment);
        	$this->response($lista, REST_Controller::HTTP_OK);
        	EXIT;
        }
        if($id === NULL){
            $tag= $this->m_articulo_tag->mostrar_todo();
            $this->response($tag, REST_Controller::HTTP_OK);
        }else{
            $where = array('at.articulo_id' => $id, 'at.oculto' => 0);
            $tag= $this->m_articulo_tag->mostrar_cuando($where);
        }
        if($tag){
            $this->response($tag, REST_Controller::HTTP_OK);
        }else{
            $this->response('', REST_Controller::HTTP_OK);
        }
        
    }

    public function noticia_multimedia_put(){
        $id = $this->input->get('id');
        $nombre = $this->input->get('nombre');
        $titulo = $this->input->get('titulo');
        $imagen = base64_decode($this->input->get('imagen'));
        $color = $this->input->get('color');
        $orden = $this->input->get('orden');
        $url = $this->url_comp->convertir_url($nombre);
        $empleado_id = $this->input->get('empleado_id');
        if($id == '') {
            $msj=['tipo'=>1,'texto'=>'Ocurrio un error 404'];
            $this->response($msj, REST_Controller::HTTP_CREATED);
            EXIT;
        } else {
            if ($this->m_categoria->existe_nombre($nombre, $id) === TRUE) {
                $msj=['tipo'=>1,'texto'=>'La categoría ya existe'];
                $this->response($msj, REST_Controller::HTTP_CREATED);
                EXIT;
            } else {
            	if($imagen == ''){
            		$where=['c.id'=>$id];
            		$categoria= $this->m_categoria->mostrar($where);
            		$newimagen=$categoria['imagen'];
            	}else{
            		$newimagen=$imagen;
            	}
            	$data=[
            		'nombre'=>$nombre,
            		'titulo'=>$titulo,
            		'url'=>$url,
            		'color'=>$color,
            		'imagen'=>$newimagen
            		];
                $result = $this->m_categoria->actualizar($data,'id',$id);
                if($result === TRUE){
                    $msj=['tipo'=>2,'texto'=>'Datos actualizados'];
                    $this->response($msj, REST_Controller::HTTP_CREATED);
                    EXIT;
                } else {
                    $msj=['tipo'=>1,'texto'=>'Ocurrio un error'];
                    $this->response($msj, REST_Controller::HTTP_CREATED);
                    EXIT;
                }
            //$this->set_response($msj, REST_Controller::HTTP_CREATED);
            }
        }
    }

    public function noticia_multimedia_post(){
        $nombre = $this->input->get('nombre');
        $titulo = $this->input->get('titulo');
        $imagen = base64_decode($this->input->get('imagen'));
        $color = $this->input->get('color');
        $url = $this->url_comp->convertir_url($nombre);
        $empleado_id = $this->input->get('empleado_id');
	//VALIDACION DE CAMPOS
        $error = '';
        $error .= $this->mantenimiento->validacion($nombre, 'required|alphaspecial|maxlenght[200]', 'Nombre');
        $error .= $this->mantenimiento->validacion($titulo, 'required|alphaspecial|maxlenght[200]', 'Titulo');
        if ($error != '') {
            $msj=['tipo'=>1,'texto'=>$error];
            $this->response($msj, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
            EXIT;
        }
        if ($this->m_categoria->existe_nombre($nombre) === TRUE) {
                $msj=['tipo'=>1,'texto'=>'el nombre ya existe'];
                $this->response($msj, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
                EXIT;
        } else {
            $result=$this->m_categoria->agregar($nombre,$titulo,$imagen,$color,$url,$empleado_id);
            if($result === TRUE){
            	$msj=['tipo'=>2,'texto'=>'se registro correctamente'];
            	$this->response($msj, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
            }else{
            	$msj=['tipo'=>1,'texto'=>'No se pudo registrar'];
            	$this->response($msj, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
            }
            
        }
    }


    public function noticia_multimedia_delete(){
        $id = (int) $this->input->get('id');
        // Validate the id.
        if ($id <= 0){
            // Set the response and exit
            $msj=['tipo'=>1,'texto'=>'No se puede eliminar'];
            $this->response($msj, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
            EXIT;
        }else{
            $where = array('nm.id' => $id);
            $resultSet = $this->m_noticia_multimedia->exists($where);
            if ($resultSet == 0) {
                $msj=['tipo'=>1,'texto'=>'No se puede eliminar'];
                $this->response($msj, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
                EXIT;
            } else {
                $this->m_noticia_multimedia->eliminar($id);
                $msj=['tipo'=>2,'texto'=>'Se Elimino correctamente'];
                $this->response($msj, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
                EXIT;
            }
        }
    }


}