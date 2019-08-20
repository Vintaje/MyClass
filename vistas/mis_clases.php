<?php

if (isset($_SESSION['name_user'])) {
    $usuario = $_SESSION['name_user'];
    ?>
<?php
    if (strpos($_SERVER['REQUEST_URI'], '.php')) {
        header('Location: ../');
    }
    ?>
<!--
<div class="container p0">

    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light" id="menu"> <a class="navbar-brand" href="#">myClass</a>
        <button class="navbar-toggler first-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">     <div class="animated-icon1"><span></span><span></span><span></span></div>
</button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"> <a class="nav-link" href="#"> Inicio <span class="sr-only">(current)</span></a> </li>
                <li class="nav-item"> <a class="nav-link" href="#">Agregar amigo</a> </li>
                <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Noticias
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown"> <a class="dropdown-item" href="#">General</a> <a class="dropdown-item" href="#">Mi familia profesional</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav navbar-right">
                <li class="nav-item"><a class="nav-link" href="logout">Cerrar sesión</a></li>
            </ul>
        </div>
    </nav>
</div>
-->
<style>
    .menu_vertical {
        max-width: 15%;
        min-height: 100%;
        float: left;
    }
    #contenido{
        float: right;
    }
</style>

<body>
    <div class="menu_vertical">
        <nav class="navbar navbar bg-light bg-dark navbar-dark ">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"> <a class="nav-link" href="#"> Inicio <span class="sr-only">(current)</span></a> </li>
                <li class="nav-item"> <a class="nav-link" href="#">Agregar amigo</a> </li>
                <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Noticias
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown"> <a class="dropdown-item" href="#">General</a> <a class="dropdown-item" href="#">Mi familia profesional</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav navbar-right">
                <li class="nav-item"><a class="nav-link" href="logout">Cerrar sesión</a></li>
            </ul>
        </nav>
    </div>




    <div class="container p0 principal" id="contenido">
        <div class="row p0">
            
            <!-- Parte central de la página -->
            <div class="col-md-8 p0" id="centro">

                <div class="row p0">
                    <div class="col-md-12 p0">
                        <div class="card mb-3">
                            <img src="https://www.ealde.es/wp-content/uploads/2017/03/brainstorming.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-graduation-cap"></i> Mis Clases</h5>
                                <p class="card-text">En este apartado podrás ver las clases a las que perteneces</p>
                                <div class="card-body d-flex">
                                    <button class="btn btn-primary ml-auto boton" type="button" data-toggle="collapse" data-target="#clases" aria-expanded="false" aria-controls="clases">
                                        Ver
                                    </button>
                                </div>
                                <!--Parte que se oculta -->
                                <div class="collapse" id="clases">
                                    <div class="card card-body acordeon">
                                        <div id="accordion">
                                            <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                            Bases de Datos
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                    <div class="card-body">
                                                        Clase de primero de BBDD
                                                        <div class="card-body d-flex">
                                                            <a class="btn btn-primary ml-auto" href="mis-clases" role="button">Ir</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingThree">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                            Programación
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                                    <div class="card-body">
                                                        Clase de primero de Programación
                                                        <div class="card-body d-flex">
                                                            <a class="btn btn-primary ml-auto" href="mis-clases" role="button">Ir</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
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
                            <img src="https://www.ealde.es/wp-content/uploads/2017/03/comunicacion-interna.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-search"></i> Explorar</h5>
                                <p class="card-text">Encuentra las clases perfectas para ti</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

</body>



















<?php
} else {

    header('Location: http://localhost/myclass');
}
