<?php
require_once("config.php");

$id = $_GET['id'];

$sql = "DELETE FROM product WHERE id = $id";
$conn -> query($sql);

header("Location: dashboard.php");
exit();
?>