<?php

    function OpenHead()
    {
        echo "<html>";
        echo "<head>";
        echo "<meta name=viewport content="."width=device-width, initial-scale=1".">";
        echo "<link rel=stylesheet href=main.css?v=<?=".time().";?>";
        echo "<link rel=icon href=./img/diamond.png>";
    }

    function CloseHead()
    {
        echo "</head>";
    }

    function CompleteHead()
    {
        OpenHead();
        CloseHead();
    }

    function Topbar()
    {
        echo "<div class=navbar>";
        echo "<a href=>Deluxe Cars</a>";
        echo "<a href=home.php>Home</a>";
        echo "<a href=catalogo.php>Catalogo</a>";
        echo "<a href=chisiamo.php>Chi siamo</a>";
        echo "<a href=faq.php>FAQ</a>";
        echo "<div class=navbar-right>";
        echo "<a href=login.php>LOGIN</a>";
        echo "</div></div>";
    }

    function OpenContent()
    {
        echo "<div class=content>";
    }

    function CloseContent()
    {
        echo "</div></body></html>";
    }
?>