<?php
//1. write a file using: 'fopen','fwrite','fclose'

function writeToFile($message){
    $file = fopen("example.txt","a");

    
//check if the file was successfully opened
if($file){
    fwrite($file,$message.PHP_EOL);

    //close the file
    fclose($file);

    echo "Message written to file successfully! <br>";
}else{
    echo "Failed to open file";
};
}

writeToFile("mesazh");

//2. read from a file using 'fopen','fread'

function readFromFile(){
    $file = fopen("example.txt","r");

    //check if it was opened
    if($file){
        echo "Content read of example.txt: ";

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

//3. write a single line to the file using file_put_contents

function quickWriteToFile($message){
    file_put_contents("example.txt",$message.PHP_EOL);
    echo "Msg written to file using file_put_contents <br>";
}

quickWriteToFile("done")
?>