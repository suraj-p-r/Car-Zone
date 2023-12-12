<?php
    session_start();
    unset($_SESSION['userid']);
    unset($_SESSION['username']);
    unset($_SESSION['name']);
    //$_SESSION=array();
    session_destroy();
    header("Location: index.php");
    exit();
?>
