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
    	?>
        <div class="mainbox">
            <table cellspacing="20" style="width: 100%;">
                <tr><th colspan=2 style="font-size: 30px;"><center>Il nostro catalogo</center></th></tr>
                <?php
                    include "infoDatabase.php";

                    $query="SELECT IDSchedaTecnica, Marca, Modello FROM tblschedetecniche;";
                    $connessione = mysqli_connect($DBhost, $DButente, $DBpassword, $DBnome);
                    if(mysqli_connect_errno()) die("conn non riuscita: " . mysqli_error($connessione));

                    $result = mysqli_query($connessione, $query);

                    if(mysqli_num_rows($result) > 0)
                    {
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                        {
                            echo "<tr><th style='width: 33%; font-size: 20px;'>".$row['Marca']." ".$row['Modello']."</th>";
                            echo "<th style='width: 33%; font-size: 20px;'><a href='visualizzaVettura.php?id=".$row['IDSchedaTecnica']."' class='noLink' style='color: black;'>Maggiori informazioni</a></th>";
                        }
                    }
                    mysqli_free_result($result);
                    mysqli_close($connessione);
                ?>
            </table>
            
        </div>
        <?php
            CloseContent();
            Footer();
        ?>
        
    </body>
</html>