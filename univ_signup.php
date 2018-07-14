<?php
	$link = mysqli_connect('localhost', 'root' , '', 'jpmc');
	if(!$link){
die('error connection');
}
	$colgname = ''; 
if( isset( $_POST['colgname'])) {
    $colgname = $_POST['colgname']; 
} 
$address = ''; 
if( isset( $_POST['address'])) {
    $address = $_POST['address']; 
} 
$course = ''; 
if( isset( $_POST['course'])) {
    $course = $_POST['course']; 
} 
$contactname = ''; 
if( isset( $_POST['contactname'])) {
    $contactname = $_POST['contactname']; 
} 
$mobile = ''; 
if( isset( $_POST['mobile'])) {
    $mobile = $_POST['mobile']; 
} 
$email = ''; 
if( isset( $_POST['email'])) {
    $email = $_POST['email']; 
}
$eligible = ''; 
if( isset( $_POST['eligible'])) {
    $eligible = $_POST['eligible']; 
}
$password = ''; 
if( isset( $_POST['password'])) {
    $password = $_POST['password']; 
}

	$con="INSERT INTO `university_signup`(colgname,address,course,contactname,mobile,email,eligible,password) VALUES ('$colgname', '$address','$course','$contactname','$mobile', '$email' ,'$eligible','$password' )";
	
	$result = mysqli_query($link,$con);
	if ( false===$result ) {
  printf("error: %s\n", mysqli_error($link));
}
else {
	$_SESSION["colgname"] = "$colgname";
//	echo  "hi" .$_SESSION["email"]. "!";
	header("Location: disable.php");
  
}
	
	mysqli_close($link);
?>