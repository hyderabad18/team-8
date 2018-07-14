<?php  
session_start();  
?>  


<?php
$link = mysqli_connect('localhost', 'root' , '', 'jpmc');
if(!$link){
	die('error connection');
}
 $value1= $_SESSION["email"];
 $con="INSERT INTO `feedback`(email,avg_feedback) VALUES ('$value1', 'average')";
  $result = mysqli_query($link,$con);
    $_SESSION["email"] = "$email";
     header("Location: feedback_dashboard.php");

?>