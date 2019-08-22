<?php

if (isset($_SESSION['name_user'])) {
    $usuario = $_SESSION['name_user'];
    ?>
<?php
    if (strpos($_SERVER['REQUEST_URI'], '.php')) {
        header('Location: ../');
    }
    ?>
<!--Menú de navegación-->
<style>
    #menu {
        margin-bottom: 20px;
    }

    #segunda {
        margin-left: 0px;
    }

    @media screen and (max-width: 767px) {
        html {
            padding: 0 !important;
        }
    }



    .gustos {
        margin-bottom: 30px;
    }



    .principal {
        margin-top: 70px;
    }

    .boton {
        margin-bottom: 10px;
    }

    .acordeon {
        border: none !important;
    }
</style>

<div class="container p0">

    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light" id="menu"> <a class="navbar-brand" href="#">myClass</a>
        <button class="navbar-toggler first-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="animated-icon1"><span></span><span></span><span></span></div>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"> <a class="nav-link" href="panel-usuario"> Inicio <span class="sr-only">(current)</span></a> </li>
                <li class="nav-item"> <a class="nav-link" href="#"> Agregar amigo</a> </li>
                <li class="nav-item"> <a class="nav-link" href="NuevaClase"> Crear clase</a> </li>
                <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Noticias
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown"> <a class="dropdown-item" href="#">General</a> <a class="dropdown-item" href="#">Mi familia profesional</a>
                    </div>
                </li>
                <li class="nav-item"> <a class="nav-link" href="Historial">Mis mensajes</a> </li>
                <li class="nav-item"> <a class="nav-link" href="#">Notificaciones</a> </li>
                <li class="nav-item"> <a class="nav-link" href="Calendario">Calendario</a> </li>
            </ul>
            <ul class="navbar-nav navbar-right">
                <li class="nav-item"> <a class="nav-link" href="Configuracion">Configuracion</a> </li>
                <li class="nav-item"><a class="nav-link" href="logout">Cerrar sesión</a></li>
            </ul>
        </div>
    </nav>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card border-dark mb-3" style="margin-top: 10%;">
                <div class="card-header">
                    <h5> <?php echo kernel::encrypt_decrypt('decrypt', $usuario) ?> </h5>
                </div>
                <div class="card-body text-dark">
                    <h5 class="card-title">Dark card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                        <br />
                        <br />
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                        <br />
                        <br />
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                        <br />
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                        <br />
                        <br />
                        

                    </p>

                    
                    <div class="nuevo_fichero" style="float:right">

                        <label class="control-label" for="fichero1">
                            <h6>Añadir nuevo fichero</h6>
                        </label>
                        <div class="controls">
                            <input id="fichero1" type="file" style="display:none" name="fichero1">
                            <div class="input-append">
                                <input id="falso1" class="input-xlarge" type="text">
                                <a class="btn btn-file"><i class="fa fa-folder-open-o"></i> <b> Seleccionar </b> </a>
                            </div>
                        </div>

                        <script type="text/javascript">
                            // http://duckranger.com/2012/06/pretty-file-input-field-in-bootstrap/ 
                            // Cuando se pulsa el falso manda el click al autentico
                            $('.btn-file').on('click', function() {
                                $(this).parent().prev().click();
                            });
                            // Cuando el autentico cambia hace cambiar al falso
                            $('input[type=file]').on('change', function(e) {
                                $(this).next().find('input').val($(this).val());
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
} else {

    header('Location: http://localhost/myclass');
}
