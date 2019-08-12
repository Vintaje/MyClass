<?php

class modal
{

    //uso 
    /*

    include_once 'plantillas/modales.php';
        modal::alert("titulo","cuerpo","boton");
    
    */ 

    function alert($id,$titulo, $cuerpo, $boton)
    {

        echo "<div data-toggle='modal' class='modal fade' id='$id' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='false'>
        <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLongTitle'> $titulo
                    </h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='modal-body'>
                    $cuerpo
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-primary' data-dismiss='modal'>$boton</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#$id').modal('show');
        });
</script>";
    }
}
