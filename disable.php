<?php  
session_start();  
?>  


<?php
$link = mysqli_connect('localhost', 'root' , '', 'jpmc');
if(!$link){
	die('error connection');
}

$value1= $_SESSION["colgname"] ;

$stuname='';
if( isset( $_POST['stuname'])) {
    $stuname = $_POST['stuname']; 
} 

$email='';
if( isset( $_POST['email'])) {
    $email = $_POST['email']; 
} 

$mobile = ''; 
if( isset( $_POST['mobile'])) {
    $password = $_POST['mobile']; 
} 
$con="INSERT INTO `disable_student`(colgname,stuname,email,mobile) VALUES ('$colgname', '$stuname','$email', '$mobile' )";

$result = mysqli_query($link,$con);
	if ( false===$result ) {
  printf("error: %s\n", mysqli_error($link));
}

	mysqli_close($link);

?>