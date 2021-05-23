
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
            echo "<link rel=stylesheet href=main.css>";
            echo "<link rel=stylesheet href=login.css?v=<?=".time().";?>";
        ?>
        
        <link rel=icon href=./img/diamond.png>
        <title>Document</title>
    </head>
    <body>
        <div class=navbar>
            <img class=diamond src="./img/diamond.png">
            <a href=home.php>Deluxe Cars</a>
            <a href=catalogo.php>Catalogo</a>
            <a href=chisiamo.php>Chi siamo</a>
            <a href=faq.php>FAQ</a>
            <div class=navbar-right>
            <a href=login.php>LOGIN</a>
            </div></div>

        <table style="width:100%">
            <tr>
                <td style="width: 50%">
                    <div class="loginBox">
                        <p class="LoginTitle" align="center">Login per Clienti</p>
                        <form class="LoginFormClienti">
                          <input class="EmailBox" type="text" align="center" placeholder="Username">
                          <input class="PasswordBox" type="password" align="center" placeholder="Password">
                          <input type="submit" class="LoginButton" align="center" value=Accedi>
                          <p class="PasswordDimenticata" align="center"><a href="#">Password Dimenticata?</p>     
                    </div>
                </td>

                <td style="width: 50%">
                <div class="loginBox">
                        <p class="LoginTitle" align="center">Login per Impiegati</p>
                        <form class="LoginFormImpiegati">
                          <input class="EmailBox" type="text" align="center" placeholder="Username">
                          <input class="PasswordBox" type="password" align="center" placeholder="Password">
                          <input type="submit" class="LoginButton" align="center" value=Accedi>
                          <p class="PasswordDimenticata" align="center"><a href="#">Password Dimenticata?</p>     
                    </div>
                </td>
            </tr>
        </table>
    </body>
</html>