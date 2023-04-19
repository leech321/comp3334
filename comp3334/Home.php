<?php
    include 'Config.php';
    include 'auth.php';
    $sql = "SELECT * FROM registration";
    $UH= $connection->query($sql);



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

    <style>
        body{
            background-image: url('./img/Grass.jpg');
            /*background-repeat: repeat-x;*/
        }

        img{
            margin-top: 20px;
            width:150px;
            height: 100px;
            margin-left: 50px;
            transition: transform .2s;
        }


        img:hover{
            transform: scale(1.5);
        }
    </style>

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
            <a class="nav-link" href="./aboutus.php">About us</a>
        </li>
        </ul>     
    </div>



        <nav class="navbar navbar-light navbar-expand-lg bg-secondary">
        <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

            <?php
            if(empty($_COOKIE['userid'])){
                echo'
                <li class="nav-item">
                    <a class="nav-link" href="./Login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./Register.php">Try Free Trial</a>
                </li>
                ';
            }    else {
                echo '
                <li class="nav-item">
                    <a class="nav-link" href="./ClientPage/'.$_COOKIE['userid'].'.php">'. $_COOKIE['userid'] .'</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./Logout.php">Logout</a>
                </li>
                
            ';}
            
                ?>
                </ul>
        </div>
    </div>
        

    </nav>
    </div>
    </nav>   

    <?php
        if(empty($_COOKIE['userid'])){
            echo '
                
                    <h1 style="text-align:center;">Please Login First</h1><br>
                    <div style="text-align:center">
                        <a href="./Login.php">Click me to Login</a>
                    </div>
            ';
        }


    ?>
    <div id="Map" class="row">
    <?php

        if(!empty($_COOKIE['userid'])){
            while ($row = $UH -> fetch_assoc()){
                echo '
                    <div class="col-6 col-lg-4 d-flex justify-content-center">
                    <h5>'. $row['userid'] .'</h5>
                    <a href="./ClientPage/'. $row['userid'] .'.php"><img src="'. $row['housephoto'].'"></a>
                    </div>
                ';
            }
    }
    ?>
    </div>

 
</body>

</html>