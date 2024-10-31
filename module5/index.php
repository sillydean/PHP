<?php

$dogs = array(
    array("Chihuahua", "Mexico", 20),
    array("Husky","Siberia",15),
    array("Bullog","England", 10),
);

foreach($dogs as $a){
    echo $a[0]. " Origin:".$a[1]." Lifespan: ".$a[2]."<br>";
}

for($row=0;$row<3;$row++){
    echo"<p><b>Row Number $row</b></p>";
    echo"<ul>";
    for($col=0;$col<3;$col++){
        echo"<li>".$dogs[$row][$col]."</li>";
    }
    echo"</ul>";
}
//echo $dogs[0][0]. ":Origin: " .$dogs[0][1]. ",    :Lifespan:"  .$dogs[0][2]. ".<br>";
//echo $dogs[1][0]. ":Origin: " .$dogs[1][1]. ",    :Lifespan:"  .$dogs[1][2]. ".<br>";
//echo $dogs[2][0]. ":Origin: " .$dogs[2][1]. ",    :Lifespan:"  .$dogs[2][2]. ".<br>";

$arrays = array(
    array(1,2,3),
    array(1,2,3),
    array(1,2,3)
);

for($i=1;$i<4;$i++){
    for($j=1;$j<4;$j++){
        echo"Array: $i Element: $j <br>";
    }
}

for($i=1;$i<5;$i++){
    for($j=1;$j<=$i;$j++){
        echo "*";

    }
    echo '<br>';
}
?>