<?php
$connection = new mysqli('localhost','admin','admin','userinfo');
$userid = $_COOKIE['userid'];
$token = $_SESSION['token'];    
$roundnumber = $_SESSION['roundnumber'];
$sql = "SELECT `password`, `round`, `anti_csrf` FROM registration WHERE userid= '$userid' limit 1";
$result = $connection -> query($sql);
$row = $result -> fetch_assoc();
$token = $row['anti_csrf'];
$roundnumber = $row['round'];
$password = $row['password'];
$code2 = $password . $token;
for($i = 0; $i < $roundnumber; $i++){
      $code2 = hash('sha256', $code2);
}
$code1 = $_COOKIE['checkcode'];
if($code2 != $code1){
   setcookie("userid", "", time() + (86400 * 30), "/");
   setcookie("checkcode", "", time() + (86400 * 30), "/");
   header('location: Login.php');
}

?>
