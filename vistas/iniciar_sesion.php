<link rel="stylesheet" href="css/iniciar_sesion.css" />

<div class="container" id="registration-form">
        <div class="image"></div>
        <div class="frm">
            <h1>MyClass</h1>
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
                </div>
            </form>
        </div>
    </div>