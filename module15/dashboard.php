<?php
require_once("config.php");

$sql = "SELECT * FROM product";
$result = $conn->query($sql);

if(!$result){
    die("Database query failed: ".$conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
</head>
<body>
    <!--Dashboard for viewing all products, editing, delete and add a new one -->
    <div class="container mt-4">

        <div class="content-container">
        <h2>Product Dashboard</h2>

        <a href = "add.php?id={$row['id']}" class = 'btn btn-warning btn-sm'>Add a product</a>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
            <?php
                //Check if there are any products
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>".htmlspecialchars($row['title'])."</td>
                                <td>".htmlspecialchars($row['description'])."</td>
                                <td>{$row['quantity']}</td>
                                <td>{$row['price']} &#8364;</td>

                                <td>
                                <a href = 'edit.php?id={$row['id']}' class = 'btn btn-warning btn-sm'>Edit</a>
                                <a href = 'delete.php?id={$row['id']}' class = 'btn btn-warning btn-sm'>Delete</a>
                                </td>
                              </tr>";
                    }
                } else{
                    echo "<tr><td colspan = '4' class = 'text-center'> No users found </td> </tr>";
                }
                ?>
            </tbody>
        </table>
            </div>
    </div>
</body>
</html>