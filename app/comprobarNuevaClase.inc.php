<?php
include_once 'conexion.inc.php';
include_once 'Grupo.class.php';
include_once 'RepositorioGrupo.inc.php';

session_start();

$conexion = new conexion();
$conexion->conectarBD();
$conexion = conexion::getConexion();



$codigo = RepositorioGrupo::GenerarCodigoClases($conexion);
$usuario = $_SESSION['codigo_user'];
echo $usuario;
if(isset($_POST)){
    $privado = 1;
}else{
    $privado = 0;
}
$grupo = new Grupo($codigo, $_POST['NombreClase'], 30, $usuario,
                    $privado, $_POST['tematica'], $_POST['descripcion']);

$grupo_insertado = RepositorioGrupo::setGrupo($conexion, $grupo);


if($grupo_insertado){
    RepositorioGrupo::UnirseAClase($conexion,$usuario, $codigo);
    
    header('Location: http://localhost/myclass/panel-usuario');
    
    
}



