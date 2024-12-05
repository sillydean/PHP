<?php

$host = 'localhost';
$dbname = 'usermanagement';
$username = 'root';
$password = '';

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    //Set PDO error mode to exception

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Connected";

    if($_SERVER["REQUEST_METHOD"]=="POST"){

        //get form data
        $user = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];

        if(empty($user) || empty($email) || empty($pass)){
            echo "All fields are required!";
            exit;
        }

        // Hash password
        $hashed_password = password_hash($pass, PASSWORD_BCRYPT);

        // Prepare SQL statement
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $pdo->prepare($sql);

        //Bind parameters
        $stmt-> bindParam(':username', $user, PDO::PARAM_STR);
        $stmt-> bindParam(':email', $email, PDO::PARAM_STR);
        $stmt-> bindParam(':password', $hashed_password, PDO::PARAM_STR);

        //Execute stmt
        if($stmt->execute()){
            echo "Sign up succesful! You can now log in!";
        }else{
            echo "Something went wrong! Try again";
        }
    }

}catch(PDOException $e){
    echo "ERROR: ".$e->getMessage();
}
?>