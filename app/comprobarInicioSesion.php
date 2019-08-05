<?php
include_once 'kernel.inc.php';
include_once 'RepositorioUsuario.inc.php';

    $emailForm=$_POST['email'];
    $pwdForm=$_POST['pwd'];

    $kernel = new kernel();


    $repo = new RepositorioUsuario();

    $usuarioCompleto = $repo->getUsuario($emailForm);
    if($usuarioCompleto==null){
        echo "error usuario no encontrado";
    }else{
        $emailBD = $usuarioCompleto->getCorreo();
        echo $kernel-> encrypt_decrypt("decrypt",$emailBD);
    }

   //lanza Fatal error: Uncaught Error: Call to undefined method 
   //conexion::prepare() in C:\xampp\htdocs\myclass\app\RepositorioUsuario.inc.php:61 
?>