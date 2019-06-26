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


<?

/**
 * Indexar URL
 */


$url = parse_url($_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);

$ruta = $url['path'];

$partes_ruta[0] = explode('/', $ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta,0);

$ruta_elegida = 'vistas/404.php';


if($partes_ruta[0] == 'www.myclass.es'){

    if(count($partes_ruta) == 1){
        $ruta_elegida = 'vistas/home.php';
    } else if(count($partes_ruta) == 2){
        switch($partes_ruta[1]){
            case 'pagina':
                $ruta_elegida = 'vistas/pagina.php';

        }

    }

}else{
    $ruta_elegida = 'vistas/404.php';

}


include_once $ruta_elegida;

echo "hola";
echo "quepatio";


hola tio que pa tio ta gilipoya tio;