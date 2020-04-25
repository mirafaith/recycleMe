

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
                <a href="./account.html"><span style="color: #bedd71;">account</span></a>
            </div>
    </div>
    <div class = "edit">
        <h4>add an event</h4><br><br>

        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="name">name of event</label><br>
            <input type="text" id="title" name="title" placeholder="title of event.."><br><br>
            <label for="email">date</label><br>
            <input type="text" id="date" name="date" placeholder="11/25/2020.."><br><br>
            <label for="email">location</label><br>
            <input type="text" id="location" name="location" placeholder="new cabell hall.."><br><br>
            <label for="email">cio in charge</label><br>
            <input type="text" id="CIOId" name="CIOId" placeholder="2.."><br>
            </select><br>
          
            <input type="submit" value="submit" style = "width: 25%; float: center;">
          </form>
    </div>
    <?php
        require('connect.php');
        if (isset($_POST[‘submit’])) {
            $title = $_POST['title'];
            $date = $_POST['date'];
            $location = $_POST['location'];
            $CIOId = $_POST['CIOId'];
            $sql = "DECLARE @id int";
            $sql = "SET @id = (SELECT COUNT(*) FROM greenEvent) + 1";
            $sql = "INSERT INTO greenEvent VALUES (@id, $title, $date, $location, $CIOId)";
        }

?>




</body>
</html>