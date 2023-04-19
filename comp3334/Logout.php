<?php

    setcookie("userid", $code, time() - (86400 * 30), "/");
    setcookie("checkcode", $code, time() - (86400 * 30), "/");

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
    
    <title>COMP3334 GP21</title>

   
</head>


<body>
    <nav class="navbar navbar-light navbar-expand-lg bg-secondary">
    <div class="container">
    <a class="navbar-brand" href="./Home.php">
        JWPTB <!--img-->
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" href="./Home.php" style="color: white;">Home</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="./aboutus.html">About us</a>
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

    <h1>You are successful logout ! </h1>
    <a href="./index.php"> Click me go back to defaul page! </a>
</body>
</html>