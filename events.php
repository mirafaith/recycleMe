
<!DOCTYPE html>
<meta name="author" content="Ningshun Chen (nc2bx), Sanjana Hajela (sh9as), Everett Patterson (ecp5xf), Mira Lee (mfl2zk)">

<html>
<head>
	<meta charset="UTF-8" />
	<title>recycleMe</title>
	<link href='http://fonts.googleapis.com/css?family=Hind+Siliguri' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Roboto:light" rel="stylesheet">
	<link href='styles.css' rel='stylesheet' type='text/css' />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="dynamic.js"></script>
</head>

<body style="text-align: center;">
	<div class="header">
		<a href="./home.php" class="name">recycleMe</a>
		<div class = "nav">
			<br><br><br>
			<a href="./search.html">search</a>
			<a href="./events.php"><span style="color: #bedd71;">events</span></a>
			<a href="./account.php">account</a>
			<a href="./logout.php"><button>log out</button></a><br><br>
		</div>
	</div>

	<h4>upcoming events</h4><br><br>

	<?php
	    require('connect.php');
	    session_start();

	    $current_user ='';
	    if (isset($_SESSION['user'])) {
	        $current_user = $_SESSION['user'];
	    }
	    else{
	        header("Location: home.php");
	    }
	    
	    global $db;
	  	echo '<table style="width:100%;", id="table">';

	   	$sql = "SELECT * FROM greenEvent";
	   	foreach ($db->query($sql) as $row) {
	   		echo "<div class='event'><h5 style='text-decoration: underline;'>".$row['title']. "</h5><h2>date: ".$row['date']."<br>location: ".$row['location']."</h2></div>";
		}
	?>
	
	<a href = "./addEvent.php"><button>add an event</button></a><br><br><br>
</body>
</html>