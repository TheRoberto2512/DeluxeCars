<?php

    include "methods.php";

    if(isset($_POST['PasswordCliente']))
    {
        if(isset($_POST['EmailCliente']))
        {
            VerificaEsistenza("Cliente", $_POST['EmailCliente'], $_POST['PasswordCliente']);
        }
    }

?>