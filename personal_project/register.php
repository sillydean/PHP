<?php
    require_once("config.php");
    $success = "";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if(empty($username) || empty($password) || empty($email)){
            $error = "All fields are required.";
        }else{
            $checkuser="SELECT * FROM users WHERE username='$username' or email='$email'";
        $result = $conn->query($checkuser);

        if($result->num_rows>0){
            $error="Username or email already exists!";
        }else{
                $hashed_password = md5($password);
                $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email','$hashed_password')";
                if($conn->query($sql)==TRUE){
                    $success = "Registration successful! You can now <a href='login.php'>Login here!</a>";

                }else{
                    $error = "Error: ".$conn->error;
                };
        };

    };
}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        /* Background gradient for the entire page */
        body {
            background: linear-gradient(135deg,rgb(111, 95, 120), black);
            color: #fff;
            font-family: 'Arial', sans-serif;
        }

        /* Center card with smooth edges and gradient border */
        .card {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 4px 10px rgb(158, 143, 172);
            border: 2px solid transparent;
            background-clip: padding-box;
        }

        /* Stylish buttons */
        .btn-primary {
            background: linear-gradient(to right, rgb(107, 95, 120),black);
            border: none;
            transition: all 0.3s ease;
        }

        /* Links with hover effect */
        a {
            color: #6a11cb;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        a:hover {
            color:rgb(81, 69, 89);
        }

        /* Inputs styling */
        input.form-control {
            border-radius: 10px;
            border: 1px solid #ddd;
            transition: border 0.3s ease, box-shadow 0.3s ease;
        }

        input.form-control:focus {
            border-color:rgb(82, 69, 89);
            box-shadow: 0 0 8px rgb(156, 143, 172);
        }

        /* Title */
        h2 {
            color:rgb(79, 69, 89);
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="card shadow-sm p-4" style="width: 400px;">
        <h2 class="text-center mb-4">Register</h2>
        <?php if (isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
        <form action="register.php" method="POST">
            <div class="mb-3">
                <label for="us ername" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <!-- Hidden input for dynamic redirect -->
            <input type="hidden" name="redirect" value="login.php">
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
        <div class="text-center mt-3">
            <p>Already have an account? <a style="color:rgb(80, 69, 89)" href="login.php">Login here</a></p>
        </div>
    </div>
</body>
</html>