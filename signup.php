<?php
    require('connect.php');

    // define variables and initialize with empty values
    $username_err = $password_err = $confirm_password_err = '';

    function checkUserExists($username) {
        global $db;
        $query = "SELECT * FROM user";
        $statement = $db->prepare($query);
        $statement->execute();
        $users = $statement->fetchAll();
        $statement->closeCursor();
        foreach ($users as $user) {	
            if ($user["username"] == $username) {
                return 'error: username already exists!';
            }
        }
        return '';
    }

    function checkPassword($password) {
        if (ctype_alnum($password) && strlen($password) >= 5 && strlen($password) <= 50) 
            return '';
        return 'error: password must be alphanumerical and be 4-50 characters long ';
    }

    function confirmPasswords($password, $confirm_password) {
        if ($password == $confirm_password)
            return '';
        return 'error: passwords do not match!';
    }

    function createNewUser($first, $last, $username, $password) {
        global $db;
        $query = "INSERT INTO user (first, last, username, password) VALUES (:first, :last, :username, :password)";
        $statement = $db->prepare($query);
        $statement->bindValue(':first', $first);
        $statement->bindValue(':last', $last);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $statement->closeCursor();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $first = $_POST['first'];
        $last = $_POST['last'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        $username_err = checkUserExists($username);
        $password_err = checkPassword($password);
        $confirm_password_err = confirmPasswords($password, $confirm_password);

        if (empty($password_err) && empty($password_err) && empty($password_err)) {
            createNewUser($first, $last, $username, $password);
            setcookie('user', $username, time()+3600);
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

            <label for ="first">first name</label><br>
            <input type="text" placeholder="enter first name" name="first" required><br><br>
            
            <label for ="last">last name</label><br>
            <input type="text" placeholder="enter last name" name="last" required><br><br>

            <label for="username">username</label><br>
            <input type="text" placeholder="enter username" name="username" required><br>
            <?php echo (!empty($username_err)) ? "<er>$username_err</er><br>" : ''; ?><br>
                
            <label for="password">password</label><br>
            <input type="password" placeholder="enter password" name="password" required><br>
            <?php echo (!empty($password_err)) ? "<er>$password_err</er><br>" : ''; ?><br>
            
            <label for="confirm_password">confirm password</label><br>
            <input type="password" placeholder="re-enter password" name="confirm_password" required><br>
            <?php echo (!empty($confirm_password_err)) ? "<er>$confirm_password_err</er><br>" : ''; ?><br>

            <button type="submit">sign up</button>
            <button type="reset">reset</button>
        </form>
    </div>
</body>
</html>