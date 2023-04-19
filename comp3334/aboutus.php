<?php

include 'Config.php';

$sql = "SELECT * FROM registration";
$UH = $connection->query($sql);

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

    <title>About Us</title>

    <style>
        body {
            background-image: url('./img/speech.jpg');
            background-size: 50%;
        }

        .bg-text {
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.6);
            /* Black w/opacity/see-through */
            color: white;
            font-weight: bold;
            border: 3px solid #f1f1f1;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            width: 80%;
            padding: 20px;
            text-align: center;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg bg-secondary">
        <div class="container">
            <a class="navbar-brand" href="./Home.php">
                JWPTB
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

                            if (empty($_COOKIE['userid'])) {
                                echo '
                <li class="nav-item">
                    <a class="nav-link" href="./Login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./Register.php">Try Free Trial</a>
                </li>
                ';
                            } else {
                                echo '
                <li class="nav-item">
                    <a class="nav-link" href="./ClientPage/' . $_COOKIE['userid'] . '.php">' . $_COOKIE['userid'] . '</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./Logout.php">Logout</a>
                </li>
                
            ';
                            }

                            ?>
                        </ul>
                    </div>
                </div>


            </nav>
        </div>
    </nav>


    <div class="bg-text">
        <h1>About Us</h1>
        <p>This is a project duscussion forum in metaverse.<br>We encourage users to exchange ideas and interact with each other using a 3D and virtual
            environment.<br>Users can enjoy our forum securely because a number of security measures are implemented.</p>
    </div>


</body>

</html>