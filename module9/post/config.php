<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "another_db";

try{
    $connect = new PDO("mysql:host=$server;dbname=$db", $username, $password);

}catch(Exceptions $e){
    echo "Something went wrong! ";
}
?>