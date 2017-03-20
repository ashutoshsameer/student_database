<?php  
$servername = "localhost";
$username = "u525250491_user1";
$password = "ashu123";
$dbname = "u525250491_user";
 $connect = mysqli_connect($servername, $username, $password, $dbname); 
 $sql = "DELETE FROM students WHERE userID = '".$_POST['id']."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Deleted';  
 }  
 ?>  