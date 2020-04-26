<?php
	//ends the session, removes the cookie and redirects back to homepage
	session_start();
	unset($_SESSION['user']);
	header("Location: home.php");
?>