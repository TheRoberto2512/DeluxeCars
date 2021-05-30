<?php
        function HeadMaster()
        {
            echo "<link rel=stylesheet href=main.css?v=<?=".time().";?>";
            echo "<link rel=icon href=./img/diamond.png>";
        }
    
        function Topbar()
        {
            session_start();
            echo "<div class=navbar>";
            echo "<a href=>Deluxe Cars</a>";
            echo "<a href=home.php>Home</a>";
            echo "<a href=catalogo.php>Catalogo</a>";
            echo "<div class=navbar-right>";
            if(!isset($_SESSION['isLogged']))
            {
                echo "<a href=login.php>LOGIN</a>";

            } else if($_SESSION['isLogged'] == false)
            {
                echo "<a href=login.php>LOGIN</a>";
            }
            else
            {
                echo "<a href=areapersonale.php>AREA PERSONALE</a>";
                echo "<a href=logout.php>LOGOUT</a>";
            }
            echo "</div></div>";
        }

        function OpenContent()
        {
            echo "<div class=content>";
        }
    
        function CloseContent()
        {
            echo "</div>";
        }

        function Footer()
        {
            echo "<div class='footer'>";
            echo "<table cellspacing=20 style='width: 100%;'";
            echo "<tr><th style='width: 33%;'><a href='noteLegali.php'>Note Legali</a></th><th style='width: 34%;'><a href='privacy.php'>Privacy</a></th><th style='width: 33%;'><a href='cookie.php'>Cookie</a></th></tr>";
            echo "<tr><td colspan='3'><center><p class='copyright'>Deluxe Cars<sup>©</sup> "; echo Date('Y'); echo "</p></center></td></tr>";
            echo "</table>";
            echo "</div>";
        }

        function VerificaEsistenza($utenza, $email, $password)
        {
            include "infoDatabase.php";
            //$f = fopen("log.txt", "a");
            //fwrite($f, "password: $password \r\n");
            $password = hash("SHA256", Trim($password), false);
            //fwrite($f, "hash password: $password \r\n");
            //fwrite($f, "hash password: $password");
            //$password = hash("SHA256", Trim($_POST['Password']), false);
            $queryCliente = "SELECT * FROM tblClienti WHERE password = '".$password."' AND email = '".$email."';";
            $queryImpiegato = "SELECT * FROM tblImpiegati WHERE password = '".$password."' AND email = '".$email."';";
            $connessione = mysqli_connect($DBhost, $DButente, $DBpassword, $DBnome);
            if(mysqli_connect_errno())
                die("conn non riuscita: " . mysqli_error($connessione));

            if($utenza == "Cliente")
            {
                $result = mysqli_query($connessione, $queryCliente);
                //fwrite($f, "eseguo query cliente\r\n");
            }
            else
            {
                $result = mysqli_query($connessione, $queryImpiegato);
            }
            if(mysqli_num_rows($result) == 1) //se ha un match vuol dire che l'utente esiste e quindi le credenziali sono corrette
            {
                session_start();
                $_SESSION['isLogged'] = true;
                $row = mysqli_fetch_array($result, MYSQLI_NUM);
                if($utenza == "Cliente")
                {
                    //fwrite($f, $row[0]." ".$row[1]." ".$row[2]);
                    $_SESSION['userID'] = $row[0];
                    $_SESSION['level'] = 0;
                    //fwrite($f, "setto cliente\r\n");
                }
                else
                {
                    $_SESSION['userID'] = $row[0];
                    $_SESSION['level'] = 1;
                }  
                header("Location: areapersonale.php");
            }
            else
            {
                //credenziali sbagliate       
                if($utenza == "Cliente")
                {
                    header("Location: login.php?utente=cliente&errore=credenziali");
                }
                else
                {
                    header("Location: login.php?utente=impiegato&errore=credenziali");
                }
            }
            mysqli_free_result($result);
            mysqli_close($connessione);
        }

?>