<?php
//deleting a column
try{
    //Connect to the db
    $pdo = new PDO("mysql:host=localhost; dbname=testdb", "root", "");

    //table alteration SQL
    $sql = "ALTER TABLE users DROP COLUMN email";

    $pdo ->exec($sql);

    echo "Column deleted";
}catch(PDOException $e){
    echo"Error deleting column ", $e->getMessage();
}
?>