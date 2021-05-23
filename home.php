<?php
    include "utilities.php";
    
    CompleteHead();
    Topbar();

    OpenContent(); 
    echo "hey sto in cima";
    for($i = 0; $i < 200; $i++)
    {
        echo "AO <br>";
    }
    CloseContent();
?>