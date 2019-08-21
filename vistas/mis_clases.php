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
    .container-fluid {
        padding-left: 0px;

    }

    a {
        color: white;
    }

    li :hover {
        color: thistle;
    }
</style>


<div class="container-fluid">
    <div class="row">
        <div class="col-2 collapse d-md-flex bg-secondary pt-2 min-vh-100" id="sidebar">
            <ul class="nav flex-column flex-nowrap">
                <li class="nav-item active"> <a class="nav-link" href="panel-usuario"> Inicio <span class="sr-only">(current)</span></a> </li>
                <li class="nav-item"> <a class="nav-link" href="#"> Agregar amigo</a> </li>
                <li class="nav-item"> <a class="nav-link" href="NuevaClase"> Crear clase</a> </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#submenu1" data-toggle="collapse" data-target="#submenu1">Noticias</a>
                    <div class="collapse" id="submenu1" aria-expanded="false">
                        <ul class="flex-column pl-2 nav">
                            <li class="nav-item"><a class="nav-link py-0" href="#">General</a></li>
                            <li class="nav-item">
                                <a class="nav-link collapsed py-1" href="#submenu1sub1" data-toggle="collapse" data-target="#submenu1sub1">Mi familia profesional</a>
                                <div class="collapse" id="submenu1sub1" aria-expanded="false">
                                    <ul class="flex-column nav pl-4">
                                        <li class="nav-item">
                                            <a class="nav-link p-1" href="#">
                                                <i class="fa fa-fw fa-clock-o"></i> Daily
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link p-1" href="#">
                                                <i class="fa fa-fw fa-dashboard"></i> Dashboard
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link p-1" href="#">
                                                <i class="fa fa-fw fa-bar-chart"></i> Charts
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link p-1" href="#">
                                                <i class="fa fa-fw fa-compass"></i> Areas
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>

        <div class="col pt-2">

            <div class="col">
                <div class="card border-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Próximos eventos</div>
                    <div class="card-body text-secondary">
                        <h5 class="card-title">Trabajos y Examenes</h5>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col pt-3">
            <div class="col">
                <div class="card border-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Chat</div>
                    <div class="card-body text-secondary">
                        <h5 class="card-title">Chat de Clase</h5>

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
