<?php

class Archivo {

    public function archivo_1($archivo, $tipo = 'multiple') {
        switch ($tipo) {
            case 'single':
                if (isset($_FILES[$archivo]['tmp_name']) &&
                        $_FILES[$archivo]['tmp_name'] != '') {
                    $value = $_FILES[$archivo];
                    $result = $this->checked_extention($value['name'], 'jpeg|jpg|png|gif');
                    if ($result === FALSE) {
                        return FALSE;
                    } else {
                        return $value;
                    }
                } else {
                    return FALSE;
                }
                break;
            case 'multiple':
                if (isset($_FILES[$archivo]['tmp_name'][0]) &&
                        $_FILES[$archivo]['tmp_name'][0] != '') {
                    $values = $_FILES[$archivo];
                    for ($i = 0; $i < count($values['tmp_name']); $i++) {
                        $result = $this->checked_extention($values['name'][$i], 'jpeg|jpg|png|gif');
                        if ($result === FALSE) {
                            continue;
                        } else {
                            $data['name'][] = $values['name'][$i];
                            $data['type'][] = $values['type'][$i];
                            $data['tmp_name'][] = $values['tmp_name'][$i];
                            $data['error'][] = $values['error'][$i];
                            $data['size'][] = $values['size'][$i];
                        }
                    }
                    return $data;
                } else {
                    return FALSE;
                }
                break;
            default:
                return FALSE;
        }
    }

    public function generar_dropdown($data, $name, $default = '', $string = 'Seleccione una opción', $type = 'none') {
        //genera los grados de la base de datos en un </select>
        $this->ci = & get_instance();
        $this->ci->load->helper('form');
        switch ($type) {
            case 'search':
                $_type = 'data-live-search="true"';
                break;
            case 'none':
                $_type = '';
                break;
        }
        $option[''] = $string;
        foreach ($data as $key => $value) {
            $option[$key] = $value;
        }

        $extra = 'id="' . $name . '" class="form-control show-tick" ' . $_type;
        $result = form_dropdown($name, $option, $default, $extra);
        unset($option);
        return $result;
    }

    public function guardar_imagen($documento, $directorio, $marca = array('marca' => '', 'tipo' => 'string'), $tamaño = 1600) {
        $i=1;
        $date = date_create();
        $timestamp = date_timestamp_get($date);
        $this->ci = & get_instance();
        $this->ci->load->library('imagen','url_comp');
        $this->ci->imagen->ready_listo($documento['tmp_name'], TRUE);
        $this->ci->imagen->cambiarToancho($tamaño);
        if ($marca['marca'] != '' && $marca['tipo'] == 'string') {
            $this->ci->imagen->stringMarcadeagua($marca['marca'], 70, 'FFFFFF', 'bottom right', 10, 10);
        }
        if ($marca['marca'] != '' && $marca['tipo'] == 'image') {
            $this->ci->imagen->imgenMarcadeagua($marca['marca'], 70, 'bottom right', 10, 10);
        }
        $resultado=$this->ci->url_comp->convertir_imagen($timestamp,$documento['name'],$i);
        $this->ci->imagen->guardar('./' . $directorio . '/' . $resultado);
        return $resultado;
    }

    public function guardar_multiple_imagenes($documento, $directorio, $marca = array('marca' => '', 'tipo' => 'string'), $tamaño = 1600) {
        $i = 1;
        $this->ci = & get_instance();
        $this->ci->load->library('imagen','url_comp');
        $date = date_create();
        $timestamp = date_timestamp_get($date);
        for ($i = 0; $i < count($documento['tmp_name']); $i++) {
            $this->ci->imagen->ready_listo($documento['tmp_name'][$i], TRUE);
            $this->ci->imagen->cambiarToancho($tamaño);
            if ($marca['marca'] != '' && $marca['tipo'] == 'string') {
                $this->ci->imagen->stringMarcadeagua($marca['marca'], 70, 'FFFFFF', 'bottom right', 10, 10);
            }
            if ($marca['marca'] != '' && $marca['tipo'] == 'image') {
                $this->ci->imagen->imgenMarcadeagua($marca['marca'], 70, 'bottom right', 10, 10);
            }
            $resultado=$this->ci->url_comp->convertir_imagen($timestamp,$documento['name'][$i],$i);
            $this->ci->imagen->guardar('./' . $directorio . '/' . $resultado);
            $data[] = $resultado;
        }

        return $data;
    }

    public function estructura($array, $value = FALSE) {
        //function structure
        if ($value === FALSE) {
            echo "<pre>";
            print_r($array);
            echo "</pre>";
        } else {
            var_dump($array);
        }
    }

    public function checked_extention($file, $extention = 'jpeg|jpg|png|gif') {
        $file_name = strtolower($file);
        $data = explode('|', $extention);
        $ext = array();
        foreach ($data as $items) {
            $ext[] = trim($items);
        }
        $list_white = $ext;
        $list_black = array('php', 'php3', 'php4', 'phtml', 'exe');
        $tmp = explode('.', $file_name);
        $file_extention = strtolower(end($tmp));
        if (!in_array($file_extention, $list_white)) {
            return FALSE;
        } elseif (in_array($file_extention, $list_black)) {
            return FALSE;
        }
        return TRUE;
    }

    public function eliminar_imagen($archivo, $directorio) {
        if (!file_exists('./' . $directorio . '/' . $archivo)) {
            return FALSE;
        } else {
            @unlink('./' . $directorio . '/' . $archivo);
            return TRUE;
        }
    }

    public function cortar_texto($text, $words){ 
	$matches = preg_split("/\s+/", $text, $words + 1);
	$sz = count($matches);
	if ($sz > $words){
		unset($matches[$sz-1]);
		return implode(' ',$matches)." ...";
	}
	return $text;
    }


    public function correlativo($numero='',$total){
        $cor='0';
        if($numero == ''){
            for($i=1;$i<$total-1;$i++){
                $cor.='0';
            }
            $tmp = $cor.'1';
            return $tmp;
        }else{
            $tmp = $numero + 1;
            $len = strlen($tmp);
            for($i=1;$i<$total-$len;$i++){
                $cor.='0';
            }
            $final = $cor.''.$tmp;
            return $final;
        }
    }
    public function convertir_array($string, $tipe = "element") {
        $string = trim(trim($string), ",");
        $elements = explode(",", $string);
        $lista = array();
        if($string !=''){
	        if ($tipe == "url") {
	            foreach ($elements as $list) {
	                $url = self::url_amigale($list);
	                $lista[] = trim(trim($url), "-");
	            }
	        } elseif ($tipe == "element") {
	            foreach ($elements as $list) {
	                $lista[] = trim(trim($list));
	            }
	        }
        }
        return $lista;
    }

}
