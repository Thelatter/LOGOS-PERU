<?php

class Alerta {

    public function mensajeError($mensaje, $opcion = FALSE) {
        $string = '<div class="alert alert-warning alert-dismissable">';
        $string .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        if ($opcion === TRUE) {
            $string .= '<strong>Error </strong>' . $mensaje;
        } else {
            $string .= '<strong>Error </strong><li style="margin-left: 12px;">' . $mensaje . '</li>';
        }
        $string .= '</div>';
        return $string;
    }

    public function mensajeExito($mensaje, $opcion = FALSE) {
        $string = '<div class="alert alert-success alert-dismissable">';
        $string .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        if ($opcion === TRUE) {
            $string .= '<strong>EXITO: </strong>' . $mensaje;
        } else {
            $string .= '<strong>EXITO: </strong><li style="margin-left: 12px;">' . $mensaje . '</li>';
        }
        $string .= '</div>';
        return $string;
    }
    
    public function alertaError($mensaje) {
        $string = '<script>';
        $string .= 'if(!alertify.errorAlert){';
        $string .= 'alertify.dialog("errorAlert",function factory(){';
        $string .= 'return{';
        $string .= 'build:function(){';
        $string .= "var errorHeader = ".'"'."<span class='fa fa-times-circle fa-2x text-red' style='vertical-align:middle;'></span> ¡¡ERROR!!".'"'.";";
        $string .= 'this.setHeader(errorHeader);';
        $string .= '}};},true, "alert");}';
        $string .= 'alertify.errorAlert(\''.$mensaje.'\');';
        $string .= '</script>';
        return $string;
    }

    public function alerta_error($mensaje) {
        $string = '<script>';
        $string .= 'if(!alertify.errorAlert){';
        $string .= 'alertify.dialog("errorAlert",function factory(){';
        $string .= 'return{';
        $string .= 'build:function(){';
        $string .= "var errorHeader = ".'"'."<span class='fa fa-times-circle fa-2x text-red' style='vertical-align:middle;'></span> ¡¡ERROR!!".'"'.";";
        $string .= 'this.setHeader(errorHeader);';
        $string .= '}};},true, "alert");}';
        $string .= 'alertify.errorAlert(\''.$mensaje.'\');';
        $string .= '</script>';
        return $string;
    }
    
    public function alertaImportante($mensaje) {
        $string = '<script>';
        $string .= 'if(!alertify.errorAlert){';
        $string .= 'alertify.dialog("errorAlert",function factory(){';
        $string .= 'return{';
        $string .= 'build:function(){';
        $string .= "var errorHeader = ".'"'."<span class='fa fa-warning fa-2x text-yellow' style='vertical-align:middle;'></span> ¡¡AVISO!!".'"'.";";
        $string .= 'this.setHeader(errorHeader);';
        $string .= '}};},true, "alert");}';
        $string .= 'alertify.errorAlert(\'<h4>'.$mensaje.'</h4>\');';
        $string .= '</script>';
        return $string;
    }

    public function alertaExito($mensaje) {
        $string = '<script>';
        $string .= 'if(!alertify.successAlert){';
        $string .= 'alertify.dialog("successAlert",function factory(){';
        $string .= 'return{';
        $string .= 'build:function(){';
        $string .= "var errorHeader = ".'"'."<span class='fa fa-check-circle fa-2x text-green' style='vertical-align:middle;'></span> ¡¡ÉXITO!!".'"'.";";
        $string .= 'this.setHeader(errorHeader);';
        $string .= '}};},true, "alert");}';
        $string .= 'alertify.successAlert(\''.$mensaje.'\');';
        $string .= '</script>';
        return $string;
    }

    public function mensaje($mensaje){
        $string = '<div class="container row"><div class="row col-md-12"><div class="row col-md-6"><div class="box box-success box-solid">';
        $string .= '';
        $string .= '<div class="box-body">';
        $string .= $mensaje;
        $string .= '</div></div></div></div></div>';
        return $string;
    }
    
    public function location_href($url){
        $string = '<script>location.href="';
        $string .= $url;
        $string .= '"</script>';
        return $string;
    }
    
       
    public function refrescar_tiempo($time = 3000){
        $string = '<script>';
        $string .= 'setTimeout(function(){ parent.location.reload() }, '.$time.');';
        $string .= '</script>';
        return $string;
    }

   public function mensajeBienvenida($usuario) {
    $string = '<div class="container">
                  <div class="modal fade" id="miBienvenida" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header btn-success">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h2 class="modal-title">Bienvenido</h2>
                        </div>
                        <div class="modal-body">
                          <p>Hola como estas : <strong>'. $usuario .'</strong>.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>';
    return $string;  
    }
}
