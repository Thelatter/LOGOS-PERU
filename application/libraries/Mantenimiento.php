<?php
class Mantenimiento {

    public function accion($id, $data, $controlador, $estado,$principal = '') {
        $items = explode('|', $data);
        $string = '';
        foreach ($items as $row) {
            switch (trim($row)) {
                case 'observar':
                    if ($estado == 0 || $estado == 1) {
                        $string .= '<div class="col-md-2 col-md-3 col-md-3 col-md-3 options">';
                        $string .= '<a href="' . base_url() . 'sistema/' . $controlador . '/observar/' . $id . '" data-toggle="tooltip" title="Observar">';
                        $string .= '<button type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float circle-small">';
                        $string .= '<i class="material-icons">search</i>';
                        $string .= '</button>';
                        $string .= '</a>';
                        $string .='</div>';
                        break;
                    }
                    break;
                case 'bloquear':
                    if ($estado == 0) {
                        $string .= '<div class="col-md-2 col-md-3 col-md-3 col-md-3 options">';
                        $string .= '<a href="' . base_url() . 'sistema/' . $controlador . '/bloquear/' . $id . '" data-toggle="tooltip" title="Bloquear">';
                        $string .= '<button type="button" class="btn btn-warning btn-circle waves-effect waves-circle waves-float">';
                        $string .= '<i class="material-icons">lock_outline</i>';
                        $string .= '</button>';
                        $string .= '</a>';
                        $string .= '</div>';
                    }
                    break;
                case 'permitir':
                    if ($estado == 1) {
                        $string .= '<div class="col-md-2 col-md-3 col-md-3 col-md-3 options">';
                        $string .= '<a href="' . base_url() . 'sistema/' . $controlador . '/permitir/' . $id . '" data-toggle="tooltip" title="Permitir">';
                        $string .= '<button type="button" class="btn btn-danger btn-circle waves-effect waves-circle waves-float circle-small">';
                        $string .= '<i class="material-icons">lock_open</i>';
                        $string .= '</button>';
                        $string .= '</a>';
                        $string .='</div>';
                        break;
                    }
                    break;
                case 'editar':
                        $string .= '<div class="col-md-2 col-md-3 col-md-3 col-md-3 options">';
                        $string .= '<a href="' . base_url() . 'sistema/' . $controlador . '/editar/' . $id . '" data-toggle="tooltip" title="Editar">';
                        $string .= '<button type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">';
                        $string .= '<i class="material-icons">edit</i>';
                        $string .= '</button>';
                        $string .= '</a>';
                        $string .= '</div>';
                    
                    break;
                case 'editar_correo':
                        $string .= '<div class="col-md-2 col-md-3 col-md-3 col-md-3 options">';
                        $string .= '<a href="' . base_url() . 'sistema/' . $controlador . '/editar/' . $id . '" data-toggle="tooltip" title="Editar">';
                        $string .= '<button type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">';
                        $string .= '<i class="material-icons">edit</i>';
                        $string .= '</button>';
                        $string .= '</a>';
                        $string .= '</div>';
                    break;
                case 'subir':
                    if ($estado == 0) {
                        $string .= '<div class="col-md-2 col-md-3 col-md-3 col-md-3 options">';
                        $string .= '<a class="subir" data-url="' . base_url() . 'sistema/' . $controlador . '/subir" data-id="' . $id . '" data-toggle="tooltip" title="Subir">';
                        $string .= '<button type="button" class="btn bg-primary btn-circle waves-effect waves-circle waves-float">';
                        $string .= '<i class="material-icons">arrow_upward</i>';
                        $string .= '</button>';
                        $string .= '</a>';
                        $string .= '</div>';
                    }
                    break;
                case 'bajar':
                    if ($estado == 0) {
                        $string .= '<div class="col-md-2 col-md-3 col-md-3 col-md-3 options">';
                        $string .= '<a class="bajar" data-url="' . base_url() . 'sistema/' . $controlador . '/bajar" data-id="' . $id . '" data-toggle="tooltip" title="Bajar">';
                        $string .= '<button type="button" class="btn bg-primary btn-circle waves-effect waves-circle waves-float">';
                        $string .= '<i class="material-icons">arrow_downward</i>';
                        $string .= '</button>';
                        $string .= '</a>';
                        $string .= '</div>';
                    }
                    break;
                case 'eliminar':
                    
                        $string .= '<div class="col-md-2 col-md-3 col-md-3 col-md-3 options">';
                        $string .= '<a href="' . base_url() . 'sistema/' . $controlador . '/eliminar/' . $id . '" data-toggle="tooltip" title="Eliminar">';
                        $string .= '<button type="button" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">';
                        $string .= '<i class="material-icons">delete_forever</i>';
                        $string .= '</button>';
                        $string .= '</a>';
                        $string .= '</div>';
                    
                    break;
                    case 'reporte':
                        $string .= '<div class="col-md-2 col-md-3 col-md-3 col-md-3 options">';
                        $string .= '<a href="' . base_url() . 'sistema/' . $controlador . '/report_view_visual/' . $id . '" data-toggle="tooltip" title="Ver Reporte">';
                        $string .= '<button type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float circle-small">';
                        $string .= '<i class="material-icons">insert_chart</i>';
                        $string .= '</button>';
                        $string .= '</a>';
                        $string .='</div>';
                  
                    break;
                case 'activar':
                    if ($estado == 1) {
                        $string .= '<div class="col-md-2 col-md-3 col-md-3 col-md-3 options">';
                        $string .= '<a data-url="' . base_url() . 'sistema/' . $controlador . '/accion_activado/'.$id.'" data-id="' . $id . '" class="activar" data-toggle="tooltip" title="Activar">';
                        $string .= '<button type="button" class="btn bg-danger btn-circle waves-effect waves-circle waves-float">';
                        $string .= '<i class="material-icons">close</i>';
                        $string .= '</button>';
                        $string .= '</a>';
                        $string .= '</div>';
                    }
                    break;
                case 'activado':
                    if ($estado == 0) {
                        $string .= '<div class="col-md-2 col-md-3 col-md-3 col-md-3 options">';
                         $string .= '<button type="button" class="btn bg-danger btn-circle waves-effect waves-circle waves-float">';
                        $string .= '<i class="material-icons">check</i>';
                        $string .= '</button>';
                        $string .= '</div>';
                    }
                    break;
                case 'principal_activar':
                    if ($estado == 0  and $principal == 1) {
                        $string .= '<a  class="btn btn-danger activar" data-url="' . base_url() . 'manager/' . $controlador . '/accion_activar/'.$id.'" data-id="' . $id . '" data-toggle="tooltip" title="Activa Noticia Principal"> <i class="fa fa-check"></i></a>';
                    }
                    break;
                case 'principal_activado':
                    if ($estado == 0  and $principal == 0) {
                        $string .= '<a  class="btn btn-success Activado" data-toggle="tooltip" title="Noticia Principal"><i class="fa fa-certificate"></i></a>';
                    }
                    break;
                default:
                    break;
            }
        }
        return $string;
    }

    public function estado_registro($estado) {
        switch ($estado) {
            case '0':
                        $estado= '<span class="label label-success">Activo</span>';
                        return $estado;
                break;
            case '1':
                        $estado = '<span class="label label-warning">Inactivo</span>';
                        return $estado;
            default:
                break;
        }
    } 

    

    public function estado($estado) {
        switch ($estado) {
            case '0':
                $estado = 'Activo';
                return $estado;
            case '1':
                $estado = 'Inactivo';
                return $estado;
            default:
                break;
        }
    }


    public function validacion($string, $config, $field) {
        $data = explode('|', $config);
        $message = '';
        foreach ($data as $items) {
            $value = trim($items);
            $new_value = '';
            if (strpos($value, 'minlenght') !== FALSE) {
                $pre_value = str_replace('minlenght', '', $value);
                $pre_value = str_replace('[', '', $pre_value);
                $pre_value = str_replace(']', '', $pre_value);
                $new_value = (int) $pre_value;
            }

            if (strpos($value, 'maxlenght') !== FALSE) {
                $pre_value = str_replace('maxlenght', '', $value);
                $pre_value = str_replace('[', '', $pre_value);
                $pre_value = str_replace(']', '', $pre_value);
                $new_value = (int) $pre_value;
            }

            if (strpos($value, 'size') !== FALSE) {
                $pre_value = str_replace('size', '', $value);
                $pre_value = str_replace('[', '', $pre_value);
                $pre_value = str_replace(']', '', $pre_value);
                $new_value = (int) $pre_value;
            }

            if (strpos($value, 'matched') !== FALSE) {
                $pre_value = str_replace('matched', '', $value);
                $pre_value = str_replace('[', '', $pre_value);
                $pre_value = str_replace(']', '', $pre_value);
                $data = explode('%', $pre_value);
                $data_field = (string) $data[0];
                $data_value = (string) $data[1];
            }

            if (($value == 'trim') && ($string != trim($string))) {
                $message .= '<li style="margin-left: 12px;">No se permiten espacios en los extremos: ' . $field . '</li>';
            } elseif (($value == 'required') && ($string == '')) {
                $message .= '<li style="margin-left: 12px;">Es necesario llenar este campo: ' . $field . '</li>';
            } elseif (($value == 'alpha') && ($string != '') && (!preg_match("/^([[:alpha:]])*$/", $string))) {
                $message .= '<li style="margin-left: 12px;">Se permiten únicamente caracteres alfabéticos: ' . $field . '</li>';
            } elseif (($value == 'alphanumeric') && ($string != '') && (!preg_match("/^([[:alnum:]])*$/", $string))) {
                $message .= '<li style="margin-left: 12px;">Se permiten únicamente caracteres alfanuméricos: ' . $field . '</li>';
            } elseif (($value == 'numeric') && ($string != '') && (!preg_match("/^([[:digit:]])*$/", $string))) {
                $message .= '<li style="margin-left: 12px;">Se permiten únicamente caracteres numéricos: ' . $field . '</li>';
            } elseif (($value == 'alphaspace') && ($string != '') && (!ctype_alpha(str_replace(' ', '', $string)))) {
                $message .= '<li style="margin-left: 12px;">Se permiten únicamente caracteres alfabéticos y espacios: ' . $field . '</li>';
            } elseif (($value == 'decimal') && ($string != '') && (!preg_match("/^[0-9]+(\.[0-9]+)?$/", $string))) {
                $message .= '<li style="margin-left: 12px;">Se permiten únicamente números enteros y decimales: ' . $field . '</li>';
            } elseif (($value == 'date') && ($string != '') && (!preg_match('/^(\d\d\-\d\d\-\d\d\d\d){1,1}$/', $string))) {
                $message .= '<li style="margin-left: 12px;">Se permiten únicamente fechas con formato dd-mm-yyyy: ' . $field . '</li>';
            } elseif (($value == 'alphaspecial') && ($string != '') && (!preg_match('/^[a-zñÑáéíóú\d_\s]+$/i', $string))) {
                $message .= '<li style="margin-left: 12px;">Se permiten únicamente caracteres alfabéticos especiales: ' . $field . '</li>';
            } elseif (($value == 'url') && ($string != '') && (!preg_match('/^[http:\/\/|www.|https:\/\/]/i', $string))) {
                $message .= '<li style="margin-left: 12px;">Se permiten únicamente direcciones url: ' . $field . '</li>';
            } elseif ((strpos($value, 'minlenght') !== FALSE) && ($string != '') && (strlen($string) < $new_value)) {
                $message .= '<li style="margin-left: 12px;">El texto ingresado es menor a ' . $new_value . ' caracteres: ' . $field . '</li>';
            } elseif ((strpos($value, 'maxlenght') !== FALSE) && ($string != '') && (strlen($string) > $new_value)) {
                $message .= '<li style="margin-left: 12px;">El texto ingresado es mayor a ' . $new_value . ' caracteres: ' . $field . '</li>';
            } elseif (($value == 'email') && ($string != '') && (!preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[.][a-zA-Z]{2,4}$/', $string))) {
                $message .= '<li>Se permiten únicamente direcciones de correo: ' . $field;
            } elseif ((strpos($value, 'size') !== FALSE) && ($string != '') && (strlen($string) != $new_value)) {
                $message .= '<li style="margin-left: 12px;">El texto ingresado debe tener ' . $new_value . ' caracteres: ' . $field;
            } elseif ((strpos($value, 'matched') !== FALSE) && ($string != '' || $data_value != '') && ($string != $data_value)) {
                $message .= '<li style="margin-left: 12px;">El campo '
                        . '<span class="label text-white bg-red text-uppercase">' . $field . '</span> no se relaciona con el campo '
                        . '<span class="label text-white bg-red text-uppercase">' . $data_field . '</span>.</li>';
            }
        }
        if ($message != '') {
            return $message;
        } else {
            return '';
        }
    }


    public function aleatorio($length = 40, $lowercase = TRUE, $uppercase = FALSE, $number = TRUE, $specialchar = FALSE) {
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

    
}

