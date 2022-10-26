<?php
/**
 * Descripcion of Seguridad_acciones
 *
 */
class Seguridad_acciones {
    function __construct(){
        $this->ci = & get_instance();
    }
    /*Para el listado de las acciones*/
    public function permiso_mantenimiento($grado,$tipo_modulo=''){        
        switch ($grado) {
            case 500: case 400:
                if($tipo_modulo == 1){
                    $acciones = 'editar|bloquear|permitir|eliminar|subir|bajar';
                }elseif($tipo_modulo == 2){
                    $acciones = 'observar|editar|bloquear|permitir';
                }elseif($tipo_modulo == 3){
                    $acciones = 'editar_correo|activar|activado';
                }elseif($tipo_modulo == 4){
                    $acciones = 'observar|eliminar|editar|bloquear|permitir|reporte';
                }elseif($tipo_modulo == 5){
                    $acciones = 'eliminar';
                }elseif($tipo_modulo == 6){
                    $acciones = 'bloquear|permitir';
                }else{
                    $acciones = 'observar|editar|bloquear|permitir|eliminar';
                }
                break;
            case 255:
                 $acciones = 'editar'; 
                 break;
            case 10:
                 $acciones = 'observar|editar'; 
                 break;   
            default:
                break;
        }
        return $acciones;
    }
    /*Para los metodos*/
    public function permiso_mantenimiento_url($grado,$metodo){
        switch ($grado) {
            case 500: case 400:
                $funciones = array('observar','editar','bloquear','permitir','listar','agregar','eliminar','reporteActividades','sumarvisita','actividadesusuario');
                break;
            case 255:
                 $funciones = array('editar');
                 break;
            case 10:
                $funciones = array('observar','editar','sumarvisita');
                break;
            default:
                break;
        }
        
        if(in_array($metodo, $funciones)){
            return TRUE; 
        }else{
            return FALSE;
        }
        
    }
    /*Permiso para Controladores*/
    public function permiso_controlador($grado,$controlador){
        switch ($grado) {
            case 500: case 400:
                $controladores = array('usuario','actividades','contadores','correo','categoria','subcategoria','producto','nosotros','slider','articulo','servicio','cliente','pop','contacto','video','galeria_imagen','anuncios','eventos');
                break;
            case 255:
                $controladores = array('usuario','contadores'); 
                break;
            case 10:
                $controladores = array('usuario','contadores'); 
                break;
            default:
                break;
        }
        if(in_array($controlador, $controladores)){
            return TRUE; 
        }else{
            return FALSE;
        }
    }
    
}


?>