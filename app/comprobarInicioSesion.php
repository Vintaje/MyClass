<?php
include_once 'kernel.inc.php';
include_once 'RepositorioUsuario.inc.php';
include_once 'Redireccion.inc.php';
include_once 'ControlSesion.inc.php';

$conexion = new conexion();
$conexion->conectarBD();
//se trae usuario y pass del formulario por post.
$emailForm = $_POST['email'];
$pwdForm = $_POST['pwd'];

$kernel = new kernel();

//echo $kernel-> encrypt_decrypt("decrypt","dDB0aDliTnZuU1hCajU0Sk10Smtqdz09");

$conexion = new conexion();
$conexion->conectarBD();

//buscamos usuario en la bbdd pasándole la conexión con bbdd y el email del formulario encriptado.

$usuarioCompleto = RepositorioUsuario::getUsuario($conexion, $kernel->encrypt_decrypt("encrypt", $emailForm));

//si no se trae usuario es que no existe
if ($usuarioCompleto == null) {
    //correo no encontrado
    echo "Usuario o contraseña incorrectos";
    $url = '../'; 
    Redireccion::redirigir($url); 
} else {
    //$emailBD = $usuarioCompleto->getCorreo();
    //echo $kernel-> encrypt_decrypt("decrypt",$emailBD);
    
//comprueba que la contraseña de la bbdd(encriptada) coincide con la del formulario(encriptada en este momento)
    if ($usuarioCompleto->getPassword() ==  $kernel->encrypt_decrypt("encrypt", $pwdForm)) {
        echo "Sesión iniciada";
        $url = '../panel-usuario';
        session_start();
        $_SESSION['name_user'] = $usuarioCompleto->getNombreCompleto();
        Redireccion::redirigir($url);
    } else {
        //pass no correcta
        echo "Usuario o contraseña incorrectos";
        $url = '../home'; 
        Redireccion::redirigir($url); 
    }
}
