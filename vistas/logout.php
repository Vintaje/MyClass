<?php
session_destroy();


header('Location: http://localhost/myclass');

?>

<?php
if(strpos($_SERVER['REQUEST_URI'],'.php')){
    header('Location: ../');
}
?>