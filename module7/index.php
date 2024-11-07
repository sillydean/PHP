<?php


//setting mysql database parameters
$host = 'localhost';
$user = 'root';
$pass = '';

//connection in databes using pdo
//beginning of a try block
try{
    //attempt to create a new pdo object and connecting to a mysql database
    //the connection string is constructed using variables $host, $user, $pass

    $conn = new PDO("mysql:host=$host; $user, $pass");

    //if the connection is successful, print connected
    echo "Connected";
} catch (Exception $e){
    echo "Not Connected";
}
?>