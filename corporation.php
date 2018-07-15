<?php  
session_start();  
?>  
<?php
	$link = mysqli_connect('localhost', 'root' , '', 'jpmc');
	if(!$link){
die('error connection');
}
	$corpname = ''; 
if( isset( $_POST['corpname'])) {
    $corpname = $_POST['corpname']; 
} 
$address = ''; 
if( isset( $_POST['address'])) {
    $address = $_POST['address']; 
} 
$sector = ''; 
if( isset( $_POST['sector'])) {
    $sector = $_POST['sector']; 
} 
$preferences = ''; 
if( isset( $_POST['preferences'])) {
    $preferences = $_POST['preferences']; 
} 
$vacancy = ''; 
if( isset( $_POST['vacancy'])) {
    $vacancy = $_POST['vacancy']; 
} 
$degree = ''; 
if( isset( $_POST['degree'])) {
    $degree = $_POST['degree']; 
}
$role = ''; 
if( isset( $_POST['role'])) {
    $role = $_POST['role']; 
}
$accessibility = ''; 
if( isset( $_POST['accessibility'])) {
    $accessibility = $_POST['accessibility']; 
}

	$con="INSERT INTO `corporation_signup`(corpname,address,sector,preferences,vacancy,degree,role,accessibility) VALUES ('$corpname', '$address','$sector','$preferences','$vacancy', '$degree' ,'$role','$accessibility' )";
	
	$result = mysqli_query($link,$con);
	if ( false===$result ) {
  printf("error: %s\n", mysqli_error($link));
}
else {
	$_SESSION["corpname"] = "$corpname";

	header("Location: Corporate_signup.html");
  
}
	
	mysqli_close($link);
?>