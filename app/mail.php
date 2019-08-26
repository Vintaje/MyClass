

<?php
    //ini_set( 'display_errors', 1 );
    //error_reporting( E_ALL );
    $from = "contacto@myclass.es";
    $to = "jorge96gaming@gmail.com";
    $subject = "Probando";
    $message = "Funciona";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    echo "Se ha enviado confirmación al correo.";
?>