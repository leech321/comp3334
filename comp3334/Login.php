<?php
    include 'server.php'; 
    include 'Config.php';
    
    $sql = "SELECT * FROM registration";
    $UserData= $connection->query($sql);

      

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
    <link rel="stylesheet" href="./css/group.css">
    <meta http-equiv="Content-Security-Policy" content="default-src '*'; img-src 'self'; script-src '*';" />
    <title>COMP3334 GP21</title>

    <style>
        body,html{
            height:100%;
        }

        #TopBg{
            height: 50%;
            margin: 0;
            background-image: url('./img/BlogBG1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;

        }

        input{
            margin-top: 20px;
            text-align: center;
            
        }
        span{
            color: red;
        }
    </style>



</head>

<body>
<nav class="navbar navbar-light navbar-expand-lg bg-secondary">
    <div class="container">
    <a class="navbar-brand" href="./Home.php">
        JWPTB<!--img-->
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



    
    <div id="Loginform">
        <form method="post" action="Login.php" style="text-align:center">
            <label for="userid">userid :</label>
            <input type="text" name="userid" id="userid" class="form-control" placeholder="User id" />
            <br>
            <label for="password"> User password :</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="User Password" > 
            <br>
            <?php 
            if(!empty($UErr)){ echo '<span>'. $UErr .'</span> <br>';} 
            if(!empty($PErr)){ echo '<span>'. $PErr .'</span> <br>';} 
            if(!empty($TErr)){ echo '<span>'. $TErr .'</span> <br>';} 
            if(!empty($NErr)){ echo '<span>'. $NErr .'</span> <br>';} 
            ?>
            <input type="hidden" name="csrf" value="<?php echo $token;?>">
            <input type="submit" name="login_btn" value="Login"/>
            <input type="reset" value="Reset"/>
        </form>
    </div>
        

    <?php
				if(isset($_SESSION['error'])){
					?>
					<div class="alert alert-danger text-center" style="margin-top:20px;">
						<?php echo $_SESSION['error']; ?>
					</div>
					<?php
 
					unset($_SESSION['error']);
				}
 
				if(isset($_SESSION['success'])){
					?>
					<div class="alert alert-success text-center" style="margin-top:20px;">
						<?php echo $_SESSION['success']; ?>
					</div>
					<?php
 
					unset($_SESSION['success']);
				}
			?>


</body>

</html>