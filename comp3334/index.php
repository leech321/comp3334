<?php
$time = 365 * 24 * 60 * 60;
session_set_cookie_params($time);
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/Default.css">
    <title>COMP3334 GP21</title>

    <style>
        a{
            text-decoration:none; 
            font-family: "Times New Roman", Times, serif;
            color:black;
        }

    </style>
</head>


<body>
    <nav class="navbar navbar-light navbar-expand-lg bg-secondary">
    <div class="container">
    <a class="navbar-brand" href="./index.php">
        JWPTB <!--img-->
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" href="index.php" style="color: white;">Home</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="./aboutus.php">About us</a>
        </li>
        </ul>     
    </div>



    <nav class="navbar navbar-light navbar-expand-lg bg-secondary">
        <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="./Login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./Register.php">Try Free Trial</a>
            </li>
            </ul>     
        </div>
    </div>

    </nav>
    </div>
    </nav>   




    <div class="center">
    <h1>
    <a href="./Home.php">Let Get Start</a>
    </h1>
    </div>

</body>

</html>