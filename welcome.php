<?php
	session_start();
	$current_user = '';
	if (isset($_SESSION['user']))
	{
	   $current_user = $_SESSION['user'];
	}
	session_destroy();
?>

<!DOCTYPE html>
<meta name='author' content='Ningshun Chen (nc2bx), Sanjana Hajela (sh9as), Everett Patterson (ecp5xf), Mira Lee (mfl2zk)'>

<html>

<head>
	<title>recycleMe</title>
	<meta charset='UTF-8' />
	<link href='http://fonts.googleapis.com/css?family=Hind+Siliguri' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto:light' rel='stylesheet'>
	<link href='styles.css' rel='stylesheet' type='text/css' />
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js'></script>
	<script src ='dynamic.js'></script>
</head>

<body>
	<div class='login'>
		<div class='header'>
			<a href='./home.php' class='name'>recycleMe</a>
		</div><br>
		
		<?php echo "<h4>welcome, <i>$current_user!</i></h4><br>"; ?>
		<a><span style='font-size: 14px; font-style: italic; color: #59821f'>click on our name on top left to sign in!</span></a>
	</div>
</body>
</html>