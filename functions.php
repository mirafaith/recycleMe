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

function addCIO($name, $email, $current_user) {
    global $db;
    $query = "SELECT * FROM CIO";
    $f_statement = $db->prepare($query);
    $f_statement->execute();
    $CIOs = $f_statement->fetchAll();
    $f_statement->closeCursor();
    $check = false;
    foreach ($CIOs as $CIO) {	
        if ($CIO["name"] == $name) {
            $query = "INSERT INTO has(CIOId, username) VALUES (:CIOId, :current_user)";
            $statement = $db->prepare($query);
            $statement->bindValue(':CIOId', $CIO["CIOId"]);
            $statement->bindValue(':current_user', $current_user);
            $statement->execute();
            $statement->closeCursor();
            $check = true;
        }
    }
    if ($check == true) {
        $query2 = "INSERT INTO CIO (email, name) VALUES (:email, :name)";
        $statement2 = $db->prepare($query2);
        $statement2->bindValue(':email', $email);
        $statement2->bindValue(':name', $name);
        $statement2->execute();
        $statement2->closeCursor();
        $find = "SELECT CIOId FROM CIO WHERE name = :name";
        $query3 = "INSERT INTO has(CIOId, username) VALUES (:find, :current_user)";
        $statement3 = $db->prepare($query3);
        $statement3->bindValue(':find', $find);
        $statement3->bindValue(':current_user', $current_user);
        $statement3->execute();
        $statement3->closeCursor();
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

?>