<?php
require('connect.php');
require('functions.php');
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: home.php");
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $date = $_POST['date'];
        $location = $_POST['location'];
        $name = $_POST['name'];
        createEvent($title, $date, $location, $name);
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
    <script src="dynamic.js"></script>
</head>

<body>
    <div class="header">
        <a href="./home.php" class="name">recycleMe</a>
        <div class="nav">
            <br><br><br>
            <a href="./search.php">search</a>
            <a href="./events.php"><span style="color: #bedd71;">events</span></a>
            <a href="./account.php">account</a>
            <a href="./logout.php"><button>log out</button></a><br><br>
        </div>
    </div>

    <div class="edit">
        <h4>add an event</h4><br><br>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="name">name of event</label><br>
            <input type="text" id="title" name="title" placeholder="title of event.." required><br><br>

            <label for="date">date</label><br>
            <input type="text" id="date" name="date" placeholder="11/25/2020.." required><br><br>

            <label for="location">location</label><br>
            <input type="text" id="location" name="location" placeholder="new cabell hall.." required><br><br>

            <label for="CIOId">cio in charge</label><br>

            <?php
             $current_user = '';
             if (isset($_SESSION['user'])) {
                 $current_user = $_SESSION['user'];
             }
            $sql = "SELECT * FROM has JOIN CIO ON has.CIOId = CIO.CIOId WHERE username = '$current_user'"; 
            
            echo "<select name = 'name'><option value='0'>select a CIO you are already a part of:</option>";
            foreach ($db->query($sql) as $row) {
                  echo "<option value='".$row['CIOId']."'>".$row['name']."</option>";
                }
            
            echo "</select>";
            ?>
            <br><br>
            <input type="submit" value="add" style="width: 25%; float: center;">
        </form>
    </div>
</body>

</html>