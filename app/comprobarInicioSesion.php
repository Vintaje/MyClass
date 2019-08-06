<?php
include_once 'kernel.inc.php';
include_once 'RepositorioUsuario.inc.php';

    $conexion = new conexion();
    $conexion->conectarBD();

    $emailForm=$_POST['email'];
    $pwdForm=$_POST['pwd'];

    $kernel = new kernel();


    echo $emailForm;

    $conexion = new conexion();
    $conexion->conectarBD();
        
    $usuarioCompleto = RepositorioUsuario::getUsuario($conexion,$emailForm);
    if($usuarioCompleto==null){
        echo "error usuario no encontrado";
    }else{
        $emailBD = $usuarioCompleto->getCorreo();
        echo $kernel-> encrypt_decrypt("decrypt",$emailBD);
    }

   //lanza Fatal error: Uncaught Error: Call to undefined method 
   //conexion::prepare() in C:\xampp\htdocs\myclass\app\RepositorioUsuario.inc.php:61 
