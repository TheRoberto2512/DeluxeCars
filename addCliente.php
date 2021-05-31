<?php

    session_start();

    if($_SESSION['isLogged'] != true)
        header("location: login.php");
    if($_SESSION['level'] != 1)
    {
        header("location: areapersonale.php");
    }

    include "CredenzialiDatabase.php";
    
    $ammessi = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $password = array(); 
    $alphaLength = strlen($ammessi) - 1; //put the length -1 in cache
    for ($i = 0; $i < 12; $i++) {
        $r = rand(0, $alphaLength);
        $password[] = $ammessi[$r];
    }
    $password = implode($password);

    $passwordH = hash("SHA256", Trim($password), false);

    $query = "INSERT INTO `tblclienti`
    (`IDCliente`, `Nome`, `Cognome`, `DataDiNascita`, `Genere`, `CodiceFiscale`, `NumeroDiTelefono`, `Citta`, `CAP`, `Via`, `NumeroCivico`, `Email`, `Password`, `DataCreazione`)
    VALUES
    (NULL, '".$_POST['nome']."', '".$_POST['cognome']."', '".$_POST['ddn']."', '".$_POST['genere']."', '".$_POST['cf']."', '".$_POST['ndt']."', '".$_POST['citta']."', '".$_POST['cap']."',
    '".$_POST['via']."', '".$_POST['nc']."', '".$_POST['email']."', '".$passwordH."', current_timestamp());";

    $connessione = mysqli_connect($DBhost, $DButente, $DBpassword, $DBnome);
    if(mysqli_connect_errno()) die("conn non riuscita: " . mysqli_error($connessione));

    if(mysqli_query($connessione, $query)) //restituisce true se riesce ad eseguire la query
    {
        //deve inviare una mail al cliente per comuncargli la password
        //non essendo possibile farlo dal localhost visualizzo la password su un file di testo
        $f = fopen("password", "a");
        fwrite($f, $_POST['email']." : ".$password."\r\n");
        fclose($f);
        header("location: areapersonale.php");
    }
    else
    {
        echo $query;
        echo "\r\n errore";
    }

    mysqli_close($connessione);

?>