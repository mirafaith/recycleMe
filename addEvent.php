<?php
    require('connect.php');
    require('functions.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $date = $_POST['date'];
        $location = $_POST['location'];
        //$CIOId = $_POST['CIOId'];

       createEvent($title, $date, $location);
            
            # start a session for the new user
            session_start();
            $_SESSION['user'] = $username;
            header('Location: ./events.php');
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
        <a href="./home.html" class="name">recycleMe</a>
        <div class = "nav">
            <br><br><br>
            <a href="./search.html">search</a>
            <a href="./events.html">events</a>
            <a href="./account.php"><span style="color: #bedd71;">account</span></a>
        </div>
    </div>

    <div class = "edit">
        <h4>add an event</h4><br><br>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="name">name of event</label><br>
            <input type="text" id="title" name="title" placeholder="title of event.." required><br><br>

            <label for="date">date</label><br>
            <input type="text" id="date" name="date" placeholder="11/25/2020.." required><br><br>

            <label for="location">location</label><br>
            <input type="text" id="location" name="location" placeholder="new cabell hall.." required><br><br>

            <label for="CIOId">cio in charge</label><br>
            <input type="text" id="CIOId" name="CIOId" placeholder="2.." required><br><br>

            <input type="submit" value="submit" style = "width: 25%; float: center;">
        </form>
    </div>
</body>
</html>