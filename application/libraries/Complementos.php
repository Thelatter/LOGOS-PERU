<?php

class Complementos {
    
    
    private $datos = array();

    public function crearpase() {
        $cons = "bcdfghjklmnpqrstvwxyz";
        $vocs = "aeiou";
        $num = "0123456789";
        for ($x=0; $x < 8; $x++) {
            mt_srand ((double) microtime() * 1000000);
            $con[$x] = substr($cons, mt_rand(0, strlen($cons)-1), 1);
            $voc[$x] = substr($vocs, mt_rand(0, strlen($vocs)-1), 1);
            $num[$x] = substr($num, mt_rand(0, strlen($num)-1), 1);
        }
        $makepass = $con[0] . $num[1]. $voc[0] .$con[2] . $con[1] .$num[0]. $voc[1] . $con[3];
        return $makepass;
    }
    
    public function comprobar_nombre ($nome) {
		$busca = array (
			'á','é','í','ó','ú','à','è','ì','ò','ù',
			'â','ê','î','ô','û','ä','ë','ï','ö','ü',
			'Á','É','Í','Ó','Ú','À','È','Ì','Ò','Ù',
			'Â','Ê','Î','Ô','Û','Ä','Ë','Ï','Ö','Ü',
			'ñ','Ñ','ç','Ç',' ','(',')','?','¿','/',
			'#','º','ª','!','·','#','%','¬','=','¡',
			'^',';','"',"'",'+','[',']','{','}',';',
			'~','¤','¶','ø','þ','æ','ß','ð','«','»',
			'¢','µ','','\\',':','*','<','>','|','$',
			'&','@',',');
		$cambia = array (
			'a','e','i','o','u','a','e','i','o','u',
			'a','e','i','o','u','a','e','i','o','u',
			'A','E','I','O','U','A','E','I','O','U',
			'A','E','I','O','U','A','E','I','O','U',
			'n','N','c','C','_','_','_','_','_','_',
			'_','o','a','_','_','_','_','_','_','_',
			'_','_','_','_','_','_','_','_','_','_',
			'_','_','_','_','_','_','_','_','_','_',
			'_','_','_','_','_','_','_','_','_','_',
			'_','_','_');

	return str_replace($busca, $cambia, trim($nome));
    }
    
    public function debug($array){
	echo "<pre>\n";
	print_r($array);
	echo "</pre>\n";
    }

    
    public function mayuscula($str){
	$mal = "abcdefghijklmnñopqrstuvwxyzáéíóúü";
	$bien = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚÜ";
	return strtr($str,"$mal","$bien"); 

    }
    
    public function minuscula($str){
	#return  preg_replace("/([A-Z\xC0-\xDF])/e","chr(ord('\\1')+32)",$str);
	$bien = "abcdefghijklmnñopqrstuvwxyzáéíóúü";
	$mal = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚÜ";
	return strtr($str,"$mal","$bien"); 
    }
    
    
    public function generarPassword( $longitud, $tipo = "alfanumerico" ){ 
	if ( $tipo=="alfanumerico" ){ 
		$exp_reg="[^A-Z0-9]"; 
	}elseif( $tipo=="alfa" ){ 
		$exp_reg="[^A-Z]"; 
	}elseif( $tipo=="numerico" ){ 
		$exp_reg="[^0-9]"; 
	} 
	return substr( preg_replace( $exp_reg, "", md5( time() ) ) . 
	preg_replace( $exp_reg, "", md5(time() ) ) .
	preg_replace( $exp_reg, "", md5( time() ) ), 0, $longitud );
    }

    
    public function iniciales($nombre) {
	$notocar = Array('del','de');
	$trozos = explode(' ',$nombre);
	$iniciales = '';
	for($i=0;$i<count($trozos);$i++){
		if(in_array($trozos[$i],$notocar)) $iniciales .= $trozos[$i]." ";
		else $iniciales .= substr($trozos[$i],0,1).". ";
	}
	return $iniciales;
    }
    
    public function birthday($date){
        list($year,$month,$day) = explode("-",$date);
        $year_diff  = date("Y") - $year;
        $month_diff = date("m") - $month;
        $day_diff   = date("d") - $day;
        if ($month_diff < 0) $year_diff--;
        elseif (($month_diff==0) && ($day_diff < 0)) $year_diff--;
        return $year_diff;
    }
    
    public function diferencia_dias($fecha1,$fecha2){
          $diferencia_dias = (strtotime($fecha1) - strtotime($fecha2));
          return $diferencia_dias;
    }
      
    public function invertirFecha( $fecha ){
        return implode( "-", array_reverse( preg_split( "/\D/", $fecha ) ) );
    }
    
    public function ceros($numero, $ceros=2){
        return sprintf("%0".$ceros."s", $numero );
    }
    
    public function validarFecha( $fecha, $invertir = 1 ){
	if( $invertir == 1 ) $fecha = implode( "-", array_reverse( preg_split( "/\D/", $fecha ) ) );
	$fecha = explode("-",$fecha);
	if( sizeof( $fecha ) != 3 ) return false;
	if( checkdate( $fecha[1],$fecha[0],$fecha[2]  ) ) return true;
	else return false;
    }
    

    public function findStr($string,$beg,$end) {
	  $p1 = strpos($string, $beg) + strlen($beg);
	  $string2 = substr($string,$p1);
	  $p2 = strpos($string2, $end);
	  $found = substr($string,$p1,$p2);
	  return $found;
    }
    
    public function eexplode($separator,$string){
		$array = explode($separator,$string);
		foreach($array as $key => $val){
			if(empty($val)){
				unset($array[$key]);
			} 
        }
        return $array;
    }
    

    public function iimplode($unif,$string = ''){
		$array = implode($unif,$string);
        return $array;
    }


    public function Concatenar($concat,$string,$articulo){
    	if($articulo != ''){
    		$interes = '<p style="text-align:justify"><strong><span style="color:#000000;font-size:14px"><span style="background-color:#FFFF00">TE PUEDE INTERESAR:</span></span> <a href="'.base_url().'noticiasinterna/'. $articulo[0]->url .'"><span style="color:#000000">&nbsp;'. $articulo[0]->titulo .'</span></a></strong></p>';
    	}else{
    		$interes = '';
    	}

	    $contenido = '';
	    foreach ($string as $key=>$value) {
	        $contenido=$contenido.$value;

	        if($key!=count($string)-1)
	        	if($key == 5){
	        		$contenido= $contenido.$concat.$interes;
	        	}else{
	        		$contenido=$contenido.$concat;
	        	}else{
	        		$contenido;
	        	}
	            
	    }       

	    return $contenido;
    }

    public function obuscar($str, $key) {
	if( ! defined( 'obuscar_hash' ) ) define( 'obuscar_hash', '545487875458715154879664164' );
	srand( obuscar_hash );
	$salida = '';
	$total = strlen($str);
	for( $i = -1; ++$i < $total; ){
		for( $j = -1; ++$j < ord(substr($key, $i % strlen($key), 1)); ) $toss = rand(0, 255);
		$mascara = rand(0, 255);
		$salida .= chr( ord( substr( $str, $i, 1) ) ^ $mascara);
	}
	return $salida;
    }
    
    public function triangularNumber($number){
        for($i = 1; $i <= $number; $i++){
            $result += $i;
        }  
        return $result;
    }
    
    public function generateHash(){
	$result = "";
	$charPool = '0123456789abcdefghijklmnopqrstuvwxyz';
	for($p = 0; $p<15; $p++)
		$result .= $charPool[mt_rand(0,strlen($charPool)-1)];
	return sha1(md5(sha1($result)));
    }
    
    public function parse_textile($content, $safe_tags = '<a>, <b>, <i>, <u>, <blockquote>, <code>') {
      $content = ' ' . trim($content) . ' ';
      $modifiers = Array('\*\*'=>'b', '\__'=>'i', '\*'=>'strong', '\_'=>'em', '\-'=>'del', '\?\?'=>'cite', '%'=>'span', '\+'=>'ins', '\^'=>'sup', '\~'=>'sub', '@'=>'code');
      $content = strip_tags($content, $safe_tags);
      $content = preg_replace('([[:space:]])"[[:<:]](.*)[[:>:]]"([[:space:]])', '\1&#8220;\2&#8221;\3', $content);
      $content = preg_replace('([)([[:alnum:]]){1,5}(])', '<sup><a href="#fn\1">\1</a></sup>', $content);
      $content = preg_replace('(<p>)(fn([[:alnum:]]){1,}. )([[:alnum:][:punct:][:space:]]+)(<\/p>)', '<p id="fn\3">\4</p>', $content);
      $content = str_replace(Array('--', '...', ' x ', '(TM)', '(R)', '(C)'), Array('&#8212;', '&#8230;', ' &#215; ', '&#8482;', '&#174;', '&#169;'), $content);
      while (list($key, $value) = @each($modifiers)) {
         $content = preg_replace('([[:space:]])' . $key . '([[:alnum:]\(\)\*_-~\\+\\^!?\.<\\/>]{1,}([[:alnum:][:space:]\(\)\*_-~\\+\\^!?\.<\\/>"]+)?)' . $key, '\1<' . $value . '>\2</' . $value . '>', $content);
      }
      $content = preg_replace('([[:alnum:]]+)(\()+([[:alnum:][:space:]]+)(\))', '<acronym title="\3">\1</acronym>', $content);
      $content = preg_replace('([[:space:]])((http://)[[:alnum:][:punct:]]+)([[:space:]])?', '\1<a href="\2" rel="nofollow">\2</a>\4', $content);
      $content = str_replace("\n", "<br />\n", trim($content));
      return $content;
   }
   
   function borrarTodo($raiz){
	if($objs = glob($raiz."/*")){
		foreach($objs as $obj) {
			is_dir($obj)? borrarTodo($obj) : unlink($obj);
		}
	}
	rmdir($raiz);
    }
    
    function mayorValor( $array ){
	$a = array_unique( $array );
	$s = 0;
	if( is_array( $a ) )
		foreach( $a as $v )
			$s = intval( $v ) > $s ? $v : $s;
	return $s;
    }
    
    function clean($value) {
       if(!get_magic_quotes_gpc())
       { $value = addslashes($value); }
       $value = strip_tags($value);
       return $value;
    }

    function html_to_plain($html) {
                  $plain_message = str_replace(array('<br />', '<br>', '<p>', '</p>', '</title>','<strong>','</strong>'), "\n", $html);
		  $plain_message = str_replace(array("<table>", "</tr></table>"), "\n============", $plain_message);
		  $plain_message = str_replace("<tr>", "| ", $plain_message);
		  $plain_message = str_replace("</tr>", "\n-------------", $plain_message);
		  $plain_message = str_replace(array("<title>", '<h1>'),  "# ", $plain_message);
		  $plain_message = str_replace(array('<th>'), "__", $plain_message);
		  $plain_message = str_replace(array('</th>'), "__ | ", $plain_message);
		  $plain_message = str_replace(array('</td>'), " | ", $plain_message);
		  $plain_message = str_replace(array('<strong>', '</strong>'), '__', $plain_message);
		  $plain_message = str_replace(array('<em>', '</em>'), '_', $plain_message);
		  $plain_message = str_replace(array('<a'), '[', $plain_message);
		  $plain_message = str_replace(array('href="'), '](', $plain_message);
		  $plain_message = str_replace(array('<img src="'), '[', $plain_message);
		  $plain_message = str_replace(array('alt='), '', $plain_message);
		  $plain_message = str_replace(array('/>'), ']', $plain_message);
		  $plain_message = strip_tags($plain_message);
		  //$plain_message = str_replace("  ", ' ', $plain_message);
		  $plain_message = preg_replace('|(?mi-Us)[  ]{2,}|', ' ', $plain_message);
        
        return $plain_message ;
    }
    
    public function resaltarTexto($contenido, $palabra, $etiquetaInicial = '<b>', $etiquetaFinal = '</b>') {
        if($contenido !== ''){
            if(is_array($palabra) && !empty($palabra)){
                $tmp = $contenido;
                foreach($palabra as $k => $v){
                    $tmpEnlace = $etiquetaInicial.'<a href="'.$v.'">'.$k.'</a>'.$etiquetaFinal;
                    if(strpos($tmp, $tmpEnlace) === FALSE){
                        $tmp = preg_replace('/('.preg_quote(htmlentities($k), '/').')/'.('true' ? 'u' : ''), $etiquetaInicial.'<a style="color: #c52b2b !important;" href="'.$v.'">'.'\\1'.'</a>'.$etiquetaFinal, $tmp, 1);
                    } else{
                        continue;
                    }
                }
                $generaContenido = $tmp;
            } else{
                $generaContenido = $contenido;
            }
            return $generaContenido;
        } else{
            return FALSE;
        }
    }

    public function buscarCadena($cadena,$palabra){
        if (strstr($cadena,$palabra)){
            return "si se encontro";
        }else{
            return "no se encontro";
        }
    }
    
     public function datatable($opciones, $cssClase){

        $datos = array(
            'bAutoWidth' => FALSE, 
            'oLanguage' => array(
                'sEmptyTable' => 'No hay registros disponibles', 
                'sInfo' => 'Hay _TOTAL_ registros. Mostrando del _START_ al _END_', 
                'sLoadingRecords' => 'Por favor espere. Cargando...', 
                'sLengthMenu' => ''
                    . '<select class="form-control selectpicker">'
                    . '<option value="5">Mostrar [5] registros</option>'
                    . '<option value="10">Mostrar [10] registros</option>'
                    . '<option value="20">Mostrar [20] registros</option>'
                    . '<option value="50">Mostrar [50] registros</option>'
                    . '<option value="100">Mostrar [100] registros</option>'
                    . '<option value="-1">Todos los registros</option>'
                    . '</select>', 
                'oPaginate' => array(
                    'sLast' => 'Última página',
                    'sFirst' => 'Primera', 
                    'sNext' => 'Siguiente', 
                    'sPrevious' => 'Anterior'
                )
            )
        );
        $generaDatos = array_merge($opciones, $datos);
        $resultado = array(
            'jquery' => json_encode($generaDatos, JSON_NUMERIC_CHECK), 
            'clases' => $cssClase
        );
        return $resultado;
    }
    
    function dateDiff($fecha_registro) {
      $to = time();
      $hace= "hace";
      $fecha = preg_replace('/:[0-9][0-9][0-9]/','',$fecha_registro);
      $from = strtotime($fecha);
      $diff = $to - $from;
      $info = array();
      if($diff>31556926) {
        // Años
        $info['años'] = ($diff - ($diff%31556926))/31556926;
        $diff = $diff%31556926;
      }
       elseif($diff>2629743) {
        // Meses
        $info['meses'] = ($diff - ($diff%2629743))/2629743;
        $diff = $diff%2629743;
      }
      elseif($diff>604800) {
        // Semanas
        $info['semanas'] = ($diff - ($diff%604800))/604800;
        $diff = $diff%604800;
      }
      elseif($diff>86400) {
        // Dias
        $info['dias'] = ($diff - ($diff%86400))/86400;
        $diff = $diff%86400;
      }
      elseif($diff>3600) {
        // Horas
        $info['horas'] = ($diff - ($diff%3600))/3600;
        $diff = $diff%3600;
      }
      elseif($diff>60) {
        // Minutos
        $info['minutos'] = ($diff - ($diff%60))/60;
        $diff = $diff%60;
      }
      elseif($diff>0) {
      // Segundos
        $info['segundos'] = $diff;
      }
      $f = '';
      foreach($info as $k=>$v) {
        if($v>0) $f .= "$v $k, ";
      }
      return $hace." ".substr($f,0,-2);
    }

    public function ocultar_texto($password,$number_show){
      $star = '';
      
      if(is_numeric($number_show) && $number_show < strlen($password)){
        $star = str_repeat('*',(strlen($password) -$number_show)) . substr($password,-$number_show,$number_show);
      }
      return $star;
    }
    public function subir($array, $elemento) {

        $_temp = sort($array);

        $data = array();

        foreach ($array as $items) {

            $data[] = (int) $items;

        }

        $posicion = array_keys($data, $elemento);

        if (!empty($posicion)) {

            $temp = array();

            foreach ($data as $key => $value) {

                if ($key < ($posicion[0] - 1)) {

                    $temp[] = (int) $value;

                } elseif ($key == $posicion[0]) {

                    $temp[] = (int) $elemento;

                } else {

                    $temp_old[] = $value;

                }

            }

            foreach ($temp_old as $key => $value) {

                $temp[] = (int) $value;

            }

            return $temp;

        }

        return FALSE;

    }

    public function cortar_texto_limpio($texto, $words){
        //Limpiar texto 
        if(!get_magic_quotes_gpc()){
             $texto = addslashes($texto);
        }
        $text = strip_tags($texto);
        //Cortar texto
        $matches = preg_split("/\s+/", $text, $words + 1);
        $sz = count($matches);
        if ($sz > $words){
            unset($matches[$sz-1]);
            return implode(' ',$matches)." ...";
        }
        return $text;
    }

    public function bajar($array, $elemento) {

        $_temp = sort($array);

        $data = array();

        foreach ($array as $items) {

            $data[] = (int) $items;

        }

        $posicion = array_keys($data, $elemento);

        if (!empty($posicion)) {

            $temp = array();

            foreach ($data as $key => $value) {

                if ($key < $posicion[0]) {

                    $temp[] = (int) $value;

                } elseif ($key == ($posicion[0] + 1)) {

                    $temp[] = (int) $value;

                } else {

                    $temp_old[] = $value;

                }

            }

            foreach ($temp_old as $key => $value) {

                $temp[] = (int) $value;

            }

            return $temp;

        }

        return FALSE;

    }

    public function aleatorio($longitud = 40, $minuscula = TRUE, $mayuscula = FALSE, $numero = TRUE, $caracterEspecial = FALSE) {
        $source = '';
        if ($minuscula === TRUE) {
            $source .= 'abcdefghijklmnopqrstuvwxyz';
        }
        if ($mayuscula === TRUE) {
            $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        if ($numero === TRUE) {
            $source .= '1234567890';
        }
        if ($caracterEspecial === TRUE) {
            $source .= '|@#~$%()=^*+[]{}-_';
        }
        if ($longitud > 0) {
            $resultado = '';
            $source = str_split($source, 1);
            for ($i=1; $i<=$longitud; $i++) {
                mt_srand((double) microtime() * 1000000);
                $obtieneNumero = mt_rand(1, count($source));
                $resultado .= $source[$obtieneNumero - 1];
            }
        }
        return $resultado;
    }

    public function parseoVideoUrl($string, $type = 'url', $action = 'youtube', $data = array(),$widht = '100%',$height = '100%'){
        $newResult = array();
        switch($action){
            case 'youtube':
                if(is_array($data) && count($data) > 0){
                    $parameter = '?';
                    foreach($data as $key => $val){
                        $parameter .= $key.'='.$val.'&';
                    }
                    $parameter = rtrim($parameter, '&');
                } else{
                    $parameter = '';
                }
                $result = preg_replace(
                        "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", 
                        "$2", 
                        $string
                );
                if($type == 'url'){
                    $newResult = array(
                        'content' => 'http://www.youtube.com/embed/'.$result.$parameter,
                        'pic' => 'http://img.youtube.com/vi/'.$result.'/0.jpg'
                    );
                } elseif($type == 'iframe'){
                    $newResult = array(
                        'content' => '<iframe src="http://www.youtube.com/embed/'.$result.$parameter.'" frameborder="0" allowfullscreen widht="'.$widht.'" height="'.$height.'"></iframe>',
                        'pic' => 'http://img.youtube.com/vi/'.$result.'/0.jpg'
                    );
                } else{
                    $newResult = array(
                        'content' => 'http://www.youtube.com/embed/'.$result.$parameter,
                        'pic' => 'http://img.youtube.com/vi/'.$result.'/0.jpg'
                    );
                }
                return $newResult;
        }
    }


}


   
