<div class="container d-flex justify-content-center ">

    <form method="POST" action="app/comprobarRegistro.php">
        <h1 class="display-4 mb-5 mt-3">myClass Registro</h1>

        <div class="form-row ">
            <div class="form-group col-md-6 ">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" name="Email" required>
            </div>
            <div class="form-group col-md-6 ">
                <label for="inputPassword4">Contraseña</label>
                <input type="password" class="form-control" name="Password" required>
            </div>
            <div class="form-group col-md-6 ">
                <label for="inputPassword4">Repita la contraseña</label>
                <input type="password" class="form-control" name="PasswordRep" required>
            </div>
        </div>
        <div class="form-group col-md-7 p-0">
            <label for="inputAddress">Nombre completo</label>
            <input type="text" class="form-control" name="nombreCompleto" required>
        </div>

        <div class="form-row align-items-center">
            <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Familia Profesional</label>
                <select class="custom-select mr-sm-2" name="familia" required>
                    <option disabled selected value>Familias</option>
                    <option value="1"> Informática</option>
                    <option value="2">Comercio</option>
                    <option value="3">Mecánica</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6 ">
                <label for="inputCity">Edad</label>
                <input type="number" class="form-control" name="edad" required>
            </div>
            <div class="form-group col-md-6 ">
                <label for="inputState">Sexo</label>
                <select name="sexo" class="form-control">
                    <option disabled selected value>Sexo</option>
                    <option>Hombre</option>
                    <option>Mujer</option>
                    <option>Prefiero no contestar</option>
                </select>
            </div>
        </div>
        <div class="form-group  p-0">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="check" required>
                <label class="form-check-label" for="gridCheck">
                    Acepto las <a href="condiciones">condiciones de uso</a> y que myClass me folle el ano
                </label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>