<?php
    include 'Config.php';
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
            background-image: url('./img/TermBG.jpg');
            /*background-repeat: repeat-x;*/
        }

        .text{
            color:white;
            margin:auto;
        }

        #Box2{
            width:50%;
            display:block;
            justify-content:center;
            border: 2px solid white;
            margin:auto;
            margin-top:100px;
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


    <div id="Box2">
     <h1 class="text" style="text-align:center;">Terms of use</h1> 
     <pre class="text">
        This platform is operated by JWPTB Limited. Our platform is provided free of charge.
        You should use it at your own risk. By registering, you are deemed to have confirmed your understanding of this risk. 
        All the resource shall only be used in Hong Kong.
        You should be responsible for your act on this platform. 
        You should not use discriminatory, violent or defamatory language. Please respect all other users.

        Privacy 
        Personal data you provided for registration will be used for maintaining your profile on our platform. 
        By providing your data, you consent to such use. 
        We will keep the data for another 3 months if you inform us to deregister from our platform. 
        If you wish to modify your personal data, please contact jwptb@22032749d.com.
    </pre>
    </div>

 
</body>

</html>
