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

    .enlaceClase:hover {
        background-color: #0275d8 !important;
        color: white;
        text-decoration: none;
    }

    .enlaceClase {
        text-decoration: none;
    }

    .btnClases:hover {
        text-decoration: none;
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

<div class="container p0 principal">
    <div class="row p0">
        <div class="col-md-4 p0">
            <!--Parte del perfil del usuario-->
            <div class="row p0">
                <div class="col-md-12 p0">

                    <div class="card" id="perfil">
                        <img src="https://i0.wp.com/geekazos.com/wp-content/uploads/2015/02/fb2.jpg?fit=1280%2C720" class="card-img-top" alt="avatar">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-user"></i> <?php echo kernel::encrypt_decrypt('decrypt', $usuario) ?></h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><i class="fas fa-users"></i> 12</li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="card-link"><i class="far fa-envelope"></i> Mis mensajes</a><br />
                            <a href="#" class="card-link"><i class="far fa-bell"></i> Notificaciones</a><br />
                            <a href="#" class="card-link"><i class="fas fa-sliders-h"></i> Configuración</a>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Calendario -->

            <div class="row pb-4">
                <div class="col-md-12">
                    <div class="container p0">
                        <div id="cal" style="margin: auto !important">
                            <div class="header">
                                <span class="left button" id="prev"> &lang; </span>
                                <span class="left hook"></span>
                                <span class="month-year" id="label"> </span>
                                <span class="right hook"></span>
                                <span class="right button" id="next"> &rang; </span>
                            </div>
                            <table id="days">
                                <td>DOM</td>
                                <td>LUN</td>
                                <td>MAR</td>
                                <td>MIE</td>
                                <td>JUE</td>
                                <td>VIE</td>
                                <td>SAB</td>

                            </table>
                            <div id="cal-frame">
                                <table class="curr">
                                    <tbody>
                                        <tr>

                                        </tr>
                                        <tr>

                                        </tr>
                                        <tr>

                                        </tr>
                                        <tr>

                                        </tr>
                                        <tr>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Parte central de la página -->
        <label class="col-md-8 p0" id="centro">

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
                                        <?php
                                            $conexion = new conexion();
                                            $conexion->conectarBD();
                                            $conexion = conexion::getConexion();
                                            RepositorioGrupo::recogerGrupos($conexion);

                                            ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <label class="row p0">
                <label class="col-md-12 p0">
                    <label class="card mb-3">
                        <img src="https://www.ealde.es/wp-content/uploads/2017/03/comunicacion-interna.jpg" class="card-img-top" alt="...">
                        <label class="card-body">
                            <h5 class="card-title"><i class="fas fa-search"></i> Explorar</h5>
                            <p class="card-text">Encuentra las clases perfectas para ti</p>
                            <label class="card-body">
                                <h6>Selecciona intereses:</h6>
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
                            <div class="card-body d-flex">
                                <button class="btn btn-primary ml-auto boton" type="button" data-toggle="collapse" data-target="#explorar" aria-expanded="false" aria-controls="explorar">
                                    Buscar
                                </button>
                            </div>
                            <!--Parte que se oculta -->
                        
                        </label>
                    </label>
                </label>
            </label>
        </div>
    </div>
</div>

<!--JavaScript para el calendario -->

<script>
    $(document).ready(function() {

        $('.first-button').on('click', function() {

            $('.animated-icon1').toggleClass('open');
        });

    });



    var CALENDAR = function() {
        var wrap, label,
            months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

        function init(newWrap) {

            wrap = $(newWrap || "#cal");
            label = wrap.find("#label");
            wrap.find("#prev").bind("click.calendar", function() {
                switchMonth(false);
            });
            wrap.find("#next").bind("click.calendar", function() {
                switchMonth(true);
            });
            label.bind("click", function() {
                switchMonth(null, new Date().getMonth(), new Date().getFullYear());
            });
            label.click();
        }

        function switchMonth(next, month, year) {
            var curr = label.text().trim().split(" "),
                calendar, tempYear = parseInt(curr[1], 10);
            month = month || ((next) ? ((curr[0] === "Diciembre") ? 0 : months.indexOf(curr[0]) + 1) : ((curr[0] === "Enero") ? 11 : months.indexOf(curr[0]) - 1));
            year = year || ((next && month === 0) ? tempYear + 1 : (!next && month === 11) ? tempYear - 1 : tempYear);

            if (!month) {
                if (next) {
                    if (curr[0] === "Diciembre") {
                        month = 0;
                    } else {
                        month = months.indexOf(curr[0]) + 1;
                    }
                } else {
                    if (curr[0] === "Enero") {
                        month = 11;
                    } else {
                        month = months.indexOf(curr[0]) - 1;
                    }
                }
            }

            if (!year) {
                if (next && month === 0) {
                    year = tempYear + 1;
                } else if (!next && month === 11) {
                    year = tempYear - 1;
                } else {
                    year = tempYear;
                }
            }

            calendar = createCal(year, month);

            $("#cal-frame", wrap)
                .find(".curr")
                .removeClass("curr")
                .addClass("temp")
                .end()
                .prepend(calendar.calendar())
                .find(".temp")
                .fadeOut("slow", function() {
                    $(this).remove();
                });

            $('#label').text(calendar.label);

        }

        function createCal(year, month) {
            var day = 1,
                i, j, haveDays = true,
                startDay = new Date(year, month, day).getDay(),
                daysInMonths = [31, (((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0)) ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31],
                calendar = [];

            if (createCal.cache[year]) {
                if (createCal.cache[year][month]) {
                    return createCal.cache[year][month];
                }
            } else {
                createCal.cache[year] = {};
            }
            i = 0;
            while (haveDays) {
                calendar[i] = [];
                for (j = 0; j < 7; j++) {
                    if (i === 0) {
                        if (j === startDay) {
                            calendar[i][j] = day++;
                            startDay++;
                        }
                    } else if (day <= daysInMonths[month]) {
                        calendar[i][j] = day++;
                    } else {
                        calendar[i][j] = "";
                        haveDays = false;
                    }
                    if (day > daysInMonths[month]) {
                        haveDays = false;
                    }
                }
                i++;
            }

            if (calendar[5]) {
                calendar = calendar.slice(0, 6);
            }

            for (i = 0; i < calendar.length; i++) {
                calendar[i] = "<tr><td>" + calendar[i].join("</td><td>") + "</td></tr>";
            }
            calendar = $("<table>" + calendar.join("") + "</table>").addClass("curr");

            $("td:empty", calendar).addClass("nil");
            if (month === new Date().getMonth()) {
                $('td', calendar).filter(function() {
                    return $(this).text() === new Date().getDate().toString();
                }).addClass("today");
            }
            createCal.cache[year][month] = {
                calendar: function() {
                    return calendar.clone()
                },
                label: months[month] + " " + year
            };

            return createCal.cache[year][month];

        }
        createCal.cache = {};
        return {
            init: init,
            switchMonth: switchMonth,
            createCal: createCal
        };
    };
</script>
<script>
    var cal = CALENDAR();
    cal.init();
</script>

<?php
} else {

    header('Location: http://localhost/myclass');
}
