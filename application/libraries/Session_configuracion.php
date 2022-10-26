<?php

class Session_configuracion {

    private $items = array();

    public function __construct() {
        $this->ci = & get_instance();
        /*
         * Configuración para librerias, helpers y modelos
         */
        $library = array('session', 'alerta', 'fecha', 'url_comp','mcrypted');
        $helper = array();
        $model = array();
        $this->ci->load->library($library);
        $this->ci->load->helper($helper);
        $this->ci->load->model($model);
        /*
         * Configuración personalizada
         */
        $this->_session = $this->datos_usuario('user_admin_data');

        $this->items['insEncriptacionSesion'] = md5('logoPeru2017');
    }

    public function datos_usuario_logueado() {
        /*
         * Información de la sesion
         */
        if (isset($this->_session->sys_id) === FALSE) {
           $this->destruir_session('user_admin_data');
           echo $this->ci->alerta->location_href(base_url() . 'configuracion');
        EXIT;
        
        } else {
            /*
             * Información de la base de datos
             */
            $where = array('admin.id' => $this->_session->sys_id, 'admin.oculto' => 0);
            $info = $this->ci->m_admin->mostrar($where);
            if (empty($info)) {
                $this->destruir_session('user_admin_data');
                echo $this->ci->url_comp->direccionar(base_url() . 'manager', TRUE);
                EXIT;
            }
            $data['emp_id'] = $this->_session->sys_id;
            $data['emp_username'] = $this->_session->sys_username;
            $data['emp_today'] = $this->ci->fecha->convertir_tiempo_fecha(time(), 4);
        }
        return $data;
    }

    public function verificar_logueo() {
        /*
         * Información de la sesion
         */
        if (isset($this->_session->sys_id) === TRUE) {
            echo $this->ci->alerta->location_href(base_url() . 'configuracion/home');
            exit;  
        }
    }

    public function datos_usuario($array = 'user_admin_data') {
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

    public function destruir_session($array = 'user_admin_data') {
        $session = $this->ci->session->all_userdata();
        if (isset($session[$array]) && is_array($session[$array])) {
            $this->ci->session->unset_userdata($array);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function encriptaInfo($valor){
        $this->ci->mcrypted->load($this->items['insEncriptacionSesion']);
        return $this->ci->mcrypted->encode($valor);
    }
    
    public function desencriptaInfo($valor){
        $this->ci->mcrypted->load($this->items['insEncriptacionSesion']);
        return $this->ci->mcrypted->decode($valor);
    }
    
    public function creaSesion($datos, $valor = NULL){
        @session_start();
        $this->ci->mcrypted->load($this->items['insEncriptacionSesion']);
        if(is_array($datos)){
            foreach($datos as $k => $v){
                unset($_SESSION[$k]);
                $_SESSION[$k] = $this->ci->mcrypted->encode($v);
            }
        } else{
            if(is_null($valor)){
                return FALSE;
            } else{
                unset($_SESSION[$datos]);
                $_SESSION[$datos] = $this->ci->mcrypted->encode($valor);
            }
        }
    }


     public function obtieneSesion($datos){
        @session_start();
        $this->ci->mcrypted->load($this->items['insEncriptacionSesion']);
        if(is_array($datos)){
            foreach($datos as $k => $v){
                if(isset($_SESSION[$k])){
                    $obtieneValor[] = $this->ci->mcrypted->decode($_SESSION[$k]);
                } else{
                    return FALSE;
                }
            }
            return $obtieneValor;
        } else{
            if(isset($_SESSION[$datos])){
                $obtieneValor = $this->ci->mcrypted->decode($_SESSION[$datos]);
            } else{
                return FALSE;
            }
            return $obtieneValor;
        }
    }
    
    public function eliminaSesion($datos) {
        @session_start();
        if(is_array($datos)){
            foreach ($datos as $k => $v) {
                unset($_SESSION[$k]);
            }
        } else{
            unset($_SESSION[$datos]);
        }
    }
    
    public function destruyeSesion() {
        @session_start();
        $_SESSION = array();
        @session_unset();
        @session_destroy();
        @session_regenerate_id(TRUE);
    }

   
}
