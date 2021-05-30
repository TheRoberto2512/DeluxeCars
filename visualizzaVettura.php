<html>
    <head>
        <?php
            include "methods.php";
            HeadMaster();
        ?>
        <title>Catalogo</title>
    </head>
    <body>
        <?php
    		Topbar();
            OpenContent();

            include "infoDatabase.php";

            $query="SELECT * FROM tblschedetecniche WHERE IDSchedaTecnica =".$_GET['id'].";";
            $connessione = mysqli_connect($DBhost, $DButente, $DBpassword, $DBnome);
            if(mysqli_connect_errno()) die("conn non riuscita: " . mysqli_error($connessione));

            $result = mysqli_query($connessione, $query);

            if(mysqli_num_rows($result) > 0)
            {

                echo "<div class=mainbox>";
                echo "<center><img border=2 src='./img/veicoli/".$_GET['id'].".jpg' style='margin: 10px; width: 700px; height: auto;'></center>";
                echo "</div>";

                echo "<div class='mainbox'> <table cellspacing='20' style='width: 100%;'> <tr><th colspan=3 style='font-size: 30px;'><center>Scheda tecnica</center></th></tr>";
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                {
                    echo "<tr><th style='width: 33%; font-size: 20px;'><b style='color:rgb(0, 82, 205);'> Marca:</b> ".$row['Marca']."</th>";
                    echo "<th style='width: 33%; font-size: 20px;'><b style='color:rgb(0, 82, 205);'>Modello:</b> ".$row['Modello']."</th>";
                    echo "<th style='width: 33%; font-size: 20px;'><b style='color:rgb(0, 82, 205);'>Anno Produzione:</b> ".$row['AnnoProduzione']."</th></tr>";
                    echo "<tr><th style='width: 33%; font-size: 20px;'> <b style='color:rgb(0, 82, 205);'>Numero Porte:</b> ".$row['NumeroPorte']."</th>";
                    echo "<th style='width: 33%; font-size: 20px;'><b style='color:rgb(0, 82, 205);'>Potenza (CV):</b> ".$row['Potenza']."</th>";
                    echo "<th style='width: 33%; font-size: 20px;'><b style='color:rgb(0, 82, 205);'>Velocità Massima:</b> ".$row['VelocitaMax']."</th></tr>";
                    echo "<tr><th style='width: 33%; font-size: 20px;'> <b style='color:rgb(0, 82, 205);'>Lunghezza (cm):</b> ".$row['Lunghezza']."</th>";
                    echo "<th style='width: 33%; font-size: 20px;'> <b style='color:rgb(0, 82, 205);'>Larghezza (cm):</b> ".$row['Larghezza']."</th>";
                    echo "<th style='width: 33%; font-size: 20px;'> <b style='color:rgb(0, 82, 205);'>Altezza (cm):</b> ".$row['Altezza']."</th></tr>";
                    echo "<tr><th colspan=3 style='width: 100%; font-size: 20px;'><b style='color:rgb(0, 82, 205);'>Prezzo base:</b> ".$row['PrezzoBase']." €</th></tr>";
                }
                echo "</table></div>";
            }
            mysqli_free_result($result);
            mysqli_close($connessione);
            CloseContent();
            Footer();
        ?>
        
    </body>
</html>