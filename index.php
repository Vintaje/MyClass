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
conexion::conectarBD();

include_once 'app/kernel.inc.php';

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
$uri_segments = array_slice($uri_segments, 0);


$ruta_elegida = 'vistas/404.php';
$titulo = 'MyClass | 404';


if ($uri_segments[0] == 'myclass') {

    if (count($uri_segments) == 1) {
        $ruta_elegida = 'vistas/home.php';
        $titulo = 'MyClass | Home';
    } else if (count($uri_segments) == 2) {
        switch ($uri_segments[1]) {
            case 'home':
                $ruta_elegida = 'vistas/home.php';

                $titulo = 'MyClass | Home';
                break;
            case 'wip':
                $ruta_elegida = 'vistas/wip.php';
                $titulo = 'MyClass | Mantenimiento';
                break;
            case 'registro':
                $ruta_elegida = 'vistas/registro.php';
                $titulo = 'MyClass | Registro'; 
                break; 
            case 'IniciarSesion':
                $ruta_elegida = 'vistas/iniciar_sesion.php';
                $titulo = 'MyClass | IniciarSesion'; 
                break; 
        }
    } else {
        $ruta_elegida = 'vistas/404.php';
        $titulo = 'MyClass | 404';
    }
}





/**
 * Plantilla de abertura 
 */
include_once 'plantillas/doc-declaracion.inc.php';


/**
 * Contentido de la pagina
 */

include_once $ruta_elegida;

include_once 'plantillas/doc-declaracion.inc.php';