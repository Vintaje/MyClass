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
</style>
<div class="container p0">

    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="menu"> <a class="navbar-brand" href="#">myClass</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
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
                <li class="nav-item"><a class="nav-link" href="#">Cerrar sesión</a></li>
            </ul>
        </div>
    </nav>
</div>

<div class="container p0">
    <div class="row p0">
        <div class="col-md-4 p0">
            <!--Parte del perfil del usuario-->
            <div class="row p0">
                <div class="col-md-12 p0">

                    <div class="card" id="perfil">
                        <img src="https://i0.wp.com/geekazos.com/wp-content/uploads/2015/02/fb2.jpg?fit=1280%2C720" class="card-img-top" alt="avatar">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-user"></i> Mi perfil</h5>
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

            <div class="row">
                <div class="col-md-12">
                    <div class="container p0">
                        <div id="cal" style="margin: auto !important">
                            <div class="header">
                                <span class="left button" id="prev"> &lang; </span>
                                <span class="left hook"></span>
                                <span class="month-year" id="label"> June 20&0 </span>
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
                                            <td class="nil"></td>
                                            <td class="nil"></td>
                                            <td>1</td>
                                            <td>2</td>
                                            <td>3</td>
                                            <td>4</td>
                                            <td>5</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>7</td>
                                            <td>8</td>
                                            <td>9</td>
                                            <td>10</td>
                                            <td class="today">11</td>
                                            <td>12</td>
                                        </tr>
                                        <tr>
                                            <td>13</td>
                                            <td>14</td>
                                            <td>15</td>
                                            <td>16</td>
                                            <td>17</td>
                                            <td>18</td>
                                            <td>19</td>
                                        </tr>
                                        <tr>
                                            <td>20</td>
                                            <td>21</td>
                                            <td>22</td>
                                            <td>23</td>
                                            <td>24</td>
                                            <td>25</td>
                                            <td>26</td>
                                        </tr>
                                        <tr>
                                            <td>27</td>
                                            <td>28</td>
                                            <td>29</td>
                                            <td>30</td>
                                            <td class="nil"></td>
                                            <td class="nil"></td>
                                            <td class="nil"></td>
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
        <div class="col-md-8 p0" id="centro">

            <div class="row p0" id="inicio">
                <div class="col-md-12 p0">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <h1 class="display-4">Inicio</h1>
                            <p class="lead">Bienvenid@ al panel principal de myClass</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row p0">
                <div class="col-md-12 p0">
                    <div class="card mb-3">
                        <img src="https://www.ealde.es/wp-content/uploads/2017/03/brainstorming.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Mis clases</h5>
                            <p class="card-text">En este apartado podrás ver las clases a las que perteneces</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row p0">
                <div class="col-md-12 p0">
                    <div class="card mb-3">
                        <img src="https://www.ealde.es/wp-content/uploads/2017/03/comunicacion-interna.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Mis grupos</h5>
                            <p class="card-text">En este apartado podrás ver los grupos a los que perteneces</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<!--JavaScript para el calendario -->

<script>
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
                for (i = 0; i < calendar[5].length; i++) {
                    if (calendar[5][i] !== "") {
                        calendar[4][i] = "<span>" + calendar[4][i] + "</span><span>" + calendar[5][i] + "</span>";
                    }
                }
                calendar = calendar.slice(0, 5);
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