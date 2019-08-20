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

<div class="container d-flex justify-content-center ">

    <form id="formClase" method="POST" action="insertarClase">
        <h1 class="display-4 mb-5 mt-3"><a href="home">myClass</a> Crear Clase</h1>

        <div class="form-row">
            <div class="form-group col-md-6 ">
                <label>Nombre</label>
                <input type="text" class="form-control" name="NombreClase" required>
            </div>
        </div>

        <div class="form-row align-items-center">
            <div class="col-auto my-1">
                <label class="mr-sm-2">Temática</label>
                <select class="custom-select mr-sm-2" name="tematica" required>
                    <option value="0" selected value>General</option>
                    <option value="1">Informática</option>
                    <option value="2">Comercio</option>
                    <option value="3">Mecánica</option>
                </select>
            </div>
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