<?php
	require('connect.php');
?>

<!DOCTYPE html>
<meta name="author" content="Ningshun Chen (nc2bx), Sanjana Hajela (sh9as), Everett Patterson (ecp5xf), Mira Lee (mfl2zk)">
<html>
<head>
	<meta charset="UTF-8" />
	<title>recycleMe</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
	<link href='http://fonts.googleapis.com/css?family=Hind+Siliguri' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Roboto:light" rel="stylesheet">
	<link rel='stylesheet' href='styles.css' type='text/css' />

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src ="dynamic.js"></script>
</head>

<body>
	<div class="header">
		<a href="./home.html" class="name">recycleMe</a>
		<div class = "nav">
			<br><br><br>
			<a href="./search.html"><span style="color: #bedd71;">search</span></a>
			<a href="./events.html">events</a>
			<a href="./account.html">account</a>
		</div>
	</div>
	<br>
	<div class = "search">
		<div class = "bar">
		<h5>what are you searching for <i>right now?</i></h5><br>
		<form class="lookup" action="search.php" method="post">
			<input type="text" name = "search" placeholder="enter an item or center..." >
			<button type="submit"><i class="fa fa-search" ></i></button>
        </form>
        </div>

                <?php
                //collect
                if(isset($_POST['search'])) {
                $searchq = $_POST['search'];

                $query = $db->prepare( "SELECT * FROM center WHERE name LIKE '$searchq%' OR address LIKE '$searchq%' ") or die("could not search!");
                $query->execute();
                $count = $query->rowCount();
                if($count == 0){
                    echo "<h4> no search results found! </h6>";
                }
                else{
                    while($row =  $query->fetch()) {?>
                        <div class = "result">
                            <?php
                                echo "<h4> <span style='color: rgb(75, 171, 250)' >" . $row['name']. "</span> is located at... </h4>";
                                echo "<h3>" .$row['address']. "</h3>";
                                echo "<h2>Hours: " .$row['hours']. "</h2>";
                            ?>
                         </div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
	</div>
	</body>
	</html>