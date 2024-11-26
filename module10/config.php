<?php
$host = 'localhost';
$dbname = 'my_table';
$username = 'root';
$password = ''; // $password = '';

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "DB connection failed : ".$e->getMessage();
}
?>