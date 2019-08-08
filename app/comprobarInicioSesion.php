<?php
include_once 'kernel.inc.php';
include_once 'RepositorioUsuario.inc.php';
include_once 'Redireccion.inc.php';
include_once 'ControlSesion.inc.php';

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
        $url = '../panel-usuario';
        ControlSesion::IniciarSesion($usuarioCompleto->getCodigo, $usuarioCompleto->getNombreCompleto());
        Redireccion::redirigir($url);
    } else {
        //pass no correcta
        echo "Usuario o contraseña incorrectos";
    }
}
