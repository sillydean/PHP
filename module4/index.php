<?php
$x = 5;
// global variable

function localVariable(){
    $y = 10;
    echo $y;
}
localVariable();
echo $x;
?>