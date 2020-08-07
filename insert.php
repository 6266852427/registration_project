<?php

$conn = mysqli_connect('localhost','root','','register');
if(!$conn){
	die("Error: cannot connect" . mysqli_connect_error());
}

$first_name = mysqli_real_escape_string($conn,$_POST['first_name']);
$last_name = mysqli_real_escape_string($conn,$_POST['last_name']);
$email_id = mysqli_real_escape_string($conn,$_POST['email_id']);
$pass = md5(mysqli_real_escape_string($conn, $_POST['pass']));
$file = $_FILES['file'];

$query1 = "SELECT email_id FROM user1 WHERE email_id='$email_id'";
$fire1 = mysqli_query($conn, $query1);
if(mysqli_num_rows($fire1) > 0){
	echo "<center><b>Username is not available. Try Another !!</b><center>";
} 

$filename = $file['name'];
$fileerror = $file['error'];
$filetmp = $file['tmp_name'];

$fileext = explode('.',$filename);
$filecheck = strtolower(end($fileext));
$fileextstored = array('png','jpg','jpeg','gif');

if(in_array($filecheck, $fileextstored)){
	$destinationfile = 'upload/'.$filename;
	move_uploaded_file($filetmp, $destinationfile);
}

$sql = "INSERT INTO user1(first_name, last_name, email_id, pass,pics) VALUES('$first_name', '$last_name','$email_id','$pass','$destinationfile')";

$query = mysqli_query($conn, $sql);

?>
<center style="margin-top:50px;"><p>Registraction successfully&nbsp;&nbsp;<a class="btn btn-primary" href="index.html">Go Home</a></p></center>