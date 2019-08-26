<?php

if (isset($_SESSION['name_user'])) {
    $usuario = $_SESSION['name_user'];

    include_once 'app/RepositorioTarea.inc.php';


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
                <li class="nav-item"> <a class="nav-link" href="AgregarAmigo"> Agregar amigo</a> </li>
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


<div class="container p0 principal">
    <div class="row p0">
        <div class="col-md-4 p0">
            <!--Parte del perfil del usuario-->
            <div class="row p0">
                <div class="col-md-12 p0">

                    <div class="card" id="perfil">

                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-user"></i> <?php echo kernel::encrypt_decrypt('decrypt', $usuario) ?></h5>
                        </div>
                        <div class="card-body">
                            <a href="#" class="card-link"><i class="far fa-comments"></i> Chat de Clase</a>
                            <br />
                            <a href="#" class="card-link"><i class="fas fa-book"></i> Calificaciones</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Parte central de la página -->
        <div class="col-md-8 p0" id="centro">

            <div class="row p0">
                <div class="col-md-12 p0">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-graduation-cap"></i> Temario</h5>
                            <p class="card-text">En este apartado podrás ver el contenido de la asignatura</p>
                            <div class="card-body d-flex">
                                <button class="btn btn-primary ml-auto boton" type="button" data-toggle="collapse" data-target="#temario" aria-expanded="false" aria-controls="temario">
                                    Ver
                                </button>
                            </div>
                            <!--Parte que se oculta -->
                            <div class="collapse" id="temario">
                                <div class="card card-body acordeon">
                                    <div id="accordion">
                                        <?php

                                            RepositorioTarea::recogerTareas($conexion, $_GET['grupo'], 0);

                                            ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row p0">
                <div class="col-md-12 p0">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-graduation-cap"></i> Entrega de Ejercicios</h5>
                            <p class="card-text">En este apartado podrás ver y entregar tus ejercicios</p>
                            <div class="card-body d-flex">
                                <button class="btn btn-primary ml-auto boton" type="button" data-toggle="collapse" data-target="#ejercicios" aria-expanded="false" aria-controls="ejercicios">
                                    Ver
                                </button>
                            </div>
                            <!--Parte que se oculta -->
                            <div class="collapse" id="ejercicios">
                                <div class="card card-body acordeon">
                                    <div id="accordion">


                                        <?php

                                            RepositorioTarea::recogerTareas($conexion, $_GET['grupo'], 1);

                                            ?>
                                    </div>
                                </div>
                            </div>
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
