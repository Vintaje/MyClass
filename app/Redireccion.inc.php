<?php
//Redirigir a otra pagina
class Redireccion {
    public static function redirigir($url){
        header('Location: ' . $url, true, 301);
        exit();
    }
}