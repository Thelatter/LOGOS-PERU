<?php

class Documento {

    public function crear_thumb($avatar, $source, $width, $height, $type = 'resize') {
        $this->ci = & get_instance();
        $this->ci->load->library('image_lib');
        $pre_name = explode('.', $avatar);
        $name = $pre_name[0];
        $extention = end(explode('.', $avatar));
        $new_name = $name . '-' . $width . 'x' . $height . '.' . $extention;
        $config['image_library'] = 'gd2';
        $config['new_image'] = './public/image/' . $source . '/thumbs/' . $new_name;
        $config['source_image'] = './public/image/' . $source . '/' . $name . '.' . $extention;
        $config['thumb_marker'] = '';
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['master_dim'] = 'auto';
        $config['quality'] = '100%';
        $this->ci->image_lib->clear();
        if ($type == 'resize') {
            $config['width'] = $width;
            $config['height'] = $height;
            $this->ci->image_lib->initialize($config);
            $this->ci->image_lib->resize();
        } elseif ($type == 'crop') {
            $config['x_axis'] = $width;
            $config['y_axis'] = $height;
            $this->ci->image_lib->initialize($config);
            $this->ci->image_lib->crop();
        }
        return $new_name;
    }

    public function random($length = 40, $lowercase = TRUE, $uppercase = FALSE, $number = TRUE, $specialchar = FALSE) {
        //
        $source = '';
        if ($lowercase === TRUE) {
            $source .= 'abcdefghijklmnopqrstuvwxyz';
        }
        if ($uppercase === TRUE) {
            $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        if ($number === TRUE) {
            $source .= '1234567890';
        }
        if ($specialchar === TRUE) {
            $source .= '|@#~$%()=^*+[]{}-_';
        }
        if ($length > 0) {
            $rstr = "";
            $source = str_split($source, 1);
            for ($i = 1; $i <= $length; $i++) {
                mt_srand((double) microtime() * 1000000);
                $num = mt_rand(1, count($source));
                $rstr .= $source[$num - 1];
            }
        }
        return $rstr;
    }

    public function tipo_documento($file, $type = 'single') {
        //function file
        switch ($type) {
            case 'single':
                if (isset($_FILES[$file]['tmp_name']) &&
                        $_FILES[$file]['tmp_name'] != '') {
                    $value = $_FILES[$file];
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
                if (isset($_FILES[$file]['tmp_name'][0]) &&
                        $_FILES[$file]['tmp_name'][0] != '') {
                    $values = $_FILES[$file];
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

        $extra = 'id="' . $name . '" class="form-control selectpicker" ' . $_type;
        $result = form_dropdown($name, $option, $default, $extra);
        unset($option);
        return $result;
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

}
