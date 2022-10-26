<?php

class Fecha {

    //put your code here
    public function convertir_fecha_tiempo($date) {
        return strtotime($date);
    }

    public function dia($dia) {
        switch ($dia) {
            case 1: case 01: return "Lunes";
            case 2: case 02: return "Martes";
            case 3: case 03: return "Miércoles";
            case 4: case 04: return "Jueves";
            case 5: case 05: return "Viernes";
            case 6: case 06: return "Sábado";
            case 7: case 07: return "Domingo";
        }
    }

    public function mes($mes) {
        switch ($mes) {
            case 1: case 01: return "Enero";
            case 2: case 02: return "Febrero";
            case 3: case 03: return "Marzo";
            case 4: case 04: return "Abril";
            case 5: case 05: return "Mayo";
            case 6: case 06: return "Junio";
            case 7: case 07: return "Julio";
            case 8: case 08: return "Agosto";
            case 9: case 09: return "Septiembre";
            case 10: return "Octubre";
            case 11: return "Noviembre";
            case 12: return "Diciembre";
        }
    }

    public function convertir_tiempo_fecha($tiempo, $style = '') {
        date_default_timezone_set('America/Lima');
        $fecha = date('Y-m-d H:i:s a', strtotime(str_replace('-','/', $tiempo)));
        $delimiter = explode(" ", $fecha);
        $date = explode("-", $delimiter[0]);
        $dia = $date[2];
        $mes = $date[1];
        $anio = $date[0];
        $tiempo = explode(":", $delimiter[1]);
        $segundos = $tiempo[2];
        $minuto = $tiempo[1];
        $hora = $tiempo[0];
        $meridiem = strtolower($delimiter[2]);
            if ($style == '') {
                return $fecha;
            } else {
                switch ($style) {
                    case '1':
                        $string = $dia . ' de ' . $this->analizar_mes($mes);
                        break;
                    case '2':
                        $string = $dia . ' de ' . $this->analizar_mes($mes) . ' del ' . $anio;
                        break;
                    case '3':
                        $string = $this->analizar_mes($mes) . ' ' . $dia . ', ' . $anio;
                        break;
                    case '4':
                        $string = $dia . ' ' . $this->analizar_mes($mes) . ' ' . $hora . ':' . $minuto . ' ' . $meridiem;
                        break;
                    case '5':
                        $string = $anio . '-' . $mes;
                        break;
                    case '6':
                        $string = $this->abreviatura($mes) . ' ' . $dia . ', ' . $anio;
                        break;
                    case '7':
                        $string = $dia . ' ' . $this->analizar_mes($mes) . ' del ' . $anio. ' a las ' . $hora . ':' . $minuto . ' ' . $meridiem;
                        break;
                    case 'date1':
                        $string = $dia . '-' . $mes . '-' . $anio;
                        break;
                    case 'date2':
                        $string = $dia . '/' . $mes . '/' . $anio;
                        break;
                    case 'datetime':
                        $string = $dia . '-' . $mes . '-' . $anio . ' ' . $hora . ':' . $minuto . ':' . $segundos;
                        break;
                    case 'hora':
                        $string = $hora .' ' . $meridiem;
                        break;
                    default:
                        return $fecha;
                }
                return $string;
            }
    }

    public function analizar_mes($month) {
        switch ($month) {
            case 1: case 01: return "Enero";
            case 2: case 02: return "Febrero";
            case 3: case 03: return "Marzo";
            case 4: case 04: return "Abril";
            case 5: case 05: return "Mayo";
            case 6: case 06: return "Junio";
            case 7: case 07: return "Julio";
            case 8: case 08: return "Agosto";
            case 9: case 09: return "Septiembre";
            case 10: return "Octubre";
            case 11: return "Noviembre";
            case 12: return "Diciembre";
        }
    }
    
    public function abreviatura($month) {
        switch ($month) {
            case 1: case 01: return "Ene";
            case 2: case 02: return "Feb";
            case 3: case 03: return "Mar";
            case 4: case 04: return "Abr";
            case 5: case 05: return "May";
            case 6: case 06: return "Jun";
            case 7: case 07: return "Jul";
            case 8: case 08: return "Ago";
            case 9: case 09: return "Sep";
            case 10: return "Oct";
            case 11: return "Nov";
            case 12: return "Dic";
        }
    }

}
