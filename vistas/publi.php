<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

    body{   overflow-x: hidden;/*deshabilita scroll horizontal*/
}
        #noticia {
            /*margin-top: -70px; para ocultar la marca de forma chapuza*/
            float: right;
            width: 300px;
            height: 500px;
            margin: -90px -23px 0 0;
            border-radius:3%;
        }

        
    </style>




</head>

<body>
<!-- este para comparar
<iframe id="noticia" width="100%" height="100%" scroll="hide" src="https://www.inoreader.com/stream/user/1004840372/tag/xataka/view/html?cs=m" frameborder="0" tabindex="-1"></iframe>
-->
   

    <?php


    $alto = "500px";
    $ancho = "20%";
    $textAlign = "l";/*j,r,l,c*/
    $numNoticias = "1";
    $colorFondo = "ffffb7";
    $fontSize = "11";
    $textColor = "gray";
    $linkColor = "black";
    $dividerColor = "gray";
    $carpeta = "xataka";

    $src = 'https://www.inoreader.com/stream/user/1004840372/tag/' . $carpeta . '/view/html?ta=';
    /* lo soltamos */
    echo '<iframe id="noticia" width="' . $ancho . '" height="' . $alto . '" src="' . $src . $textAlign . '&n='.$numNoticias.'&fs=' . $fontSize . '&c=' . $textColor . '&lc=' . $linkColor . '&bc=' . $colorFondo . '&dc=' . $dividerColor . '" frameborder="0" tabindex="-1"></iframe>';



    ?>


</body>

</html>