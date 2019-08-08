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
                <input id="pwd1" type="password" onfocusout="comprobarPass(1)" class="form-control" name="Password" required>
            </div>
            <div class="form-group col-md-6 ">
                <label for="inputPassword4">Repita la contraseña</label>
                <input id="pwd2" type="password" onfocusout="comprobarPass(2)" class="form-control" name="PasswordRep" required>
            </div>
        </div>
        <!-- 
            2 alertas ocultas, cuando pass2 pierde el foco se va a la función.
        -->
        <div id="success" style="display:none" class="alert alert-success"><strong>Las contraseñas coinciden</strong></div>
        <div id="danger" style="display:none" class="alert alert-danger"><strong>La contraseña no es válida</strong></div>
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
                    Acepto las <a href="condiciones">condiciones de uso</a> de myClass.
                </label>
            </div>
        </div>

        <button  id="botonSubmit" type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
<script type="text/javascript">
    var num;

    function comprobarPass(num) {
        //se recibe el valor de las pass
        var pass1 = document.getElementById("pwd1").value;
        var pass2 = document.getElementById("pwd2").value;
        //se comparan y se comprueba si está alguna vacía
        if (pass1 === pass2 && pass1.length != 0 && pass2.length != 0) {
            //se muestra la alerta verde
            document.getElementById('danger').style.display = 'none';

            document.getElementById('success').style.display = 'block';
            document.getElementById('botonSubmit').style.display = 'block';

            /*setTimeout(function() {
                document.getElementById('success').style.display = 'none';
            }, 1000);*/
        } else {
            //se oculta la alerta verde si hubiera

            document.getElementById('success').style.display = 'none';
            document.getElementById('botonSubmit').style.display = 'none';
            //se muestra la alerta roja

            document.getElementById('danger').style.display = 'block';

            //se oculta la alerta roja a los 3s
           /*setTimeout(function() {
                document.getElementById('danger').style.display = 'none';
            }, 3000);*/
            //se vacían los campos pass
            if (num == 2) {
                document.getElementById('pwd1').value = '';
                document.getElementById('pwd2').value = '';
            }

        }

    }
</script>