<?php
    include '../Config.php';
    include 'auth.php';
    $sql = "SELECT * FROM blogdata";
    $BlogData= $connection->query($sql);

    $sql2 = "SELECT * FROM commentdata";
    $CommData= $connection->query($sql2);

    $Comment = Securecheck($_POST['Com']);
    $path = htmlspecialchars($_SERVER["PHP_SELF"]);
    $userid = $_COOKIE['userid'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $stmt = $connection->prepare("insert into commentdata(userid,comment,path) values (?,?,?)");
        $stmt->bind_param("sss",$userid,$Comment,$path);
        $stmt->execute();
        $stmt->close();
        header('Location: ' . $path);
    }

  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/question.css">
    <title>COMP3334 GP21</title>

    


</head>

<body>
<nav class="navbar navbar-light navbar-expand-lg bg-secondary">
    <div class="container">
    <a class="navbar-brand" href="../Home.php">
        Logo <!--img-->
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" href="../Home.php" style="color: white;">Home</a>
        </li>
     
        <li class="nav-item">
            <a class="nav-link" href="../aboutus.html">About us</a>
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
                    <a class="nav-link" href="../Login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Register.php">Try Free Trial</a>
                </li>
                ';
            }    else {
                echo '
                <li class="nav-item">
                    <a class="nav-link" href="../ClientPage/'.$_COOKIE['userid'].'.php">'. $_COOKIE['userid'] .'</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Logout.php">Logout</a>
                </li>
                
            ';}
            
                ?>
            </ul>     
        </div>
    </div>

    </nav>
    </div>
    </nav>   

    <div id="TopBg"></div>
    

    <?php
         while ($row = $BlogData -> fetch_assoc()){
            $NewPath = trim($row['Title'], "?");
            if (htmlspecialchars($_SERVER["PHP_SELF"]) == "/Question/" . $NewPath . ".php")
            {
                echo '
                <div id="QandA">
                    <div id="QT"><h1>Title:' . $row['Title'] .'</h1></div>
                
                </div>
        
                <div>
                    <div class="Ans">'. $row['Ques'].'</div>
                </div>

                ';
            }
         }
    
    ?>
    



    <div id="Commentform">
         <div style="text-align:center; margin-top:30px;"> <h3>Comment</h3></div>
         <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="text-align:center">
            <textarea id="Com" name="Com" rows="4" cols="50" class="form-control" > </textarea>
            <br>
            <input type="submit" value="Post" />
            <input type="reset" value="Clear all" />
         </form>
    </div>


    <div class="Comment">
    <?php
         while ($row2 = $CommData -> fetch_assoc()){
            if (htmlspecialchars($_SERVER["PHP_SELF"]) == $row2['path'])
            {
                echo '
                <div class="Userbox">
                    <div class="C1">'. $row2['userid'] .'</div>
                    <div class="C2">'. $row2['comment'] .'</div>
                </div>
                '
            ;
            }
         }
    
    ?>

    </div>


</body>

</html>