<?php session_start() ?>
<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-dark bg-dark navbar-expand-sm">
    <a class="navbar-brand" href="#">
        <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/logo_white.png" width="30" height="30" alt="logo">
        <?php echo 'Welcome ' .$_SESSION['username'] ?>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-2" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar-list-2">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="indexwatch.php?page=create-watch">Add New Watch</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="signup.php">Sign Up Manager Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="loginadmin.php">Sign Out</a>
            </li>
        </ul>
    </div>
    <form class="form-inline"  method="post">
        <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search Phone Name">
        <button  class="bg-dark" type="submit" name="find" style="color: whitesmoke ">Search</button>
    </form>
</nav>
