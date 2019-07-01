<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="keywords" content="MyClass, Classroom, Class, FTPClass">
    <meta name="description" content="Web MyClass de gestion de grupos, alumnos y archivos compartidos">
    <meta name="image" content="">

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

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
<?php
    if (!isset($titulo) || empty($titulo)) {
        $titulo = 'My Class';
    }

    echo "<title>$titulo</title>";

    ?>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">


</head>

<body>
    <?php
        conexion :: conectarBD();
    ?>

   