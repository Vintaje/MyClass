<?php



/*
Version 1.1


CEO:
Emilio Rubiales
Carlos Gonzales
Jorge Segade
Adrian Sanchez
*/


/**
 * Composer Slim
 * 
 */

include_once 'app/conexion.inc.php';

conexion :: conectarBD();

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

// Get container
$container = new \Slim\Container(); //Create Your container


// Register component on container
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig('vistas');

    // Instantiate and add Slim specific extension
    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    return $view;
};



//Override the default Not Found Handler before creating App
$container['notFoundHandler'] = function ($container) {
    return function ($request, $response) use ($container) {
            return $container['view']->render($response, '404.php')->withStatus(404);
    };
};

//Create Slim

$app = new \Slim\App($container);


$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    return $this->view->render($response, 'home.php',['name' => $args['name']]);
});

//Ejecutar Home
$app->get('/home', function ($request, $response, $args) {
    return $this->view->render($response, 'home.php');
})->setName('inicio');

// Run app
$app->run();






conexion::desconectarBD();