<?php
    session_start();
    unset($_SESSION['connected']);
    header('Location: ../index.php');
    exit()
?>