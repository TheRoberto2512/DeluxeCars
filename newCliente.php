<html>
    <head>
        <?php
            include "methods.php";
            HeadMaster();
        ?>
        <title>Nuovo Cliente</title>
    </head>
    <body>
        <?php
    		Topbar();
            OpenContent();
            if($_SESSION['isLogged'] != true)
                header("location: login.php");
            if($_SESSION['level'] != 1)
            {
                header("location: areapersonale.php");
            }
    	?>
        <div class="mainbox">
            <form action="addCliente.php" method="post">
                <table style="width:100%;">
                    <tr><th colspan=2>Inserire Dati Utente</th></tr>
                    <tr><th><center>Nome:</center></th><th><input name=nome type=text maxlength =30></th></tr>
                    <tr><th><center>Cognome:</center></th><th><input name=cognome type=text maxlength =30></th></tr>
                    <tr><th><center>Data di Nascita (YYYY-MM-GG):</center></th><th><input name=ddn type=text maxlength =10></th></tr>
                    <tr><th><center>Genere:</center></th><th><input name=genere type=text maxlength =1></th></tr>
                    <tr><th><center>Codice Fiscale:</center></th><th><input name=cf type=text maxlength =16></th></tr>
                    <tr><th><center>Numero di Telefono:</center></th><th><input name=ndt type=text maxlength =16></th></tr>
                    <tr><th><center>Citta:</center></th><th><input name=citta type=text maxlength =30></th></tr>
                    <tr><th><center>CAP:</center></th><th><input name=cap type=text maxlength =5></th></tr>
                    <tr><th><center>Via:</center></th><th><input name=via type=text maxlength =30></th></tr>
                    <tr><th><center>Numero Civico:</center></th><th><input name=nc type=text maxlength =6></th></tr>
                    <tr><th><center>Email:</center></th><th><input name=email type=text maxlength =30></th></tr>
                    <tr><th colspan=2><input type="submit" value="Invia"></th></tr>
                </table>
            </form>
        </div>
            
        <?php
            CloseContent();
            Footer();
    	?>
    </body>
</html>