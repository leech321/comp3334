<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include ('./Config.php');

if (isset($Userid)) {
    header('Location: home.php');
    
}

$currentDate = date("Y-m-d");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Userid = Securecheck($_POST['Userid']);
    $Userpw = Securecheck($_POST['Userpw']);
    $Email = Securecheck($_POST['Email']);
    $PN = Securecheck($_POST['PN']);
    $HousePhoto = Securecheck($_POST['HouseAnswer']);

    $errors = array();

    // Validate Userid
    if (empty($Userid)) {
        $errors['user_id'] = "Userid is required";
    }

    // Validate Password
    if (empty($Userpw)) {
        $errors['user_pw'] = "Password is required";
    } elseif (strlen($Userpw) < 8) {
        $errors['user_pw'] = "Password must be at least 8 characters long";
    } elseif ($_POST['Userpw'] !== $_POST['Userpw1']) {
        $errors['Userpw1'] = 'Passwords do not match';
    }

    // Validate Email
    if (empty($Email)) {
        $errors['email'] = "Email is required";
    } elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    }

    // Validate Phone Number
    if (empty($PN)) {
        $errors['phone_number'] = "Phone Number is required";
    } elseif (!preg_match("/^[0-9]+$/", $PN)) {
        $errors['phone_number'] = "Phone Number must contain only digits";
    }

    // Validate HousePhoto
    if (empty($HousePhoto)) {
        $errors['house_photo'] = "House photo selection is required";
    } elseif ($HousePhoto != "H1" && $HousePhoto != "H2") {
        $errors['house_photo'] = "Invalid house photo selection";
    }

    // If no errors, insert into database and redirect to index.php
    if (empty($errors)) {
        $Hashpw = hash('sha256', $Userpw);
        $HousePhotoPath = ($HousePhoto == "H1") ? "./img/2222-removebg-preview.png" : "./img/house-removebg-preview.png";
        $stmt = $connection->prepare("INSERT INTO registration(Userid, Password, Email, PhoneNo, HousePhoto) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssis", $Userid, $Hashpw, $Email, $PN, $HousePhotoPath);
        $stmt->execute();
        $stmt->close();

        $FC = file_get_contents("./ClientPage/WebTop.txt");
        $MF = fopen("./ClientPage/" . $Userid . ".php","w");
        
        fwrite($MF, $FC);

        $Data = '
        <div id="TopBg">
        <div class="col-md-12 text-center" id="TextColorBox">
        <h4 class="animate-charcter">Welcome</h3>
        </div>
  
  
        <div id="BI">
        <div id="TopBox">
            <div class="Type"><h5>Userid:</h5></div>
            <div class="Data"><p>'. $Userid .'</p></div>
        </div>
          
        <div id="SecondBox">
            <div class="Type"><h5>Email:</h5></div>
            <div class="Data"><p>'. $Email .'</p></div>
        </div>
  
        <div id="ThirdBox">
            <div class="Type"><h5>RegisterDate:</h5></div>
            <div class="Data"><p>'.$currentDate.'</div>
        </div>
        </div>
        </div>
        ';
          
        fwrite($MF, $Data);

        $FB= file_get_contents("./ClientPage/WebBot.txt");
        fwrite($MF, $FB);
        fclose($myfile);


        $stmt->close();

        header('Location: ./Home.php');
    }
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/Register.css">
     
    <style>
   
    #RegisForm{
        margin: 0 auto;
        position: fixed;
        background-image: url('./img/FormBG2.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        left: 25%;
        right: 25%;
        width: 50%;
        height: 700px;
        border: 1px solid black;
        
    }

    h2, label{
        color: white;
        background-color: black;
        border-radius: 5px;
        border: 1px solid black;
        padding: 5px;
    }

    h2{
        text-align: center;
    }

    button{
        position: relative;
        left: 10px;
    }


    fieldset {
        margin: auto;
        width: 500px;
        height: 700px;
        border-radius: 10px;
        background-color: #eeeeee;
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

<div class="container3" >
<div class="bubbles">
            <span style="--i:11;"></span><span style="--i:13;"></span><span style="--i:16;"></span><span style="--i:17;"></span><span style="--i:19;"></span>
            <span style="--i:20;"></span><span style="--i:23;"></span><span style="--i:26;"></span><span style="--i:10;"></span><span style="--i:15;"></span>
            <span style="--i:13;"></span><span style="--i:29;"></span><span style="--i:23;"></span><span style="--i:15;"></span><span style="--i:19;"></span>
            <span style="--i:11;"></span><span style="--i:13;"></span><span style="--i:16;"></span><span style="--i:17;"></span><span style="--i:19;"></span>
            <span style="--i:20;"></span><span style="--i:23;"></span><span style="--i:26;"></span><span style="--i:10;"></span><span style="--i:15;"></span>
            <span style="--i:13;"></span><span style="--i:29;"></span><span style="--i:23;"></span><span style="--i:15;"></span><span style="--i:19;"></span>
            <span style="--i:11;"></span><span style="--i:13;"></span><span style="--i:16;"></span><span style="--i:17;"></span><span style="--i:19;"></span>
            <span style="--i:20;"></span><span style="--i:23;"></span><span style="--i:26;"></span><span style="--i:10;"></span><span style="--i:15;"></span>
            <span style="--i:13;"></span><span style="--i:29;"></span><span style="--i:23;"></span><span style="--i:15;"></span><span style="--i:19;"></span>
            <span style="--i:11;"></span><span style="--i:13;"></span><span style="--i:16;"></span><span style="--i:17;"></span><span style="--i:19;"></span>
            <span style="--i:20;"></span><span style="--i:23;"></span><span style="--i:26;"></span><span style="--i:10;"></span><span style="--i:15;"></span><span style="--i:13;"></span><span style="--i:29;"></span><span style="--i:23;"></span><span style="--i:15;"></span><span style="--i:19;"></span>
            <span style="--i:11;"></span><span style="--i:13;"></span><span style="--i:16;"></span><span style="--i:17;"></span><span style="--i:19;"></span>
            <span style="--i:20;"></span><span style="--i:23;"></span><span style="--i:26;"></span><span style="--i:10;"></span><span style="--i:15;"></span>
            <span style="--i:13;"></span><span style="--i:29;"></span><span style="--i:23;"></span><span style="--i:15;"></span><span style="--i:19;"></span>
            <span style="--i:11;"></span><span style="--i:13;"></span><span style="--i:16;"></span><span style="--i:17;"></span><span style="--i:19;"></span>
            <span style="--i:20;"></span><span style="--i:23;"></span><span style="--i:26;"></span><span style="--i:10;"></span><span style="--i:15;"></span>


    </div>

    <div class="container" id="RegisForm">
        <h2>Registration Form</h2>
        <form method="post" id="regform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="Userid">Userid:</label>
                <input type="text" class="form-control" id="Userid" name="Userid" value="<?php echo isset($_POST['Userid']) ? $_POST['Userid'] : ''; ?>">
                <?php if(isset($errors['user_id'])) { echo '<p class="text-danger">'.$errors['user_id'].'</p>'; } ?>
            </div>
            <div class="form-group">
                <label for="Userpw">Password:</label>
                <input type="password" class="form-control" id="Userpw" name="Userpw">
                <?php if (isset($errors['user_pw'])) {
                 echo '<p class="text-danger">' . $errors['user_pw'] . '</p>';
                } ?>
                        </div>
                        <div class="form-group">
                 <label for="ConfirmUserpw">Confirm Password:</label>
                <input type="password" class="form-control" id="Userpw1" name="Userpw1">
                <?php if (isset($errors['Userpw1'])) {
                 echo '<p class="text-danger">' . $errors['Userpw1'] . '</p>';
                 } ?>
            </div>
            <div class="form-group">
                <label for="Email">Email:</label>
                <input type="email" class="form-control" id="Email" name="Email" value="<?php echo isset($_POST['Email']) ? $_POST['Email'] : ''; ?>">
                <?php if(isset($errors['email'])) { echo '<p class="text-danger">'.$errors['email'].'</p>'; } ?>
            </div>
            <div class="form-group">
                <label for="PN">Phone Number:</label>
                <input type="text" class="form-control" id="PN" name="PN" value="<?php echo isset($_POST['PN']) ? $_POST['PN'] : ''; ?>">
                <?php if(isset($errors['phone_number'])) { echo '<p class="text-danger">'.$errors['phone_number'].'</p>'; } ?>
            </div>
      
            <div class="form-group">
                <label for="HouseAnswer">Which house do you prefer?</label>
                <!-- <div class="form-check"> -->
                <input class="form-check-input" type="radio" id="HouseAnswer1" name="HouseAnswer" value="H1" <?php if (isset($_POST['HouseAnswer']) && $_POST['HouseAnswer'] == 'H1') {
                echo 'checked';
                } ?>>
                <label class="form-check-label" for="HouseAnswer1">
                <img src="/img/2222-removebg-preview.png" alt="House 1" width="120">
                </label>
                
                <!-- <div class="form-check"> -->
                <input class="form-check-input" type="radio" id="HouseAnswer2" name="HouseAnswer" value="H2" <?php if (isset($_POST['HouseAnswer']) && $_POST['HouseAnswer'] == 'H2') {
                 echo 'checked';
                } ?>>
                <label class="form-check-label" for="HouseAnswer2">
                <img src="/img/house.png" alt="House 2" width="120">
                 </label>
                 
                 <?php if (isset($errors['house_photo'])) {
                 echo '<p class="text-danger">' . $errors['house_photo'] . '</p>';
                } ?>
                </div>
                <h3><a href="./Term.php">Term of Policy </a></h3><br>
                <button type="submit" Form="regform" >Submit</button>
                
        </form>

    </div> 
    

    

<!--             
         </div>
    </div>
</div> -->

    
</body>
</html>