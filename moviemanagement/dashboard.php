<?php
    include_once("config.php");

    if(empty($_SESSION['username'])){
        header("login.php");
    };

    $sql = "SELECT * FROM users";
    $selectUsers = $conn->prepare($sql);
    $selectUsers->execute();

    //$users_data = $selectUsers->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="
https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css
" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
  	<link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
	<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
	<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
	<link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
	<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
	<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
	<meta name="theme-color" content="#7952b3"> 
</head>
<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand cold-md-3 col-lg-2 me-0 px-3" href="#"><?php echo "Welcome to dashboard" .$_SESSION['username'];?></a>

        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button">
            <span class="navbar-toggle-icon">
</button>
        <input type="text" placeholder="Search" aria-label="Search" class="form-control form-control-dark w-50">
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a href="logout.php" class="nav-link px-3">Sign Out</a>
</div>
</div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <?php if(%_SESSION['is_admin']=='true'){?>
                        <li class="nav-item">
              <a class="nav-link" href="home.php">
                <span data-feather="file"></span>
                Home
              </a>
            </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="list_movies.php">
              <span data-feather="file"></span>
              Movies
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="bookings.php">
              <span ></span>
              Bookings
            </a>
          </li>
        </ul> 

        <?php } else {?>
        <ul>
            <li class="nav-item">
                <a href="home.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
            <a href="bookings.php" class="nav-link">Bookings</a>
        </li>
        </ul>
            <?php }?>
        

</div>
</nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            
            <div class="d-flex justify-content-between flex-wrap flex-medium-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
        </div>

        <?php if($_SESSION['is_admin'] == 'true') {?>
            <h2>Users</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users_data as $user_data){ ?>
                            <tr>
                                <td><?php echo $user_data['id']; ?></td>
                                <td><?php echo $user_data['name']; ?></td>
                                <td><?php echo $user_data['username']; ?></td>
                                <td><?php echo $user_data['email']; ?></td>

                                <td><a href="updateUsers.php?id=<?=$user_data['id'];?>">Update</td>
                                <td><a href="deleteUsers.php?id=<?=$user_data['id'];?>">Delete</td>
                            </tr>

                    <?php }?>
                    </tbody>
                </table>
            </div>
            <?php } else { }?>
        </main>

</div>


<script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      <script src="
https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js
" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="
https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js
" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script> 

</body>
</html>