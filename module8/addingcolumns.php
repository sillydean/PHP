<?php
//add columns

try{
    //Connect to the db
    $pdo = new PDO("mysql:host=localhost; dbname=testdb", "root", "");

    //table alteration SQL
    $sql = "ALTER TABLE users ADD email VARCHAR(255)";

    $pdo ->exec($sql);

    echo "Column created";
}catch(PDOException $e){
    echo"Error creating column ", $e->getMessage();
}
?>