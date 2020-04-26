<?php
    require('connect.php');
    require('functions.php');
    session_start();

    $current_user = '';
    if (isset($_SESSION['user'])) {
        $current_user = $_SESSION['user'];
    }
    deleteUser($current_user);
    
    unset($_SESSION['user']);
    header("Location: .\home.php");
?>