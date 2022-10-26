<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
class Articulo extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $library = array('complementos', 'url_comp', 'mantenimiento');
        $helper  = array();
        $modelo = array('m_articulo','m_tag','m_articulo_tag');
        $this->load->library($library);
        $this->load->model($modelo);
        $this->load->helper($helper);
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['user_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['user_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['user_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function articulo_get(){
        $id = $this->get('id');
        $segment = $this->get('segment');
        $items = $this->get('items');
        if($id === NULL){
            $noticia = $this->m_articulo->mostrar_todo($items,$segment);            
        }else{
            $where = array('articulo.id' => $id);
            $noticia = $this->m_articulo->mostrar($where);
        }
     
        
        if($noticia){
            $this->response($noticia, REST_Controller::HTTP_OK);
        }else{
            $this->response('', REST_Controller::HTTP_OK);
        }
        
    }

    
    public function articulo_post(){

        $id = $this->input->post('id');
        $titulo = $this->input->post('titulo');
        $img = $this->input->post('imagen');
        $imagen = base64_decode($img);
        $autor = $this->input->post('autor');
        $contenido = base64_decode($this->input->post('contenido'));
        $url = $this->url_comp->convertir_url($titulo);
        $tag = urldecode($this->input->post('tag'));
        $tag = unserialize(base64_decode($tag));
        $empleado_id = $this->input->post('empleado_id');
        //VALIDACION DE CAMPOS
        $error = '';
        $error .= $this->mantenimiento->validacion($titulo , 'required|maxlenght[250]', 'Titulo');
        $error .= $this->mantenimiento->validacion($tag , 'array', 'Etiqueta');
        $error .= $this->mantenimiento->validacion($autor, 'required', 'Autor');
        $error .= $this->mantenimiento->validacion($contenido, 'required', 'Contenido');

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
                'descripcion' => $contenido,
                'fecha_registro' => date("Y-m-d H:i:s"),
                'url' => $url,
                'autor' => $autor,
                'imagen' => $imagen,
                'empleado_id' => $empleado_id,
                'ruta' => 'http://tour-gastronomico.com/multimanager/public/imagen/noticia/logos/',
            );
            $result = $this->m_articulo->insertar($data);

                if($result===TRUE){
                    $noticia=$this->m_articulo->mostrar_todo(1, 0);
                
                    
                    if($tag !== NULL){
                        for($z=0;$z<count($tag);$z++){
                            if($this->m_tag->existe_nombre($tag[$z])){
                                $where=['t.nombre'=>$tag[$z],'t.oculto'=>0];
                                $n_tag=$this->m_tag->mostrar($where);
                                $not_tag=[
                                    'tag_id'=>$n_tag['id'],
                                    'articulo_id'=>$noticia[0]['id']
                                ];
                                $this->m_articulo_tag->insertar($not_tag);
                            }else{
                                $info_tag=[
                                    'nombre'=>$tag[$z],
                                    'url'=>$this->url_comp->convertir_url($tag[$z])
                                ];
                                if($this->m_tag->insertar($info_tag)){
                                    $newtag=$this->m_tag->mostrar_todo(1, 0);
                                    $noti_tag=[
                                        'tag_id'=>$newtag[0]['id'],
                                        'articulo_id'=>$noticia[0]['id']
                                    ];
                                    $this->m_articulo_tag->insertar($noti_tag);
                                }
                            }
                        }
                    }
        
                    $msj=['tipo'=>2,'texto'=>'se registro correctamente'];
                    $this->response($msj, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
                    EXIT;
                }else{
                    $msj=['tipo'=>1,'texto'=>'No se pudo registrar'];
                    $this->response($msj, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
                }
            
        }else{
            $res = $this->m_articulo->existe_titulo($titulo, $id);
           
            if ($res === TRUE) {
                $msj=['tipo'=>1,'texto'=>'El titulo ya existe'];
                $this->response($msj, REST_Controller::HTTP_CREATED);
                EXIT;
            } else {
                if($imagen != ''){
                    $newimagen = $imagen;
                }else{
                    $where = array('articulo.id' => $id, 'articulo.oculto' => 0);
                    $noticia = $this->m_articulo->mostrar($where);
                    $newimagen = $noticia['imagen'];
                }
                 $data = array(
                    'titulo' => $titulo,
                    'descripcion' => $contenido,
                    'fecha_modificacion' => date("Y-m-d H:i:s"),
                    'url' => $url,
                    'autor' => $autor,
                    'imagen' => $newimagen ,
                    'empleado_id' => $empleado_id,
                    'ruta' => 'http://tour-gastronomico.com/multimanager/public/imagen/noticia/logos/',
                );
                $result=$this->m_articulo->actualizar($data,'id',$id);
                    if($result === TRUE){
                  

                        if($tag != NULL){
                        
                            $t=['at.articulo_id'=>$id,'at.oculto'=>0];
                            $result=$this->m_articulo_tag->eliminar_todo($id);
                            for($z=0;$z<count($tag);$z++){
                                if($this->m_tag->existe_nombre($tag[$z])){
                                    $where=['t.nombre'=>$tag[$z],'t.oculto'=>0];
                                    $n_tag=$this->m_tag->mostrar($where);
                                    $not_tag=[
                                        'tag_id'=>$n_tag['id'],
                                        'articulo_id'=>$id
                                    ];
                                    $this->m_articulo_tag->insertar($not_tag);
                                }else{
                                    $info_tag=[
                                        'nombre'=>$tag[$z],
                                        'url'=>$this->url_comp->convertir_url($tag[$z])
                                    ];
                                    if($this->m_tag->insertar($info_tag)){
                                        $newtag=$this->m_tag->mostrar_todo(1, 0);
                                        $noti_tag=[
                                            'tag_id'=>$newtag[0]['id'],
                                            'articulo_id'=>$id
                                        ];
                                        $this->m_articulo_tag->insertar($noti_tag);
                                    }
                                }
                            }
                        }
                    
                        $msj=['tipo'=>2,'texto'=>'Datos actualizados'];
                            $this->response($msj, REST_Controller::HTTP_CREATED);
                        EXIT;
                    }else {
                        $msj=['tipo'=>1,'texto'=>'Ocurrio un error'];
                        $this->response($msj, REST_Controller::HTTP_CREATED);
                        EXIT;
                    } 
                
                $this->response($msj, REST_Controller::HTTP_CREATED);
        }

    }
}


}