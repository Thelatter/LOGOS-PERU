<?php

class Source extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        /*
         * Configuración para librerias, helpers y modelos
         */
        $library = array('crop');
        $helper = array('url');
        $model = array();
        $this->load->library($library);
        $this->load->helper($helper);
        $this->load->model($model);
        /*
         * Configuración personalizada
         */
        $this->config->load('exportando', TRUE, TRUE);
    }
    
    public function cropimage($image_width = '', $image_height = '', $image_directory = ''){
        try{
            if((isset($image_width) && $image_width != '') && 
                    (isset($image_height) && $image_height != '') && 
                    (isset($image_directory) && $image_directory != '')){
                $image_width = (int) $image_width;
                $image_height = (int) $image_height;
                if(is_int($image_width) && is_int($image_height) && is_string($image_directory)){
                    $items = explode('-', $image_directory);
                    $directory = base_url().'public/imagen/'.$items[0].'/'.$items[1];
                    echo $this->crop->ready($directory, $image_width, $image_height, '', '');
                } else{
                    show_404();
                }
            } else{
                show_404();
            }
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
    public function thumbimage($image_width = '', $image_height = '', $image_directory = ''){
        try{
            if((isset($image_width) && $image_width != '') && 
                    (isset($image_height) && $image_height != '') && 
                    (isset($image_directory) && $image_directory != '')){
                $image_width = (int) $image_width;
                $image_height = (int) $image_height;
                if(is_int($image_width) && is_int($image_height) && is_string($image_directory)){
                    $data = str_replace('-', '/', $image_directory);
                    $directory = base_url().$data;
                    echo $this->crop->ready($directory, $image_width, $image_height, '', '');
                } else{
                    show_404();
                }
            } else{
                show_404();
            }
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
    public function autosize($image_autosize = '', $image_heightxwidth = '', $image_directory = ''){
        try{
            if((isset($image_autosize) && $image_autosize != '') && 
                    (isset($image_heightxwidth) && $image_heightxwidth != '') && 
                    (isset($image_directory) && $image_directory != '')){
                $image_autosize = (string) $image_autosize;
                $image_heightxwidth = (int) $image_heightxwidth;
                if($image_autosize != ''){
                    switch($image_autosize){
                        case 'w':
                            $data = str_replace('-', '/', $image_directory);
                            $directory = base_url().$data;
                            echo $this->crop->ready($directory, $image_heightxwidth, FALSE, '', '');
                            break;
                        case 'h';
                            $data = str_replace('-', '/', $image_directory);
                            $directory = base_url().$data;
                            echo $this->crop->ready($directory, FALSE, $image_heightxwidth, '', '');
                            break;
                        default:
                            show_404();
                    }
                } else{
                    show_404();
                }
            } else{
                show_404();
            }
        } catch (Exception $ex) {
            echo $ex;
        }
    }
    
    public function download($route, $file){
        $data = file_get_contents('public/image/'.$route.'/'.$file);
        echo force_download($file, $data);
    }
    
}
