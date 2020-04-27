<?php

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

function verifyUser($username, $password) {
    global $db;
    $query = 'SELECT * FROM user';
    $statement = $db->prepare($query);
    $statement->execute();
    $users = $statement->fetchAll();
    $statement->closeCursor();
    foreach ($users as $user) {	
        if ($user['username'] == $username && $user['password'] == $password)
            return true;
    }
    return false;
}

function checkPassword($password) {
    if (ctype_alnum($password) && strlen($password) >= 5 && strlen($password) <= 50) 
        return '';
    return 'error: password must be alphanumerical and be 5-50 characters long ';
}

function confirmPasswords($password, $confirm_password) {
    if ($password == $confirm_password)
        return '';
    return 'error: passwords do not match!';
}

function createNewUser($username, $first, $last, $password) {
    global $db;
    $query = "INSERT INTO user (username, first, last, password) VALUES (:username, :first, :last , :password)";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':first', $first);
    $statement->bindValue(':last', $last);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
}

function createEvent($title, $date, $location, $name){
    global $db;
    // $find = "SELECT CIOId FROM CIO WHERE name = :name";
    // $finding = $db->prepare($find);
    // $finding->bindValue(':name', $name);
    $query = "INSERT INTO greenEvent (title, date, location, CIOId) VALUES (:title, :date, :location, (SELECT CIOId FROM CIO WHERE name = :name))";
        $statement = $db->prepare($query);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':date', $date);
        $statement->bindValue(':location', $location);
        $statement->bindValue(':name', $name);
        $statement->execute();
        $statement->closeCursor();
}

function updateUser($current_user, $username, $password, $first, $last) {
    global $db;
    $query = "UPDATE user SET username=:username, password=:password, first=:first, last=:last WHERE username=:current_user";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':first', $first);
    $statement->bindValue(':last', $last);
    $statement->bindValue(':current_user', $current_user);
    $statement->execute();
    $statement->closeCursor();
}

function deleteUser($username) {
    global $db;
    $query = "DELETE FROM user WHERE username=:username";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $statement->closeCursor();
}
