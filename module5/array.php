<?php

$grade = array(
    "Math" => "3",
    "Art" => "5",
    "History" => "4",
    "Music" => "5",
);

//echo "Art grade is " .$grade["Art"];

foreach($grade as $subject => $grade){
    echo "Subject: ".$subject. " Grade: ".$grade."<br>"; 
}
?>