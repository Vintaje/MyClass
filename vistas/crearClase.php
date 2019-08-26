<? php/*
if (isset($_SESSION['name_user'])) {
    if ($_SESSION['name_user'] != '') {
        header('Location: http://localhost/myclass/panel-usuario');
    }
}


if(strpos($_SERVER['REQUEST_URI'],'.php')){
    header('Location: ../');
}
*/
?>

<style>
    a:hover {
        text-decoration: none !important;
    }

    @media (max-width: 768px) {
        .container {
            max-width: 720px;
        }

        .display-4 {
            font-size: 1.75rem;
            font-weight: 150;
            line-height: 1;
        }
    }
</style>

<div class="container p0">

    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light" id="menu"> <a class="navbar-brand" href="panel-usuario">myClass</a>
        <button class="navbar-toggler first-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="animated-icon1"><span></span><span></span><span></span></div>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"> <a class="nav-link" href="panel-usuario"> Inicio <span class="sr-only">(current)</span></a> </li>
                <li class="nav-item"> <a class="nav-link" href="AgregarAmigo"> Agregar amigo</a> </li>
                <li class="nav-item"> <a class="nav-link" href="NuevaClase"> Crear clase</a> </li>
                <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Noticias
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown"> <a class="dropdown-item" href="#"> General</a> <a class="dropdown-item" href="#"> Mi familia profesional</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav navbar-right">
                <li class="nav-item"><a class="nav-link" href="logout">Cerrar sesión</a></li>
            </ul>
        </div>
    </nav>
</div>

<div class="container d-flex justify-content-center mt-5">

    <form id="formClase" method="POST" action="app/comprobarNuevaClase.inc.php">
        <h1 class="display-4 mb-5 mt-3"><a href="home">myClass</a> Crear Clase</h1>

        <div class="form-row">
            <div class="form-group col-md-6 ">
                <label>Nombre</label>
                <input type="text" class="form-control" name="NombreClase" required>
            </div>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea maxlenght="100" name="descripcion" class="form-control rounded-0" id="descripcion" rows="3"></textarea>
        </div>
        

        <div class="form-row align-items-center">
            <div class="col-auto my-1">
                <label class="mr-sm-2">Temática</label>
                <select class="custom-select mr-sm-2" name="tematica" required>
                    <option value="0" selected value>General</option>
                    <option value="1">Informática</option>
                    <option value="2">Comercio</option>
                    <option value="3">Deporte</option>
                    <option value="4">Química</option>
                    <option value="5">Idiomas</option>
                </select>
            </div>
        </div>

        <div class="form-check">
            <input type="checkbox" name="privado" class="form-check-input" id="privado">
            <label class="form-check-label" for="privado">Privado</label>
        </div>


        <div class="form-row align-items-center">
            <div class="col-auto my-1 mt-3">
                <!-- onclic correcto()-->

                <button id="botonSubmit" type="button" onclick="submit()" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </form>
</div>

<!-- modal-->
<div data-toggle="modal" class="modal fade" id="clase" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> Genial
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Clase creada con éxito.👍
            </div>
            <div class="modal-footer">
                <button type="button" onclick="submit()" class="btn btn-primary" data-dismiss="modal">De acuerdo</button>
            </div>
        </div>
    </div>
</div>


<script>
    function correcto() {
        $(document).ready(function() {
            $("#clase").modal("show");
        });
    }

    function submit() {
        document.getElementById("formClase").submit();
    }
</script>