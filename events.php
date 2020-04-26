
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
	<script src ="dynamic.js"></script>
</head>
<style>
      .table{; 
        -webkit-column-count: 3; /* Chrome, Safari, Opera */
        -moz-column-count: 3; /* Firefox */
        column-count: 3;
        -webkit-column-gap: 5000px; /* Chrome, Safari, Opera */
        -moz-column-gap: 5000px; /* Firefox */
        column-gap: 5000px;
      }
    
    </style>
<body style = "text-align: center;">
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
		$username = 'root';
		$password = 'RecycleMe?1234';

		$dbname = 'RecycleMe';
		$host = "35.194.84.221";

/******************************/

		$dsn = "mysql:host=$host;dbname=$dbname";
		$servername= "localhost";
		
		$conn= "";

/** connect to the database **/

   //$conn = new mysqli($host, $username, $password, $dbname);
   // if($conn->connect_error){
   // 	die("Connection failed: " . $conn->connect_error);
   // }
//    echo "<p>You are connected to the database</p>";


	    require('connect.php');
	    session_start();

	    $current_user = $current_first = $current_last = '';
	    $current_CIO = '';
	    if (isset($_SESSION['user'])) {
	        $current_user = $_SESSION['user'];
	    }
	    else{
	        echo("you need to login first");
	        header("Location: home.php");
	        
	    }
	    
	    global $db;
	  	echo '<table style="width:100%;", id="table">';

	   $sql = "SELECT * FROM greenEvent";
	   foreach ($db->query($sql) as $row) {


	   	echo"<div class = 'event'>
		   <h5 style = 'text-decoration: underline;'>".$row['title']. "</h5><h2>date: ".$row['date']."<br>location: ".$row['location']."</h2></div>";
	   	// echo "<tr><td>".$row['title']. ' ' .$row['location']."</td>";
		
		   
		   	
// 	<div class = "event">
// 	<h5 style = "text-decoration: underline;">going green with CIO</h5>
// 	<h2>date: 3/19/20<br>
// 	location: new cabell hall</h2>
// </div>

// <div class = "event">
// 	<h5 style = "text-decoration: underline;">recycle-a-thon with CIO</h5>
// 	<h2>date: 5/19/20<br>
// 	location: newcomb ballroom</h2>
// </div><br> -->

		}
	   //$record= mysqli_query($conn, $sql);
	   //$result= $conn->query($sql);
		//$statement_1 = $db->prepare($sql);

		

    // output data of each row
    


?>

	
	<a href = "./addEvent.php"><button>add an event</button></a><br><br><br>
	

</body>
</html>