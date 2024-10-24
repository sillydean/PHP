<?php
$sport = ["football", "volleyball", "handball", "basketball"];
array_unshift($sport, "Tennis");
var_dump($sport);

array_shift($sport);
var_dump($sport);
?>