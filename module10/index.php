<?php
require_once 'config.php';

try{
$sql = "SELECT id, username, email, password FROM users";
$stmt = $pdo->query($sql);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch(PDOexception $e){
    echo "Error fetching data ".$e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>