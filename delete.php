<?php
    require('connect.php');
    require('functions.php');
    session_start();
    
    $username_err = $password_err = $sucess ='';
    $current_user = '';
    if (isset($_SESSION['user'])) {
        $current_user = $_SESSION['user'];
    }

    global $db;

    $query_1 = "SELECT * FROM user WHERE username = '$current_user'";
    $statement_1 = $db->prepare($query_1);
    $statement_1->execute();
    $current_info = $statement_1->fetch();
    $statement_1->closeCursor();
    
    $query_2 = "SELECT * FROM has NATRUAL JOIN CIO WHERE username = '$current_user'";
    $statement_2 = $db->prepare($query_2);
    $statement_2->execute();
    $current_CIOs = $statement_2->fetchAll();
    $statement_2->closeCursor();

    $current_first = $current_info['first'];
    $current_last = $current_info['last'];
    
   $sql= "DELETE FROM users WHERE username = " . $username;
   $query = 'DELETE FROM users WHERE username = '.$username;
   deleteUser($current_user);

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