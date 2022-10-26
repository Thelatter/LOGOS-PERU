<?php

class Session_web {
    public function __construct() {
        $this->ci = & get_instance();
        /*
         * Configuración para librerias, helpers y modelos
         */
        $library = array('session', 'alerta', 'fecha', 'url_comp');
        $helper = array();
        $model = array('m_cliente');
        $this->ci->load->library($library);
        $this->ci->load->helper($helper);
        $this->ci->load->model($model);
        /*
         * Configuración personalizada
         */
        $this->_session = $this->datos_usuario('cliente_data');
    }

    public function datos_usuario_logueado() {
        /*
         * Información de la sesion
         */
        if (isset($this->_session->sys_id) === FALSE) {
            $this->destruir_session('cliente_data');
            echo $this->ci->alerta->location_href(base_url() . 'manager');
            EXIT;
        } else {
            /*
             * Información de la base de datos
             */
            $where = array('c.id' => $this->_session->sys_id, 'c.oculto' => 0);
            $info = $this->ci->m_cliente->mostrar($where);
            if (empty($info)) {
                $this->destruir_session('cliente_data');
                echo $this->ci->url_comp->direccionar(base_url(), TRUE);
                EXIT;
            }
            $data['cli_id'] = $this->_session->sys_id;
            $data['cli_email'] = $info['usuario'];
            $data['cli_regdate'] = $info['fecha_registro'];
            $data['cli_today'] = $this->ci->fecha->convertir_tiempo_fecha(time(), 4);
        }
        return $data;
    }

    public function verificar_logueo() {
        /*
         * Información de la sesion
         */
        if (isset($this->_session->sys_id) === TRUE) {
            echo $this->ci->alerta->location_href(base_url());
            exit;
        }
    }

    public function datos_usuario($array = 'cliente_data') {
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

    public function destruir_session($array = 'cliente_data') {
        $session = $this->ci->session->all_userdata();
        if (isset($session[$array]) && is_array($session[$array])) {
            $this->ci->session->unset_userdata($array);
            return TRUE;
        } else {
            return FALSE;
        }
    }

   
}
