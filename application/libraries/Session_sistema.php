<?php

class Session_sistema {
    public function __construct() {
        $this->ci = & get_instance();
        /*
         * Configuración para librerias, helpers y modelos
         */
        $library = array('session', 'alerta', 'fecha', 'url_comp');
        $helper = array();
        $model = array();
        $this->ci->load->library($library);
        $this->ci->load->helper($helper);
        $this->ci->load->model($model);
        /*
         * Configuración personalizada
         */
        $this->_session = $this->datos_usuario('user_data');
    }

    public function datos_usuario_logueado() {
        /*
         * Información de la sesion
         */
        if (isset($this->_session->sys_id) === FALSE) {
           $this->destruir_session('user_data');
           echo $this->ci->alerta->location_href(base_url() . 'sistema');
        EXIT;
        
        } else {
            /*
             * Información de la base de datos
             */
            $where = array('usuario.id' => $this->_session->sys_id, 'usuario.oculto' => 0);
            $info = $this->ci->m_usuario->mostrar($where);
            if (empty($info)) {
                $this->destruir_session('user_data');
                echo $this->ci->url_comp->direccionar(base_url() . 'sistema', TRUE);
                EXIT;
            }
            $image = ($info['imagen'] != '') ? $info['imagen'] : 'user.jpg';
            $data['emp_id'] = $this->_session->sys_id;
            $data['emp_imagen'] = base_url() . 'thumbs/150/150/empleado-' . $image;
            $data['emp_fullname'] = $info['nombres'] . ' ' . $info['apellidos'];
            $data['emp_correo'] = $info['correo'];
            $data['emp_regdate'] = $info['fecha_registro'];
            $data['emp_grade'] = $info['nivel'];
            $data['emp_gdescription'] = $info['d_nivel'];
            $data['emp_today'] = $this->ci->fecha->convertir_tiempo_fecha(time(), 4);
        }
        return $data;
    }

    public function verificar_logueo() {
        /*
         * Información de la sesion
         */
        if (isset($this->_session->sys_id) === TRUE) {
            echo $this->ci->alerta->location_href(base_url() . 'sistema/home');
            exit;
            
        }
    }

    public function datos_usuario($array = 'user_data') {
        $session = $this->ci->session->all_userdata();
        if (isset($session[$array]) && is_array($session[$array])) {
            $data = new stdClass();
            foreach ($session[$array] as $key => $value) {
                $data->$key = $value;
            }
            return $data;
        } else {
            return FALSE;
        }
    }

    public function destruir_session($array = 'user_data') {
        $session = $this->ci->session->all_userdata();
        if (isset($session[$array]) && is_array($session[$array])) {
            $this->ci->session->unset_userdata($array);
            return TRUE;
        } else {
            return FALSE;
        }
    }

   
}
