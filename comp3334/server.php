<?php
session_start();
$connection = new mysqli('localhost','admin','admin','userinfo');
if (isset($_POST['login_btn'])){
  $userid = mysqli_real_escape_string($connection, $_POST['userid']);
  $password = mysqli_real_escape_string($connection, $_POST['password']);
  $password = hash('sha256', $password);

  $sql = "SELECT * FROM registration WHERE userid='$userid' AND password ='$password' limit 1";
  $result = $connection -> query($sql);
  $row = $result -> fetch_assoc();
  $roundnumber = rand(1, 8);
  $token = md5(uniqid(rand(), true));
  

 if($result->num_rows == 1){
  setcookie("userid", $userid, time() + (86400 * 30), "/");
  $code = $password . $token;    //'a123' + '12345' 
  for($i = 0; $i < $roundnumber ; $i++){
  $code = hash('sha256', $code);
  }

  setcookie("checkcode", $code, time() + (86400 * 30), "/");
  
  $query = "UPDATE registration SET anti_csrf ='$token' where userid = '$userid'";
  $connection -> query($query);
  $query = "UPDATE registration SET round ='$roundnumber' where userid = '$userid'";
  $connection -> query($query);
  header('location: Home.php');
} 

}
?>

