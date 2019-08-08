<?php
include_once 'kernel.inc.php';
include_once 'RepositorioUsuario.inc.php';
include_once 'Redireccion.inc.php';
include_once 'ControlSesion.inc.php';

$conexion = new conexion();
$conexion->conectarBD();
//se trae los datos del formulario por post.
$emailForm = $_POST['Email'];
$passForm = $_POST['Password'];
$passFormRep = $_POST['PasswordRep'];
$nombreForm = $_POST['nombreCompleto'];
$familiaForm = $_POST['familia'];
$edadForm = $_POST['edad'];
$sexoForm = $_POST['sexo'];
$checkForm = $_POST['check'];


echo $emailForm;
echo $passForm;
echo $passFormRep;
echo $nombreForm;
echo $familiaForm;
echo $edadForm;
echo $sexoForm;
echo $checkForm;


