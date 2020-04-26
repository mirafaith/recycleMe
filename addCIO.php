<?php
    require('connect.php');
    require('functions.php');
    session_start();
    if (isset($_SESSION['user'])) {
        $current_user = $_SESSION['user'];
    }
    else {
        header("Location: home.php");
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        addCIO($name, $email, $current_user);
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

    <div class="edit">
        <h4>add a CIO</h4><br><br>

        <?php echo (!empty($sucess)) ? "<a>$sucess</a><br>" : ''; ?><br>

        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <label for="name">name of CIO</label><br>
            <input type="text" id="name" name="name" placeholder="greens2grounds.." required><br><br>

            <label for="email">CIO email</label><br>
            <input type="text" id="email" name="email" placeholder="contact email for CIO.." required><br><br>

            <button type="submit" style = "width: 25%; float: center;">submit</button>
        </form>
    </div>
</body>

</html>