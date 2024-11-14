<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = "testdb";

try{
    $pdo = new PDO("mysql:host=$host; dbname=$db", $user, $pass);

    // $sql = "CREATE TABLE users (id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    // username VARCHAR(30) NOT NULL,
    // password VARCHAR(30) NOT NULL )";

    // $pdo -> exec($sql);

    // echo "Table created";
    $username = "Jack";
    $password = password_hash("mypassword", PASSWORD_DEFAULT);

    //insert statement for SQL
    $sql = "INSERT INTO users(username,password) VALUES ('$username','$password')";

    //execute the statement

    $pdo -> exec($sql);

    echo "Success new record added";
}catch(DOException $e){
    // echo "Table not created ". $e->getMessage();

    echo $e -> getMessage();
}
?>