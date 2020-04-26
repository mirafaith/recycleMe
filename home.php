<?php
	require('connect.php');
	require('functions.php');

	$error = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (verifyUser($username, $password)) {
			session_start();
			$_SESSION['user'] = $username;
			header('Location: ./search.html');
		}
		else {
			$error = "error: username or password not found!";
		}
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
			<h4>are you ready to <i>go green?</i></h4><br>
			<img src='earth.png' width=20%><br>

			<?php echo "<er>$error</er>" ?><br><br>

			<label for='username'>username</label>
			<input type='text' size='20' placeholder='enter username' name='username' required><br>
			
			<label for='password'>password</label>
			<input type='password' size='20' placeholder = 'enter password' name='password' required><br><br>

			<button type='submit'>log in</button></a><br><br>
			<a href='./signup.php'><span style='font-size: 14px; font-style: italic; color: #59821f'>or sign up</span></a><br><br>
		</form>
	</div>
</body>
</html>