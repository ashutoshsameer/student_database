<?php
   
$servername = "localhost";
$username = "u525250491_user1";
$password = "ashu123";
$dbname = "u525250491_user";

// function test_input($data){
// 	$data=trim($data);
// 	$data=stripslashes($data);
// 	$data=htmlspecialchars($data);
//     return $data;
// }


$conn = mysqli_connect($servername, $username, $password, $dbname);
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"SELECT * FROM websiteusers2 WHERE userName = '$user_check'");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['firstname'];
   $disp_lastname= $row['lastname'];
   $disp_email= $row['email'];
   $gender=$row['gender'];
   $profID=$row['userID'];
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
   }
?>