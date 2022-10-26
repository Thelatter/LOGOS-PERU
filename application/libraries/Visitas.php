<?php

class visitas {
    public function __construct() {
        $this->ci = & get_instance();
        /*
         * Configuración para librerias, helpers y modelos
         */
        $library = array('session', 'alerta', 'fecha', 'url_comp','complementos','session_configuracion');
        $helper = array('url','cookie');
        $model = array('m_web_visitas','m_articulo');
        $this->ci->load->library($library);
        $this->ci->load->helper($helper);
        $this->ci->load->model($model);
        /*
         * Configuración personalizada
         */
    }

    public function contarVisitaWeb($id = '',$producto = ''){
        $countVisit = 0;
        $visitLog = (!$this->ci->session_configuracion->obtieneSesion('usuarioWeb')) ? 0 : $this->ci->session_configuracion->obtieneSesion('usuarioWebContador');
        $tiempoActividad = (int) ( 3600 * 24); 
        //CREAR USUARIO TEMPORAL - 1 DIA
        If (isset($_COOKIE ["usuarioNavegador"]) == NULL) {
            $usuarioCookie = $this->ci->complementos->aleatorio(20, TRUE, TRUE, TRUE, FALSE);
            setcookie('usuarioNavegador', $usuarioCookie, time() + 86400);
        }else{
            $usuarioCookie = $_COOKIE ["usuarioNavegador"];
        }
        //REALIZAR CONTADOR
        if (isset($usuarioCookie)){
            
            if($visitLog == 0){
                $condiciones = array(
                    'web_visitas.usuario' => $usuarioCookie,
                    'web_visitas.direccion_ip' => $this->ci->input->ip_address(),
                    'web_visitas.descripcion_id' => $id,
                    'web_visitas.fecha_activo >=' => time()
                );
                $obtieneRegistroVisita = $this->ci->m_web_visitas->mostrar_cuando($condiciones);
                if(empty($obtieneRegistroVisita)){
                    $columnaDatos = array(
                        'web_visitas.usuario' => $usuarioCookie,
                        'web_visitas.agente' => $this->ci->input->user_agent(), 
                        'web_visitas.direccion_ip' => $this->ci->input->ip_address(), 
                        'web_visitas.visita' => 1,
                        'web_visitas.descripcion_id' => $id,
                        'web_visitas.descripcion' => $producto, 
                        'web_visitas.fecha_registro' => time(), 
                        'web_visitas.fecha_activo' => (int) (time() + $tiempoActividad)
                    );
                    $resultado = $this->ci->m_web_visitas->insertar($columnaDatos);
                    if($resultado){
                        //SUMAR CANTIDAD VISITA PRODUCTO
                        $condicionesProducto = array('articulo.id' => $id);
                        $obtieneRegistroProducto = $this->ci->m_articulo->mostrar($condicionesProducto);
                        $columnaDatos = array('visita' =>  $obtieneRegistroProducto['visita'] + 1);
                        $this->ci->m_articulo->actualizar($columnaDatos, $id);
                    }
                }

            }
            $countVisit = $visitLog;
            $countVisit++;
            $this->ci->session_configuracion->creaSesion('usuarioWebContador', $countVisit);
        }   
    }

   
}
