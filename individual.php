<?php  
session_start();  
?>  


<?php
	$link = mysqli_connect('localhost', 'root' , '', 'jpmc');
	if(!$link){
die('error connection');
}
	$name = ''; 
if( isset( $_POST['name'])) {
    $name = $_POST['name']; 
} 
$email = ''; 
if( isset( $_POST['email'])) {
    $email = $_POST['email']; 
} 
$gender = ''; 
if( isset( $_POST['gender'])) {
    $gender = $_POST['gender']; 
} 
$age = ''; 
if( isset( $_POST['age'])) {
    $age = $_POST['age']; 
} 
$colgname = ''; 
if( isset( $_POST['colgname'])) {
    $colgname = $_POST['colgname']; 
} 
$disability = ''; 
if( isset( $_POST['disability'])) {
    $disability = $_POST['disability']; 
}
$mobile = ''; 
if( isset( $_POST['mobile'])) {
    $mobile = $_POST['mobile']; 
}
$password = ''; 
if( isset( $_POST['password'])) {
    $password = $_POST['password']; 
}

$query = "select * from `university_signup` where colgname='$colgname' ";
$result = mysqli_query($link,$query);
if (mysqli_num_rows($result) > 0) {
	header("Location: registration.html");
}
else{
	$con="INSERT INTO `individual_signup`(name,email,gender,age,colgname,disability,mobile,password) VALUES ('$name', '$email','$gender','$age','$colgname', '$disability' ,'$mobile','$password' )";
    $result = mysqli_query($link,$con);
    $_SESSION["email"] = "$email";

    header("Location: registration.html");
}
	mysqli_close($link);
?>