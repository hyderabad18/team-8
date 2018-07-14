<?php  
session_start();  
?>  


<?php
$link = mysqli_connect('localhost', 'root' , '', 'jpmc');
if(!$link){
	die('error connection');
}

$email='';
if( isset( $_POST['email'])) {
    $email = $_POST['email']; 
} 

$password = ''; 
if( isset( $_POST['password'])) {
    $password = $_POST['password']; 
} 

$query = "select * from `individual_signup` where email='$email' and password='$password' ";

$result = mysqli_query($link,$query);

if (mysqli_num_rows($result) > 0) {
 // echo "entered";
	$_SESSION["email"] = "$email";
//	echo "$email";
//	echo  "hi" .$_SESSION["email"]. "!";
	header("Location: dashboard_individual.php");
}
else
{
	header("Location: login.html");
}

?>