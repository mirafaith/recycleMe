<?php
    require('connect.php');
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
            <a href="./account.html"><span style="color: #bedd71;">account</span></a>
        </div>
    </div>

    <div class="edit">
        <h4>edit my profile</h4><br><br>
        <form action=".\edit.php" method="post">
            <label for="name">name</label><br>
            <input type="text" id="name" name="name" placeholder="jane doe.."><br><br>

            <label for="email">email</label><br>
            <input type="text" id="address" name="address" placeholder="display current address.."><br><br>

            <label for="email">favorite locations</label><br>
            <input type="text" id="faves" name="faves" placeholder="favorite locations.."><br><br>

            <label for="email">cios</label><br>
            <input type="text" id="cio" name="cio" placeholder="cio.."><br>

            </select><br>
          
            <input type="submit" value="submit" style = "width: 25%; float: center;">
        </form>
    </div>
</body>

</html>