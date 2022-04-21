<?php
    session_start();
    unset($_SESSION['connected']);
    unset($_SESSION['op']);
    unset($_SESSION['id']);
    unset($_SESSION['lastName']);
    unset($_SESSION['firstName']);
    unset($_SESSION['reload']);

    setcookie('glamour', null, time() - 3600, "/");
    setcookie('streetwear', null, time() - 3600, "/");
    setcookie('boheme', null, time() - 3600, "/");
    setcookie('casual', null, time() - 3600, "/");

    header('Location: ../index.php');
    exit()
?>

