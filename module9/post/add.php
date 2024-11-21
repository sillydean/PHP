<?php
//connect to db
include_once("config.php");

//isset determines if a var is declared diff from NULL
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users(name, username, email) VALUES (:name, :username, :email)";

    $sqlQuery = $connect->prepare($sql);

    $sqlQuery->bindParam(':name', $name);
    $sqlQuery->bindParam(':username', $username);
    $sqlQuery->bindParam(':email', $email);

    $sqlQuery->execute();

    echo "User added sucesfully.";

}

?>