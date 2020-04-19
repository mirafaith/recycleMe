<?php
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <link href='http://fonts.googleapis.com/css?family=Hind+Siliguri' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Roboto:light" rel="stylesheet">
    <link href='styles.css' rel='stylesheet' type='text/css' />
    
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src ="dynamic.js"></script>
</head>

<body>
	<div class="header">
		<a href="./home.html" class="name">cville mus<span style="color: #2E8B57;">¡</span>k</span></a>
	</div>
    <br>

    <div class="leftside">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <h3>Enter a username and password to sign up</h3>
            
            <label for="email">email</label>
            <input type="text" placeholder="enter email" name="email" required><br>

            <label for="username">username</label>
            <input type="text" placeholder="enter username" name="username" required><br>
            
		    <label for="pw">password</label>
            <input type="password" placeholder="enter password" name="pw" required><br>
            
            <label for="r_pw">confirm password</label>
            <input type="password" placeholder="re-enter password" name="r_pw" required><br>

            <button type = "submit">sign up</button>
        </form>
    </div>

    <div class="rightside">
    <?php

    // checks validity of username and password
    function checkEntered($entered) {
        return ctype_alnum($entered) && strlen($entered) >= 5 && strlen($entered) <= 50;
    }

    // check availability of username/email
    // function checkUserExists($username, $email) {
    //     foreach($_SESSION as $tempUsername => $value) {
    //         if($tempUsername == $username)
    //             return true;
    //         if($value[0] == $email)
    //             return true;
    //     }
    //     return false;
    // }


    function createTable() {
        require("connect.php");

        $query = "CREATE TABLE [IF NOT EXISTS] MyUsers (
            username VARCHAR(50) NOT NULL,
            email VARCHAR(50) NOT NULL,
            pw VARCHAR(50) NOT NULL
            )";
    }

    function checkUserExists($username, $email) {
        require("connect.php");

        $query = "SELECT * FROM MyUsers";
        $statement = $db->prepare($query); 
        $statement->execute();

        $users = $statement->fetchAll();

        $statement->closecursor();

        foreach ($users as $user)
        {	
            if($user["username"] == $username)
                return true;
            if($user["email"] == $email)
                return true;
        }
        return false;
    }

    function createNewUser($username, $email, $pw) {
        require("connect.php");

        $query = "INSERT INTO MyUsers (username, email, pw) VALUES (:username, :email, :pw)";
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':pw', $pw);
        $statement->execute();
        $statement->closeCursor();
    }


    $email = $username = $pw = $r_pw = NULL;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $pw = $_POST['pw'];
        $r_pw = $_POST['r_pw'];

        // createTable();

        // form validation
        if (checkUserExists($username, $email))
            echo "<label>Username and/or email already taken. Please try again!</label>";
        else if ($pw != $r_pw)
            echo "<label>Passwords don't match. Please try again!</label>";
        else if(!(checkEntered($username) && checkEntered($pw)))
            echo "<label>Username and password must be alphanumerical and be 4-50 characters long. Please try again!</label>";
        else if(!preg_match('/\b[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}\b/', $email))
            echo "<label>The email address you entered is invalid. Please try again!<label>";
        else {
        //    createNewUser($username, $email, $pw);
            
            echo "<label>Thank you for signing up, $username!</label><br /><br />";
            echo "<label>The email associated with your accound is \"$email\"</label><br /><br />";
            echo "<label>Your password is \"$pw\"</label><br/ ><br >";

            $value = array($email, $pw);
            $_SESSION[$username] = $value;

            setcookie("user", $username, time()+24*60*60, "/");

            echo "<label>You are signed in as " . $_COOKIE["user"] . "</label>";

            echo "<button onclick=window.open('reviews.html')>let's go!</button><br />";
        }
    }

    // prints all session variables
    // print_r($_SESSION);
    
    // remove all session variables
    // session_unset();
    
    // destroy the session
    // session_destroy();
    ?>
    </div>

</body>
</html>