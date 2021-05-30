<html>
    <head>
        <?php
            include "methods.php";
            HeadMaster();
        ?>
        <title>Area Personale</title>
    </head>
    <body>
        <?php
    		Topbar();
            OpenContent();
            if($_SESSION['isLogged'] != true)
                header("location: login.php");
    	?>
        <div class="mainbox">
            <table cellspacing="20" style="width: 100%;">
                <tr><th colspan=3 style="font-size: 30px;"><center>Profilo Utente</center></th></tr>
                <tr>
                    <?php
                        include "infoDatabase.php";

                        $queryImpiegato = "SELECT Nome, Cognome, Email, CodiceFiscale, DataDiNascita, Genere FROM tblimpiegati WHERE IDImpiegato =";
                        $queryCliente = "SELECT Nome, Cognome, Email, CodiceFiscale, DataDiNascita, Genere FROM tblclienti WHERE IDCliente =";
                        $connessione = mysqli_connect($DBhost, $DButente, $DBpassword, $DBnome);
                        if(mysqli_connect_errno()) die("conn non riuscita: " . mysqli_error($connessione));
                        $result;
                        switch($_SESSION['level'])
                        {
                            case 0: //è un cliente
                                    $result = mysqli_query($connessione, $queryCliente."'".$_SESSION['userID']."';");
                                break;

                            case 1: //è un impiegato
                                    $result = mysqli_query($connessione, $queryImpiegato."'".$_SESSION['userID']."';");
                                break;

                            default: //qualquadra non cosa
                                    die("errore");
                                break;
                        }
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        
                        //NOME UTENTE
                        echo "<td style='width: 33%; font-size: 20px;'><b style='color:rgb(42, 162, 42)';>Nome utente: </b>";
                        echo $row['Nome']." ".$row['Cognome'];
                        echo "</td>";
                        
                        //DATA DI NASCITA
                        echo "<td style='width: 33%; font-size: 20px;'><b style='color:rgb(42, 162, 42)';>Data di nascita: </b>";
                        echo $row['DataDiNascita'];
                        echo "</td>";

                        //SESSO
                        echo "<td style='width: 34%; font-size: 20px;'><b style='color:rgb(42, 162, 42)';>Genere: </b>";
                        switch($row['Genere'])
                        {
                            case 'M': echo "Maschile";
                                break;
                            case 'F': echo "Femminile";
                                break;
                        }
                        echo "</td>";

                        echo "</tr>";
                        echo "<tr>";

                        //CODICE FISCALE
                        echo "<td style='width: 34%; font-size: 20px;'><b style='color:rgb(42, 162, 42)';>Codice Fiscale: </b>";
                        echo $row['CodiceFiscale'];
                        echo "</td>";

                        //EMAIL
                        echo "<td style='width: 33%; font-size: 20px;'><b style='color:rgb(42, 162, 42)';>Email: </b>";
                        echo $row['Email'];
                        echo "</td>";

                        //RUOLO
                        echo "<td style='width: 34%; font-size: 20px;'><b style='color:rgb(42, 162, 42)';>Ruolo: </b>";
                        if($_SESSION['level'] == 0)
                            echo "Cliente";
                        else
                            echo "Impiegato";
                        echo "</td>";

                        echo "</tr>";
                        mysqli_free_result($result);
                        mysqli_close($connessione);
                    ?>
                </tr>
            </table>
        </div>
                <?php
            
                    $queryImpiegato = "SELECT tblschedetecniche.Marca, tblschedetecniche.Modello, tblvetture.Verniciatura, tblschedetecniche.IDSchedaTecnica FROM tblschedetecniche INNER JOIN tblvetture ON tblvetture.SchedaTecnicaID = tblschedetecniche.IDSchedaTecnica INNER JOIN tblacquisti ON tblvetture.AcquistoID = tblacquisti.IDAcquisto WHERE tblacquisti.ClienteID IS NULL AND tblacquisti.ImpiegatoID =";
                    $queryCliente = "SELECT tblschedetecniche.Marca, tblschedetecniche.Modello, tblvetture.Verniciatura, tblschedetecniche.IDSchedaTecnica FROM tblschedetecniche INNER JOIN tblvetture ON tblvetture.SchedaTecnicaID = tblschedetecniche.IDSchedaTecnica INNER JOIN tblacquisti ON tblvetture.AcquistoID = tblacquisti.IDAcquisto WHERE tblacquisti.ClienteID =";
                    //$queryCliente = "SELECT tblschedetecniche.Marca, tblschedetecniche.Modello, tblvetture.Verniciatura, tblschedetecniche.IDSchedaTecnica FROM tblschedetecniche INNER JOIN tblvetture ON tblvetture.SchedaTecnicaID = tblschedetecniche.IDSchedaTecnica INNER JOIN tblacquisti ON tblvetture.AcquistoID = tblacquisti.IDAcquisto INNER JOIN tblclienti ON tblacquisti.ClienteID = tblclienti.`IDCliente` WHERE tblclienti.IDCliente =";
                    $connessione = mysqli_connect($DBhost, $DButente, $DBpassword, $DBnome);
                    if(mysqli_connect_errno()) die("conn non riuscita: " . mysqli_error($connessione));
                    $result;
                    switch($_SESSION['level'])
                    {
                        case 0: //è un cliente
                                $result = mysqli_query($connessione, $queryCliente."'".$_SESSION['userID']."';");
                            break;

                        case 1: //è un impiegato
                                $result = mysqli_query($connessione, $queryImpiegato."'".$_SESSION['userID']."';");
                            break;

                        default: //qualquadra non cosa
                                die("errore");
                            break;
                    }

                    if(mysqli_num_rows(($result)) != 0)
                    {
                        
                        echo "<div class='mainbox' style='margin-top: 20px;'> <table cellspacing='20' style='width: 100%;'> <tr><th colspan=3 style='font-size: 30px;'><center>Le tue vetture</center></th></tr>";
                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                        {
                            echo "<tr><th style='width: 33%; font-size: 20px;'>".$row['Marca']." ".$row['Modello']." ".$row['Verniciatura']."</th>";
                            echo "<th style='width: 33%; font-size: 20px;'><a href='visualizzaVettura.php?id=".$row['IDSchedaTecnica']."' class='noLink' style='color: black;'>Guardala nel catalogo</a></th>";
                            echo "<th style='width: 33%; font-size: 20px;'><a href='' class='noLink' style='color: black;'>Opzioni</a></th></tr>";
                        }
                        echo "</table></div>";
                    }
                    mysqli_free_result($result);
                    mysqli_close($connessione);
                ?>
        <?php
            CloseContent();
            Footer();
    	?>
    </body>
</html>