<?php

$hostname = 'localhost: 3306';
$dbname = 'mira';
$port = '3306';

$username = 'mira';
$password = '732116'
$db;

try 
{
   $db = new PDO("mysql:host=$hostname;dbname=$dbname;port=$port", $username);
   echo "<p>You are connected to the database named $dbname</p>";
}
catch (PDOException $e)
{
   $error_message = $e->getMessage();  
   echo "<p>An error occurred while connecting to the database: $error_message </p>";
}
catch (Exception $e)
{
   $error_message = $e->getMessage();
   echo "<p>Error message: $error_message </p>";
}