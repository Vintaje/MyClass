<?php
session_destroy();


header('Location: ../myclass/');

?>

<?php
if(strpos($_SERVER['REQUEST_URI'],'.php')){
    header('Location: ../');
}
?>