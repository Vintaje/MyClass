<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class homecontroller{
    public static function mostrarHome($app, Request $request, Response $response, array $args){
        
        return $app->view->render($response, 'home.php',['name' => $args['name']]);
    }

}