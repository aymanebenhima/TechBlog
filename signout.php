<?php
    session_start();
    ob_start();

    if ($_SESSION['login']) {
        session_destroy();
        unset($_SESSION['login']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_role']);
        header("Location: index.php");
    }