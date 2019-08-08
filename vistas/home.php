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
                <input type="password" class="form-control" name="pwd" placeholder="Introduce tu password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg">Submit</button>
                <div class="a_registro"><a id="a_registro" href="registro">Regístrate ahora</a></div>
            </div>

        </form>
    </div>
</div>
</div>
