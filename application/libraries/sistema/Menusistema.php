<?php

class Menusistema  {

    private $items = array();

    public function __construct() {
        $this->ci =& get_instance();
        /*
         * Configuración para librerias, helpers y modelos
         */
        $library = array('session_sistema','complementos');
        $helper = array('url');
        $model = array('m_usuario');
        $this->ci->load->library($library);
        $this->ci->load->helper($helper);
        $this->ci->load->model($model);
        /*
         * Configuración personalizada
         */
        $this->ci->config->load('sistema', TRUE, TRUE);
        $this->_session = $this->ci->session_sistema->datos_usuario('user_data');
        $this->items['base_url'] = base_url();
        
    }
    //MENU DE SISTEMA
    public function generarMenu(){
        $nivel = $this->ci->_session->sys_grade;
        
        switch ($nivel) {
            case '500': case '400':
                $modulo = '';
                $modulo .= '<div class="menu">
                            <ul class="list" style="height:100% !important;">
                            <li class="header">MENÚ DE NAVEGACIÓN</li>';
                //INICIAR MENU
                $modulo .= '<li class="active">
                                <a href="'.$this->items['base_url'].'sistema/home">
                                    <i class="material-icons">home</i>
                                    <span>Home</span>
                                </a>
                            </li>';
                //MODULO USUARIO
                $modulo .=  '<li><a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">portrait</i>
                                <span>Usuario</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="'.$this->items['base_url'].'sistema/usuario/agregar"><i class="material-icons aline-icon">add</i> Agregar</a>
                                </li>
                                <li>
                                    <a href="'.$this->items['base_url'].'sistema/usuario/listar"><i class="material-icons aline-icon">list</i> Listar</a>
                                </li>
                            </ul></li>';
                
                //MODULO ARTICULO
                $modulo .=  '<li><a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">border_color</i>
                                <span>Noticias</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="'.$this->items['base_url'].'sistema/articulo/agregar"><i class="material-icons aline-icon">add</i> Agregar</a>
                                </li>
                                <li>
                                    <a href="'.$this->items['base_url'].'sistema/articulo/listar"><i class="material-icons aline-icon">list</i> Listar</a>
                                </li>
                            </ul></li>'; 
                
                //FINALIZAR MENU
                $modulo .=  '</ul></li></div>';
                break;
            case '255':
                $modulo = '';
                $modulo .= '<div class="menu">
                            <ul class="list" style="height:100% !important;">
                            <li class="header">MENÚ DE NAVEGACIÓN</li>';


                //INICIAR MENU
                $modulo .= '<li class="active">
                                <a href="'.$this->items['base_url'].'sistema/home">
                                    <i class="material-icons">home</i>
                                    <span>Home</span>
                                </a>
                            </li>';
                //MODULO USUARIO
                $modulo .= '<li><a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">portrait</i>
                                    <span>Usuario</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="'.$this->items['base_url'].'sistema/usuario/listar">Listar</a>
                                    </li>
                                    <li>
                                        <a href="'.$this->items['base_url'].'sistema/usuario/agregar">Agregar</a>
                                    </li>
                            </ul></li>';
                //FINALIZAR MENU
                $modulo .=  '</ul></li></div>';
                break;
            case '10':
                $modulo = '';
                $modulo .= '<div class="menu">
                            <ul class="list" style="height:100% !important;">
                            <li class="header">MENÚ DE NAVEGACIÓN</li>';
                //INICIAR MENU
                $modulo .= '<li class="active">
                                <a href="'.$this->items['base_url'].'sistema/home">
                                    <i class="material-icons">home</i>
                                    <span>Home</span>
                                </a>
                            </li>';
                //MODULO USUARIO
                $modulo .=  '<li><a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">portrait</i>
                                <span>Usuario</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="'.$this->items['base_url'].'sistema/usuario/listar">Listar</a>
                                </li>
                                <li>
                                    <a href="'.$this->items['base_url'].'sistema/usuario/agregar">Agregar</a>
                                </li>
                            </ul></li>';
                //MODULO PUBLICIDAD
                $modulo .=  '<li>
                                <a href="'.$this->items['base_url'].'sistema/publicidad/observar" >
                                    <i class="material-icons">developer_board</i>
                                    <span>Publicidad</span>
                                </a>
                            </li>';
                //FINALIZAR MENU
                $modulo .=  '</ul></li></div>';
                break;
            default:
                break;
        }
        return $modulo;
    }
    
    //FUNCION DE CARGA PARA LAS INTERNAS DEL SISTEMA
    public function pantallaCarga() {
        $string = '<div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Espere un Momento porfavor...</p>
            </div>
        </div>';
        return $string;  
    }
    
     //FUNCION DE NOTIFICACIONES DE ULTMOS USUARIOS REGISTRADOS
    public function notificaciones() {
        //NIVEL USUARIO
        $nivel = $this->ci->_session->sys_grade;
        $generaNotificaciones = '';
        switch ($nivel) {
            case '500': case '400':
                    //CAPTURAR FECHA DE HOY
                    $fechaHoy = date("Y-m-d");
                    //BUSCAR USAURIO QUE CUMPLAN LA CONDICION
                    $where = array('DATE(usuario.fecha_registro)' => $fechaHoy);
                    $empleado = $this->ci->m_usuario->mostrar_cuando($where);
                    //CANTIDAD DE USUARIOS
                    $cantidad = count($empleado);
                    $listadoUsuarios = array();
                    foreach($empleado AS $items){
                        //FECHA DESDE QUE SE REGISTRO
                        $fechaRegistro = $this->ci->complementos->dateDiff($items['fecha_registro']);
                        //GENERAR LISTADO DE USUARIOS
                        $listadoUsuarios[] = '
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="icon-circle bg-light-green">
                                        <i class="material-icons">person_add</i>
                                    </div>
                                    <div class="menu-info">
                                        <h4>'.$items['usuario'] .'</h4>
                                        <p>
                                            <i class="material-icons">access_time</i>' . $fechaRegistro . '
                                        </p>
                                    </div>
                                </a>
                            </li>';
                        }
                    //GENERAR NOTIFICACIONES  
                    $generaNotificaciones = 
                        '<li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                <i class="material-icons">notifications</i>
                                <span class="label-count">'.$cantidad.'</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">ULTIMOS USUARIOS REGISTRADOS</li>
                                <li class="body">
                                    <ul class="menu">'.
                                    $this->ci->complementos->iimplode($listadoUsuarios,',') .'</ul>
                                </li>
                                <li class="footer">
                                    <a href="javascript:void(0);">Ver todas las Notificaciones</a>
                                </li>
                            </ul>
                        </li>';
                break;
            default:
                break;
        }
        //IMPRESION DE RESULTADOS
        return $generaNotificaciones;  
    }
    
 
}
