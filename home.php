<html>
    <head>
        <?php
            include "methods.php";
            HeadMaster();
        ?>
        <title>Home</title>
    </head>
    <body>
        <?php
    		Topbar();
            OpenContent();
        ?>
        <div class="mainbox">
        <table style=width:100%;>
            <tr><td colspan= 3 align="center"><h1 style="font-size:50px; margin:10px;">Deluxe Cars</h1></td></tr>
            <tr><td colspan= 3 align="center"><p style="margin:10px; font-size: 30px;">Il primo concessionario di Supercars in Sardegna!
            Vieni a visitare i nostri saloni aperti al pubblico 7 giorni su 7!</p></td></tr>
            <tr><td colspan= 3 align="center"><img border=3 style="margin-bottom: 20px; width:700px; height:auto; border-radius: 15px;" src="./img/home.jpg"></td></tr>
            <tr>
                <?php
                    include "infoDatabase.php";

                    $query="SELECT * FROM tblsaloni;";
                    $connessione = mysqli_connect($DBhost, $DButente, $DBpassword, $DBnome);
                    if(mysqli_connect_errno()) die("conn non riuscita: " . mysqli_error($connessione));

                    $result = mysqli_query($connessione, $query);

                    if(mysqli_num_rows($result) > 0)
                    {
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                        {
                            echo "<td align='center' style='width: 33%; font-size:25px;'>";
                            echo "<b>Sede ".$row['Citta']."</b></br>";
                            echo "Via ".$row['Via'].", ".$row['NumeroCivico']."</br>";
                            echo "CAP: ".$row['CAP']."</br>";
                            echo "Telfono: ".$row['NumeroDiTelefono']."</br>";
                            echo "</td>";
                        }
                    }
                    mysqli_free_result($result);
                    mysqli_close($connessione);
                ?>
            </tr>
        </table>
            <center><br>
            <br>
            <p</center>
        </div>
        <?php
            CloseContent();
            Footer();
    	?>
        
    </body>
</html>