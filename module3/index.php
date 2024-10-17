<?php
//if statement, if...ifelse statement, if....ifelse...else statement, switch statement

$num = 2;

//if statement

if($num<0){
    echo "$num is less than zero";
};

//if....else
$age = 14;

if($age>18){
    echo "you are an adult";
}   else{
    echo "you are under 18";
}

if(($age > 13) && ($age < 20)){
    echo "discount for you";
}

//if....elseif.....else

if($num<0){
    echo "the value $num is less than zero";
}elseif($num==0){
    echo "the value $num is equal to zero";
}else{
    echo "the value $num is more than zero";
}

//write a program that has a variable named score and assign it a value
// check and as a result should be displayed:
//A 90-100 B 80-89 C 70-79 D 60-69 F other results

$score = 84;

if(($score<=100)&&($score>=90)){
    echo "Grade: A";
}elseif(($score<=89)&&($score>=80)){
    echo "Grade: B";
}elseif(($score<=79)&&($score>=70)){
    echo "Grade: C";
}elseif(($score<=69)&&($score>=60)){
    echo "Grade: D";
}else{
    echo "Grade: F";
}

$grade = 'B';

switch($grade){
    case 'A':
        echo 'Excellent';
        break;
    case 'B':
        echo 'well done';
        break;
    case 'C':
        echo 'good job';
        break;
    case 'D':
        echo 'you passed';
        break;
    case 'F':
        echo 'stduy more';
        break;
    default:
    echo 'invalid';
    break;
}
?>