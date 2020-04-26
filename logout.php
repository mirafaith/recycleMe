<?php
//ends the session, removes the cookie and redirects back to homepage
	// $_SESSION['user'] = false;
	// setcookie('user', '', time()-3600);
	// unset($_SESSION['user']);
	// header("Location: home.php");
	session_start();
	unset($_SESSION['user']);
	header("Location: home.php");
?>