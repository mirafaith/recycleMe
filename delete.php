<?php
    require('connect.php');
    require('functions.php');
    session_start();
    
    $username_err = $password_err = $sucess ='';
    $current_user = '';
    if (isset($_SESSION['user'])) {
        $current_user = $_SESSION['user'];
    }
    
   $sql= "DELETE FROM users WHERE username = " . $username;
   $query = 'DELETE FROM users WHERE username = '.$username;
      echo '<script>alert("Query: '.$query.'");</script>';
   session_start();
    unset($_SESSION['user']);
    header("Location: home.php");

?>

<!DOCTYPE html>
<meta name="author" content="Ningshun Chen (nc2bx), Sanjana Hajela (sh9as), Everett Patterson (ecp5xf), Mira Lee (mfl2zk)">

<html>

<head>
	<title>recycleMe</title>
	<meta charset="UTF-8" />
	<link href='http://fonts.googleapis.com/css?family=Hind+Siliguri' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Roboto:light" rel="stylesheet">
	<link href='styles.css' rel='stylesheet' type='text/css' />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src ="dynamic.js"></script>
</head>



</html>