<?php
include_once 'app/RepositorioGrupo.inc.php';
?>

<style>
    .masthead {
        height: 100vh;
        max-height: 450px;
        background-image: url('img/desdearriba.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        color: snow;
        margin-bottom: 10px;
    }

    @media screen and (max-width: 767px) {
        .masthead {
            background-image: url('img/myclass.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: snow;
            margin-bottom: 10px;
        }

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

<header class="masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <h1 class="font-weight-light">Encuentra clases hechas para tus intereses</h1>
                <p class="lead">Así de fácil</p>
            </div>
        </div>
    </div>
</header>

<div class="row p0">
    <div class="col-md-12 p0">
        <div class="card p0">
            <h5 class="card-header"><i class="fas fa-search"></i> Búsqueda</h5>
            <div class="card-body">
                <h5 class="card-title p0">Intereses</h5>
                <p class="card-text p0">Dinos qué es lo que te gusta y comienza la búsqueda</p>
                <label class="card-body p0">
                    <label class="btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-primary m-2">
                            <input class="gustos" type="checkbox" name="options" id="option2" autocomplete="off"> Informática
                        </label>
                        <label class="btn btn-outline-success m-2">
                            <input class="gustos" type="checkbox" name="options" id="option2" autocomplete="off"> Comercio
                        </label>
                        <label class="btn btn-outline-danger m-2">
                            <input class="gustos" type="checkbox" name="options" id="option2" autocomplete="off"> Deporte
                        </label>
                        <label class="btn btn-outline-warning m-2">
                            <input class="gustos" type="checkbox" name="options" id="option2" autocomplete="off"> Química
                        </label>
                        <label class="btn btn-outline-info m-2">
                            <input class="gustos" type="checkbox" name="options" id="option2" autocomplete="off"> Idiomas
                        </label>
                    </label>
                </label>
                <!-- Aquí iría el botón -->
                <?php
                $conexion = new conexion();
                $conexion->conectarBD();
                $conexion = conexion::getConexion();

                $grupos = [];

                $grupos = RepositorioGrupo::getGrupoPublico($conexion);

                ?>
                <div class="collapse" id="clases">
                    <div class="card card-body acordeon">
                        <div id="accordion">
                            <div id="informatica">
                                <?php

                                ?>
                            </div>
                            <div id="comercio">
                            </div>
                            <div id="deporte">
                            </div>
                            <div id="quimica">
                            </div>
                            <div id="idioma">
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    #informatica {
                        display: none;
                    }

                    #comercio {
                        display: none;
                    }

                    #deporte {
                        display: none;
                    }

                    #quimica {
                        display: none;
                    }

                    #idioma {
                        display: none;
                    }
                </style>
            </div>
        </div>
    </div>
</div>

<script>
    function showInformatica(box) {

        var chboxs = document.getElementsByName("informatica");
        var vis = "none";
        for (var i = 0; i < chboxs.length; i++) {
            if (chboxs[i].checked) {
                vis = "block";
                break;
            }
        }
        document.getElementById(box).style.display = vis;


    }

    function showInformatica(box) {

        var chboxs = document.getElementsByName("informatica");
        var vis = "none";
        for (var i = 0; i < chboxs.length; i++) {
            if (chboxs[i].checked) {
                vis = "block";
                break;
            }
        }
        document.getElementById(box).style.display = vis;


    }

    function showMe(box) {

        var chboxs = document.getElementsByName("publicos");
        var vis = "none";
        for (var i = 0; i < chboxs.length; i++) {
            if (chboxs[i].checked) {
                vis = "block";
                break;
            }
        }
        document.getElementById(box).style.display = vis;


    }
</script>