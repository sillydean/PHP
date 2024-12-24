<?php
require_once("config.php");
$error="";
$success="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $title= mysqli_real_escape_string($conn, $_POST['title']);
    $description= mysqli_real_escape_string($conn, $_POST['description']);
    $quantity= mysqli_real_escape_string($conn, $_POST['quantity']);
    $price= mysqli_real_escape_string($conn, $_POST['price']);

    if(empty($title) ||empty($description) ||empty($quantity) || empty($price)){
        $error = "All fields are required!";
    }else{
        $checkproduct="SELECT * FROM product WHERE title='$title'";
        $result = $conn->query($checkproduct);

        if($result->num_rows>0){
            $error="Product already exists!";
        }else{
                $sql = "INSERT INTO product (title, description, quantity, price) VALUES ('$title', '$description','$quantity','$price')";
                if($conn->query($sql)==TRUE){
                    $success = "Product added";

                    header("Location:dashboard.php");
                    exit();
                }else{
                    $error = "Error: ".$conn->error;
                }
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="card shadow-sm p-4" style="width: 400px;">
        <h2 class="text-center mb-4">Add a product</h2>
        <?php if (isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
        <form action="add.php" method="POST">
        <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="Title" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" name="description" value="Description" required>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" name="quantity" value="Quantity" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" name="price" value="Price" step="any" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Add</button>
        </form>
    </div>
</body>
</html>
