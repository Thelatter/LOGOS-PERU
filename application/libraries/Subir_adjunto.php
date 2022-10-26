<?php

class Subir_adjunto {

    //put your code here

    
    function subir_archivo($file,$carpeta,$nombre_documento) {
        $this->ci = & get_instance();
        $file = $_FILES['userfile'];
        $file = $_FILES['userfile']['tmp_name'];
        $file = $_FILES['userfile']['name'];
        $file = $_FILES['userfile']['type'];
        $file = $_FILES['userfile']['size'];
        $file = $_FILES['userfile']['error'];
        //var_dump($file);
        $config['upload_path'] = './public/imagen/'.$carpeta.'/';       
        $config['file_name'] = $nombre_documento;
        $config['allowed_types'] = 'mp4|3pg|avi|wmv|mpg|flv|dpg|jpeg|jpg|png|gif';
        $config['remove_spaces'] = TRUE;
        $config['overwrite'] = FALSE;
        $config['max_size']    = '';

       $this->ci->load->library('upload', $config);
        if ( ! $this->ci->upload->do_upload())
        {
            $error = array('error' => $this->ci->upload->display_errors());
            return FALSE;  
        }
        else
        {
            $data = array('upload_data' => $this->ci->upload->data());
            $ejem= $data;          
            $nombre=$ejem['upload_data']['file_name'];
            return $nombre;
}

}




 public function eliminar_archivo($archivo, $directorio) {
        if (!file_exists('./' . $directorio . '/' . $archivo)) {
            return FALSE;
        } else {
            @unlink('./' . $directorio . '/' . $archivo);
            return TRUE;
        }
    }


public function verificar_extension_imagen($file, $extention = 'jpeg|jpg|png|gif') {
        $file_name = strtolower($file);
        $data = explode('|', $extention);
        $ext = array();
        foreach ($data as $items) {
            $ext[] = trim($items);
        }
        $list_white = $ext;
        $list_negra = array('php', 'php3', 'php4', 'phtml', 'exe');
        $tmp = explode('.', $file_name);
        $file_extention = strtolower(end($tmp));
        if (!in_array($file_extention, $list_white)) {
            return FALSE;
        } elseif (in_array($file_extention, $list_negra)) {
            return FALSE;
        }
        return TRUE;
    }

    

    public function verificar_extension_video($file, $extention = 'mp4|3pg|avi|wmv|mpg|flv|dpg') {
        $file_name = strtolower($file);
        $data = explode('|', $extention);
        $ext = array();
        foreach ($data as $items) {
            $ext[] = trim($items);
        }

        $list_white = $ext;
        $list_negra = array('php', 'php3', 'php4', 'phtml', 'exe');
        $tmp = explode('.', $file_name);
        $file_extention = strtolower(end($tmp));
        if (!in_array($file_extention, $list_white)) {
            return FALSE;
        } elseif (in_array($file_extention, $list_negra)) {
            return FALSE;
        }
        return TRUE;
    }

    public function cambiar_nombre($nombre_archivo){
        $b = array("á", "Á", "é", "É", "í", "Í", "ó", "Ó", "ú", "Ú", "ñ", "Ñ",'Â');
        $c = array("a", "a", "e", "e", "i", "i", "o", "o", "u", "u", "n", "n",'A');
        $string = str_replace($b, $c, $nombre_archivo);
        return $string;
    }

}


