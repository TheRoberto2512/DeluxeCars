<?php
    session_start();
    $_SESSION['isLogged'] = false;
    unset($_SESSION['userID']);
    unset($_SESSION['level']);
    header("Location: login.php");
?>