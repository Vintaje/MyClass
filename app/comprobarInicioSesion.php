<?php
include_once 'kernel.inc.php';
include_once 'RepositorioUsuario.inc.php';

$conexion = new conexion();
$conexion->conectarBD();

$emailForm = $_POST['email'];
$pwdForm = $_POST['pwd'];

$kernel = new kernel();

//echo $kernel-> encrypt_decrypt("encrypt","prueba@gmail.com");

$conexion = new conexion();
$conexion->conectarBD();

$usuarioCompleto = RepositorioUsuario::getUsuario($conexion, $kernel->encrypt_decrypt("encrypt", $emailForm));
if ($usuarioCompleto == null) {
    //correo no encontrado
    echo "Usuario o contraseña incorrectos";
} else {
    $emailBD = $usuarioCompleto->getCorreo();
    //echo $kernel-> encrypt_decrypt("decrypt",$emailBD);

    if ($usuarioCompleto->getPassword() == $pwdForm) {
        echo "Sesión iniciada";
    } else {
        //pass no correcta
        echo "Usuario o contraseña incorrectos";
    }
}
