<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="keywords" content="MyClass, Classroom, Class, FTPClass,myclass,myClass,classroom,aula,virtual,aula virtual, portal">
    <meta name="description" content="Web myClass de gestión de grupos, alumnos y archivos compartidos, En myclass tenemos un objetivo claro: Ofrecer a todos los estudiantes, en cualquier nivel
                            de estudios, una herramienta para compartir sus conocimientos.
                            Pero no solo eso. En MyClass, nos preocupamos de tu presente (ofreciéndote noticias en función de tu
                            familia profesional) y de tu futuro (conectándote con una red de empresas que buscan tu talento).
                            Así que, ¿qué esperas? ¡Entra en la clase del futuro! ">
    <meta name="image" content="">
    <!--Color barra de navegación Google Chrome-->
    <meta name="theme-color" content="#0275d8">

    <meta property="og:url" content="">
    <meta property="og:type" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="">

    <meta name="twitter:card" content="">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">

    
    <!--Para iconos-->
    <link href="https://use.fontawesome.com/releases/v5.0.2/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <?php
    if (!isset($titulo) || empty($titulo)) {
        $titulo = 'My Class';
    }

    echo "<title>$titulo</title>";

    ?>

    <!-- Contraseñas -->
	<script src="js/jquery_fortaleza.min.js"></script>
	<script src="js/password_strength.js"></script>
	<script src="js/jquery-strength.js"></script>

    
    
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">

</head>

<body>


    <?php
    conexion::conectarBD();
    session_start();
    ?>
    <script>
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            // some code..
        }
    </script>