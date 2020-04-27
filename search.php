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
		<a href="./home.php" class="name">recycleMe</a>
		<div class = "nav">
			<br><br><br>
			<a href="./search.php"><span style="color: #bedd71;">search</span></a>
			<a href="./events.php">events</a>
			<a href="./account.php">account</a>
            <a href="./logout.php"><button>log out</button></a><br><br>
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

                $centers_query = $db->prepare( "SELECT * FROM center WHERE name LIKE '$searchq%' OR address LIKE '$searchq%' ") or die("could not search!");

                $accepts_query = $db->prepare( "SELECT center.name AS c_name, accepts.name AS i_name FROM center JOIN accepts ON center.centerId = accepts.centerId
                WHERE accepts.name LIKE '$searchq%' ") or die("could not search!");

                $composts_query = $db->prepare( "SELECT center.name AS c_name, composts.name AS i_name FROM center JOIN composts ON center.centerId = composts.centerId
                WHERE composts.name LIKE '$searchq%' ") or die("could not search!");

                $recycles_query = $db->prepare( "SELECT center.name AS c_name, recycles.name AS i_name FROM center JOIN recycles ON center.centerId = recycles.centerId
                WHERE recycles.name LIKE '$searchq%' ") or die("could not search!");


                $centers_query->execute();
                $accepts_query->execute();
                $composts_query->execute();
                $recycles_query->execute();

                $centers_count = $centers_query->rowCount();
                $accepts_count = $accepts_query->rowCount();
                $composts_count = $composts_query->rowCount();
                $recycles_count = $recycles_query->rowCount();

                $total_count = $centers_count + $accepts_count + $composts_count + $recycles_count;

                if($total_count== 0 or$searchq == ''){
                    echo "<h4> No search results found! </h4>";
                }
                else{
                    if($centers_count > 0){
                        while($row =  $centers_query->fetch()) {
                            echo "<div class = 'result'>";
                            echo "<h4> <span style='color: rgb(75, 171, 250)' >" . $row['name']. "</span> is located at... </h4>";
                            echo "<h3>" .$row['address']. "</h3>";
                            echo "<h2>Hours: " .$row['hours']. "</h2>";
                            echo "</div>";
                        }
                    }
                    if($accepts_count > 0 ){
                        while($row =  $accepts_query->fetch()){
                            echo "<div class = 'result'>";
                            echo "<h4> <span style='color: rgb(75, 171, 250)' >" . $row['i_name']. "(s) </span> are accepted by: </h4>";
                            echo "<h4>" .$row['c_name']. "</h4>";
                            echo "</div>";
                        }
                    }
                    if($composts_count > 0 ){
                        while($row =  $composts_query->fetch()){
                            echo "<div class = 'result'>";
                            echo "<h4> <span style='color: rgb(75, 171, 250)' >" . $row['i_name']. "(s) </span> are composted at: </h4>";
                            echo "<h4>" .$row['c_name']. "</h4>";
                            echo "</div>";
                        }
                    }
                    if($recycles_count > 0 ){
                        while($row =  $recycles_query->fetch()){
                            echo "<div class = 'result'>";
                            echo "<h4> <span style='color: rgb(75, 171, 250)' >" . $row['i_name']. "(s) </span> are recycled at: </h4>";
                            echo "<h4>" .$row['c_name']. "</h4>";
                            echo "</div>";
                        }
                    }
                ?>

            <?php } ?>
            <?php } ?>
	</div>
	</body>
	</html>
