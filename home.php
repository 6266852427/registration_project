<?php
session_start();
error_reporting(0);
$conn = mysqli_connect('localhost','root','','register');
if(!$conn){
    die("Error: cannot connect" . mysqli_connect_error());
}
$email = mysqli_real_escape_string($conn,$_POST['email-lg']);
$password = md5(mysqli_real_escape_string($conn,$_POST['password-lg']));
$sql = "SELECT * FROM user1 WHERE email_id='$email' && pass='$password'";
$data = mysqli_query($conn, $sql);
$value = mysqli_num_rows($data);
if($value==1){
    header('location:profile.php');
    $_SESSION['username'] = $email;
}else{
    echo '<center style="margin-top:20px;"><h3>User not found. <a href="index.html">Go Home</a></h3><center>';

}
?>