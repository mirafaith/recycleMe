<?php
	$current_user = '';
	if (isset($_COOKIE['user']))    // checks for the presence of individual field 
	{
	   $myuser = $_COOKIE['user'];  // access the $_COOKIE array with a specified key              
	}
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
		
		<form action='<?php $_SERVER['PHP_SELF'] ?>' method='POST'>
			<?php echo "<h4>welcome to recycleMe, <i>$current_user['user']</i></h4><br>"; ?>

			<button type='submit'>log in</button></a><br><br>
			<a href='./signup.php'><span style='font-size: 14px; font-style: italic; color: #59821f'>or sign up</span></a><br><br>
		</form>
	</div>
</body>
</html>