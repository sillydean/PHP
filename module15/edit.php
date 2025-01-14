<?php

require_once("config.php");
session_start();

$id = intval($_GET['id']);
$error = "";
$success = "";

//fetch product details
$sql = "SELECT * FROM product WHERE id=$id";
$result = $conn->query($sql);


if($_SERVER["REQUEST_METHOD"]=="POST"){
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    if(empty($title) || empty($description) || empty($quantity) || empty($price)){
        $error = "All fields required.";
    }else{
        $update_sql = "UPDATE product SET title = '$title', description = '$description', quantity = '$quantity', price = '$price' WHERE id='$id'";
        if($conn->query($update_sql)){
        $success = "Product updated succesfully!";
        //Refresh data
        $product['title'] = $title;
        $product['description']=$description;
        $product['quantity']=$quantity;
        $product['price']=$price;
        
        header("Location:dashboard.php");
        exit();
    }else{
            $error = "Error updating product: ".$conn->error();
        }
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="card-container">
        <div class="card shadow-sm p-4">
            <h2 class="text-center mb-4">Edit Product</h2>
            <form method="POST">
                <div class=""></div>
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="title" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" name="description" value="description" required>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" name="quantity" value="quantity" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" name="price" value="price" step="any" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Update</button>
            </form>
        </div>
    </div>
</body>
</html>