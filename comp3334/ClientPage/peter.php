<?php
    include '../Config.php';
    include 'auth.php';
    $sql = "SELECT * FROM blogdata";
    $BlogData= $connection->query($sql);


    $Title = Securecheck($_POST['title']);
    $Q     = Securecheck($_POST['ques']);
    $userid = $_COOKIE['userid'];
    $Path = htmlspecialchars($_SERVER["PHP_SELF"]);
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
        $stmt = $connection->prepare("insert into blogdata(userid,title,ques,path) values (?,?,?,?)");
        $stmt->bind_param("ssss",$userid,$Title,$Q,$Path);
        $stmt->execute();

        $removeQ = trim($Title, "?");
        $FC2 = file_get_contents("../Question/Webcon.txt");
        $MF2 = fopen("../Question/" . $removeQ . ".php","w");
        fwrite($MF2, $FC2);

        fclose($myfile);

        $stmt->close();
        header('Location: ' . $Path);
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
    <link rel="stylesheet" href="../css/group.css">
    <title>COMP3334 GP21</title>

    <style>
        body,html{
            height:100%;
        }

        #TopBg{
            height: 50%;
            margin: 0;
            background-image: url('../img/BlogBG1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;

        }

        input{
            margin-top: 20px;
            text-align: center;
        }
    </style>



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
            <a class="nav-link" href="./forum.html">Forum</a>
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
        <div id="TopBg">
        <div class="col-md-12 text-center" id="TextColorBox">
        <h4 class="animate-charcter">Welcome</h3>
        </div>
  
  
        <div id="BI">
        <div id="TopBox">
            <div class="Type"><h5>Userid:</h5></div>
            <div class="Data"><p>peter</p></div>
        </div>
          
        <div id="SecondBox">
            <div class="Type"><h5>Email:</h5></div>
            <div class="Data"><p>peter@gmail.com</p></div>
        </div>
  
        <div id="ThirdBox">
            <div class="Type"><h5>RegisterDate:</h5></div>
            <div class="Data"><p>2023-04-18</div>
        </div>
        </div>
        </div>
        <div id="Blog-design">
        <div class="waviy">
            <span style="--i:1">B</span>
            <span style="--i:2">l</span>
            <span style="--i:3">o</span>
            <span style="--i:4">g</span>
            <span style="--i:5">B</span>
            <span style="--i:6">e</span>
            <span style="--i:7">l</span>
            <span style="--i:8">o</span>
            <span style="--i:9">w</span>
        </div>
    </div>



    <div id="Blog">
    <div id="BF">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="text-align:center">
           
            <input type="text" name="title" id="Title" class="form-control" placeholder="Title"/>
            <br>
            <label for="ques"> Question :</label>
            <textarea id="Ques" name="ques" rows="4" cols="50" class="form-control" > </textarea>
            <br>

            <input type="submit" value="Raise Question"/>
            <input type="reset" value="Reset"/>
        </form>
    </div>
        
    <hr>


        <div class="row">


        <?php
         include 'auth.php';
         while ($row = $BlogData -> fetch_assoc()){
            if (htmlspecialchars($_SERVER["PHP_SELF"]) == $row['path']){
                $NewPath = trim($row['title'], "?");
                echo '
                <div class="col-sm-6">
                    <div class="card text-white bg-dark mt-3">
                        <div class="card-body">
                            <h5 class="card-title ">'. $row['userid'] .'</h5>
                            <h5 class="card-title">'. $row['title'] .'</h5>
                            <p class="card-text">'. $row['ques'] .'</p>
                            <a href="../Question/'. $NewPath  .'.php" class="btn btn-light">Read More </a>
                        </div>
                    </div>
                </div>
            
                ';
            }
         }
        ?>
    
        </div>
</body>

</html>
