<?php



/*
Version 1.1


CEO:
Emilio Rubiales
Carlos Gonzales
Jorge Segade
Adrian Sanchez
*/


?>


<?php
include_once 'app/conexion.inc.php';

/**
 * Indexar URL
 */


 /**
  * www.myclass.es/pagina
  * 
  */

$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
$uri_segments = array_filter($uri_segments);
$uri_segments = array_slice($uri_segments,0);
  
print_r($uri_segments);
$ruta_elegida = 'vistas/404.php';


if($uri_segments[0] == 'myclass'){

    if(count($uri_segments) == 1){
        $ruta_elegida = 'vistas/home.php';
    } else if(count($uri_segments) == 2){
        switch($uri_segments[1]){
            case 'pagina':
                $ruta_elegida = 'vistas/pagina.php';

            case 'home':
                $ruta_elegida = 'vistas/home.php';
        }


    }else{
        $ruta_elegida = 'vistas/404.php';
    
    }
    

}

include_once $ruta_elegida;

