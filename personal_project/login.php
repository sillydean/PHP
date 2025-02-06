<?php
    require_once("config.php");
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Hash the password

        //Check admin credentials

        $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password' ";
        $result = $conn -> query($sql);


        if ($result->num_rows==1){
            $_SESSION['admin_logged_in'] = true;
            header("Location: admin.php");
            exit();
        }else{
            $error = "Invalid Username or Password";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg,rgb(43, 18, 96), black);
            color: #fff;
            font-family: 'Arial', sans-serif;
        }

        .card {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 4px 10px #91AC8F;
            border: 2px solid transparent;
            background-clip: padding-box;
        }

        .card:hover {
            border-image: linear-gradient(to right,rgb(43, 18, 96), black) 1;
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(to right,rgb(43, 18, 96), black);
            border: none;
            transition: all 0.3s ease;
        }

        a {
            color: #6a11cb;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        a:hover {
            color:rgb(78, 47, 138);
        }

        input.form-control {
            border-radius: 10px;
            border: 1px solid #ddd;
            transition: border 0.3s ease, box-shadow 0.3s ease;
        }

        input.form-control:focus {
            border-color:rgb(48, 27, 102);
            box-shadow: 0 0 8px rgb(38, 23, 74);
        }

        h2 {
            color:rgb(72, 69, 89);
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="card shadow-sm p-4" style="width: 400px;">
        <h2 class="text-center mb-4">Login</h2>
        <?php if (isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
        <form action="login.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <div class="text-center mt-3">
            <p >Dont have an account? <a style="color: #4B5945" href="register.php">Register here</a></p>
        </div>
    </div>
</body>
</html>
