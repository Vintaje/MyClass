<?php
    if(isset($_SESSION['name_user'])){
        if($_SESSION['name_user'] != ''){
            header('Location: http://localhost/myclass/panel-usuario');
        }
    }

?>

<link rel="stylesheet" href="css/iniciar_sesion.css" />
<div class="row">
    <div class="container foto" id="registration-form">
        <div class="image"></div>
        <div class="frm">
            <h1 class="display-4 mb-5 mt-3">myClass</h1>
            <h2>Iniciar Sesión</h2>
            <form method="POST" action="app/comprobarInicioSesion.php">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="Introduce tu email" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" name="pwd" placeholder="Introduce tu contraseña" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg">Entrar</button>
                    <div class="a_registro"><a id="a_registro" href="registro">Regístrate ahora</a></div>
                </div>

            </form>
        </div>
    </div>
</div>


<!-- modal-->
<div data-toggle="modal" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> Bienvenid@ a myClass
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Te has registrado correctamente!👍
                Ya puedes iniciar sesión
            </div>
            <div class="modal-footer">
                <button type="button" onclick="volver()" class="btn btn-primary" data-dismiss="modal">Perfecto</button>
            </div>
        </div>
    </div>
</div>

<script>

    function volver(){
        var URL = window.location.href.replace("Bienvenido","");
        location.href = URL; 
    }

    var URLactual = window.location.href;
    if (URLactual.includes("/Bienvenido")) {
        $(document).ready(function() {
            $("#exampleModalCenter").modal("show");
        });
    }


</script>





<!--PRUEBAS -->
<?php
/*
    include_once 'app/RepositorioUsuario.inc.php'; 

    $conexion = new conexion();
    $conexion->conectarBD();
    $conexion = conexion::getConexion();
    echo RepositorioUsuario::GenerarCodigoUsuario($conexion); 
*/

?> 