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
                <li class="nav-item"> <a class="nav-link" href="#"> Agregar amigo</a> </li>
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
    <form id="formAmigo" method="POST" action="">
        <h1 class="display-4 mb-5 mt-3"><a href="home">myClass</a> Agregar Amigo</h1>
        <div class="form-group">
            <label for="correo">Introduce el correo de tu amigo</label>
            <input type="email" class="form-control" id="correo">
        </div>
        <div class="form-group">
            <label for="mensaje">Envía un mensaje de presentación</label>
            <textarea class="form-control" id="mensaje" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Confirmar</button>
    </form>
</div>