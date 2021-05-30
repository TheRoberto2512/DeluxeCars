<?php
    
    include "methods.php";

    if(isset($_POST['PasswordImpiegato']))
    {
        if(isset($_POST['EmailImpiegato']))
        {
            VerificaEsistenza("Impiegato", $_POST['EmailImpiegato'], $_POST['PasswordImpiegato']);
        }
    }

?>