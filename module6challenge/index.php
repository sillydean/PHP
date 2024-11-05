<?php
//EASY CHALLENGE
function readFromFile(){
    $file = fopen("easychallenge.txt","r");

    //check if it was opened
    if($file){
        echo "Contents: ";

        //read file until the end (eof)
        while(!feof($file)){
            $line = fgets($file);
            echo ($line)."<br>";
        }
        fclose($file);
    }else{
        echo"Failed to open file";
    }
}
readFromFile();
?>