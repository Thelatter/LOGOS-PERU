<?php

class Orden {

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

}
