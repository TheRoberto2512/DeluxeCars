
<html>
    <head>
        <?php
            include "methods.php";
            HeadMaster();
            echo "<link rel=stylesheet href=login.css?v=<?=".time().";?>";
        ?>
        
        <link rel=icon href=./img/diamond.png>
        <title>Login</title>
    </head>
    <body>
        <?php
    		Topbar();
    	?>

        <table style="width:100%">
            <tr>
                <td style="width: 50%">
                    <div class="loginBox">
                        <p class="LoginTitle" align="center">Login per Clienti</p>
                        <form class="LoginFormClienti" action="accesso.php" method="post">
                          <input class="EmailBox" name="EmailCliente" type="text" align="center" placeholder="Email">
                          <input class="PasswordBox" name="PasswordCliente" type="password" align="center" placeholder="Password">
                          <input type="hidden" name="tipo" value="Cliente">
                          <input type="submit" class="LoginButton" align="center" value=Accedi>
                          <p class="PasswordDimenticata" align="center"><a href="#">Password Dimenticata?</p>
                        </form>     
                    </div>
                </td>

                <td style="width: 50%">
                <div class="loginBox">
                        <p class="LoginTitle" align="center">Login per Impiegati</p>
                        <form class="LoginFormImpiegati" action="accessoPersonale.php" method="post">
                          <input class="EmailBox" name="EmailImpiegato" type="text" align="center" placeholder="Email">
                          <input class="PasswordBox" name="PasswordImpiegato" type="password" align="center" placeholder="Password">
                          <input type="hidden" name="tipo" value="Impiegato">
                          <input type="submit" class="LoginButton" align="center" value=Accedi>
                          <p class="PasswordDimenticata" align="center"><a href="#">Password Dimenticata?</p>     
                        </form>
                    </div>
                </td>
            </tr>
            <tr><td colspan="2"><center><h1 style="color:red;">
            <?php
            if(isset($_GET['utente']))
            {
                if($_GET['errore'] == "credenziali")
                {
                    echo "Credenziali non valide!";
                }
            }
            ?>
            </h1></center></td></tr>
        </table>
        <?php
        Footer();
        ?>
    </body>
</html>