<?php
    require('connect.php');
    require('functions.php');
    session_start();
    
    $username_err = $password_err = $sucess ='';
    $current_user = '';
    if (isset($_SESSION['user'])) {
        $current_user = $_SESSION['user'];
    }
    else {
        header("Location: home.php");
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $first = $_POST['first'];
        $last = $_POST['last'];
        $username = $_POST['u_name'];
        $password = $_POST['pw'];

        if ($username != $current_user)
            $username_err = checkUserExists($username);

        if (!verifyUser($current_user, $password))
            $password_err = 'error: incorrect password!';

        if (empty($username_err) && empty($password_err)) {
            updateUser($current_user, $username, $password, $first, $last);
            $sucess = "successfully updated profile!";
            $_SESSION['user'] = $username;
        }
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
            <a href="./search.php">search</a>
            <a href="./events.php">events</a>
            <a href="./account.php"><span style="color: #bedd71;">account</span></a>
            <a href="./logout.php"><button>log out</button></a><br><br>
        </div>
    </div>

    <div class="edit">
        <h4>edit my profile</h4><br><br>
        <?php echo (!empty($sucess)) ? "<a>$sucess</a><br>" : ''; ?><br>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <label for="username">username</label><br>
            <input type="text" id="username" name="u_name" placeholder="update username.." required><br>
            <?php echo (!empty($username_err)) ? "<er>$username_err</er><br>" : ''; ?><br>

            <label for="first">first name</label><br>
            <input type="text" id="first" name="first" placeholder="update first name.." required><br><br>

            <label for="last">last name</label><br>
            <input type="text" id="last" name="last" placeholder="update last name.." required><br><br>

            <label for="CIOs">CIOs</label><br>
            <input type="text" id="CIOs" name="CIOs" placeholder="update CIOs.."><br><br>

            <label for="password">current password</label><br>
            <input type="text" id="password" name="pw" placeholder="verify current password.." required><br>
            <?php echo (!empty($password_err)) ? "<er>$password_err</er><br>" : ''; ?><br>

            <button type="submit" style = "width: 25%; float: center;">submit</button>
            <button type="reset"  style = "width: 25%; float: center;">reset</button>
        </form>
    </div>
</body>

</html>>