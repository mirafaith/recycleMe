<?php
    require('connect.php');
    require('functions.php');

    // define variables and initialize with empty values
    $username_err = $password_err = $confirm_password_err = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['u_name'];
        $first = $_POST['first'];
        $last = $_POST['last'];
        $password = $_POST['pw'];
        $confirm_password = $_POST['confirm_password'];

        $username_err = checkUserExists($username);
        $password_err = checkPassword($password);
        $confirm_password_err = confirmPasswords($password, $confirm_password);

        if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
            createNewUser($username, $first, $last, $password);
            
            # start a session for the new user
            session_start();
            $_SESSION['user'] = $username;
            header('Location: ./welcome.php');
        }
    }
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
        <a href="./home.php" class="name">recycleMe</a>
    </div>

    <div class="signing">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <h3 style = "text-align: center;">sign up for an account</h3><br>

            <label for="username">username</label><br>
            <input type="text" id="username" name="u_name" placeholder="enter username" required><br>
            <?php echo (!empty($username_err)) ? "<er>$username_err</er><br>" : ''; ?><br>

            <label for ="first">first name</label><br>
            <input type="text" id="first" name="first" placeholder="enter first name" required><br><br>
            
            <label for ="last">last name</label><br>
            <input type="text" id="last" name="last" placeholder="enter last name" required><br><br>
                
            <label for="password">password</label><br>
            <input type="password" id="password" name="pw" placeholder="enter password" required><br>
            <?php echo (!empty($password_err)) ? "<er>$password_err</er><br>" : ''; ?><br>
            
            <label for="confirm_password">confirm password</label><br>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="re-enter password" required><br>
            <?php echo (!empty($confirm_password_err)) ? "<er>$confirm_password_err</er><br>" : ''; ?><br>

            <button type="submit">sign up</button>
            <button type="reset">reset</button>
        </form>
    </div>
</body>
</html>