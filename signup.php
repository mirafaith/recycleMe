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
            
            <label for ="first"> first name</label>
            <input type="text" placeholder= "enter first name" name= "first" required><br>
             <label for ="last"> last name</label>
            <input type="text" placeholder= "enter last name" name= "last" required><br>


            <label for="username">username</label>
            <input type="text" placeholder="enter username" name="username" required><br>
            
		    <label for="pw">password</label>
            <input type="password" placeholder="enter password" name="pw" required><br>
            
            <label for="r_password">confirm password</label>
            <input type="password" placeholder="re-enter password" name="r_password" required><br>

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

        $query = "CREATE TABLE [IF NOT EXISTS] users (
            first VARCHAR(50) NOT NULL,
            last VARCHAR(50) NOT NULL.
            username VARCHAR(50) NOT NULL,
            password VARCHAR(50) NOT NULL
            )";
    }

    function checkUserExists($username) {
        require("connect.php");

        $query = "SELECT * FROM users";
        $statement = $db->prepare($query); 
        $statement->execute();

        $users = $statement->fetchAll();

        $statement->closecursor();

        foreach ($users as $user)
        {	
            if($user["username"] == $username)
                return true;
            
        }
        return false;
    }

    function createNewUser($first, $last, $username, $password) {
        require("connect.php");

        $query = "INSERT INTO users (first, last, username, password) VALUES (:first, :last, :username, :password)";
        $statement = $db->prepare($query);
        $statement->bindValue(':first', $first);
        $statement->bindValue(':last', $last);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $statement->closeCursor();
    }


    $first = $last = $username = $password = $r_password= NULL;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $first = $_POST['first'];
        $last = $_POST['last'];
        $username = $_POST['username'];
        $pw = $_POST['password'];
        $r_pw = $_POST['r_password'];

        // createTable();

        // form validation
        if (checkUserExists($username)
            echo "<label>Username already taken. Please try again!</label>";
        else if ($password != $r_password)
            echo "<label>Passwords don't match. Please try again!</label>";
        else if(!(checkEntered($username) && checkEntered($password)))
            echo "<label>Username and password must be alphanumerical and be 4-50 characters long. Please try again!</label>";
       
        else {
        //    createNewUser($username, $email, $pw);
            
            echo "<label>Thank you for signing up, $username!</label><br /><br />";
           
            echo "<label>Your password is \"$pw\"</label><br/ ><br >";

            $value = array($password);
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