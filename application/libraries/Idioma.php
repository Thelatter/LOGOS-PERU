<?php

class Idioma {
    public function cambiar_idioma($id) {
            switch ($id) {
                case 1:
                    include 'idioma/espanol.php';
                    break;
                case 2:
                    include 'idioma/ingles.php';    
                    break;
            }
            return  $data = array_merge($data);;
    }
}
