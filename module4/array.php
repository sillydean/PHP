<?php 
//3 Types of arrays: 1.Indexed Arrays                     2. Associative Arrays                        3.Multidimensional Arrays 
$sports = ['Football','Handball','Basketball','Volleyball'];
echo $sports[0];
echo end($sports);
echo count($sports);

$len = count($sports);

for($i=0; $i < $len; $i++){
    echo $sports[$i], "\n";
}

?>