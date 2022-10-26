<?php

class Carrito_mantenimiento {

    public function accion($id, $data, $controlador, $estado) {
        $items = explode('|', $data);
        $string = '';
        foreach ($items as $row) {
            switch (trim($row)) {
                case 'ver':
                    $string .= '<a href="' . base_url() . 'manager/' . $controlador . '/observar/' . $id . '"><i class="fa fa-search text-primary"></i> Observar</a>';
                    $string .= '<br/>';
                    break;
                case 'eliminar':
                    $string .= '<a href="" class="eliminar" data-url="' . base_url() . 'manager/' . $controlador . '/accion_eliminar/' . $id . '"><i class="fa fa-close"></i> Eliminar</a>';
                    $string .= '<br />';
                    break;
                case 'pagado':
                    if ($estado == 0) {
                        $string .= '<a href="" class="pagado" data-url="' . base_url() . 'manager/' . $controlador . '/accion_pagado/' . $id . '"><i class="fa fa-credit-card"></i> Marcar como pagado</a>';
                        $string .= '<br />';
                    }
                    break;
                case 'entregado':
                    if ($estado == 1) {
                        $string .= '<a href="" class="entregado" data-url="' . base_url() . 'manager/' . $controlador . '/accion_entregado/' . $id . '"><i class="fa fa-gift"></i> Marcar como entregado</a>';
                        $string .= '<br />';
                    }
                    break;
                default:
                    break;
            }
        }
        return $string;
    }

    public function estado($estado) {
        switch ($estado) {
            case '0':
                $estado = 'Pendiente';
                return $estado;
            case '1':
                $estado = 'Pagado';
                return $estado;
            case '2':
                $estado = 'Entregado';
                return $estado;
            case '3':
                $estado = 'No procedio';
                return $estado;
            default:
                break;
        }
    }

}
