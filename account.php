<?php
    require('connect.php');
    session_start();

    $current_user = $current_first = $current_last = '';
    $current_CIO = '';
    if (isset($_SESSION['user'])) {
        $current_user = $_SESSION['user'];
    }
    if (!isset($_SESSION['user'])) {
        echo("you need to login first");
        header("Location: home.php");
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
    foreach ($current_CIOs as $CIO_name) {	
        $current_CIO = $current_CIO . ', ' . $CIO_name;
    }
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

<body>
    <div class="header">
        <a href="./home.php" class="name">recycleMe</a>
        <div class = "nav">
            <br><br><br>
            <a href="./search.html">search</a>
            <a href="./events.html">events</a>
            <a href="./account.php"><span style="color: #bedd71;">account</span></a>
            <a href="./logout.php"><button>log out</button></a><br><br>
        </div>
    </div>

    <div style="text-align: center;">
        <h4>my profile</h4>
    </div>
    
    <br>
    <div class="details">
        <?php echo "<h4>$current_user</h4>" ?>
        <?php echo "<h2>first name: $current_first</h2>" ?>
        <?php echo "<h2>last name: $current_last</h2>" ?>
        <h2>favorite locations:</h2>
        <h2>CIOs: </h2>

        <a href="./edit.php"><button>edit info</button></a><br><br>
        <a href = ".delete.php"><button> delete account</button></a><br><br>
    </div>
</body>

</html>