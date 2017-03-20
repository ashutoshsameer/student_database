<!DOCTYPE HTML>
<html> 
<head> 
 <link rel="shortcut icon" href="favicon.png">

<style type="text/css">
	.error{
		color:#FF0000;
	}
</style>
<title>Sign-Up</title> 

<script type="text/javascript" src="jquery.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->

<!-- <script type="text/javascript" src="jquery.js"></script> -->
<!-- <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script> -->
<!--   <script>
  	$(document).ready(function(){
  		
  		$('#Sign-Up').hide();
  		$('#sign').click(function(){
  			$('#Sign-Up').show();
  		});
  	});
  </script> -->
  <!-- <script>
  	$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year
    format: 'dd-mm-yyyy' });
  </script> -->
  <script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="materialize.js"></script>
<script type="text/javascript" src="materialize.min.js"></script>
<link rel="stylesheet" type="text/css" href="style1.css">
<link rel="stylesheet" type="text/css" href="materialize.css">
<link rel="stylesheet" type="text/css" href="materialize.min.css">
<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>           
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>  -->
</head> 
<body id="body-color"> 
 


<?php

session_start();
if(isset($_SESSION['login_user'])) {
    if($_SESSION['login_user']=='admin'){
      header("location: admin.php");
    }else{
     header("location: welcome.php");
    }
}
$error4=$nameErr =$nameErr1= $emailErr = $genderErr = "";
$firstname = $lastname=$email = $gender = "";

$servername = "localhost";
$username = "u525250491_user1";
$password = "ashu123";
$dbname = "u525250491_user";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


function newUser() 
{ 

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

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
   
   
    $firstname = test_input($_POST['firstname']);
	$lastname = test_input($_POST['lastname']);
	$dob=test_input($_POST['dob']);
	$gender=test_input($_POST['gender']); 
	$userName = test_input($_POST['user']); 
	$email = test_input($_POST['email']); 
	$password = $_POST['pass']; 
                      //   $target_dir = "uploads/";
                      // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                      // $uploadOk = 1;
                      // $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                      // // Check if image file is a actual image or fake image
                      // if(isset($_POST["submit"])) {
                      //     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                      //     if($check !== false) {
                      //         echo "File is an image - " . $check["mime"] . ".";
                      //         $uploadOk = 1;
                      //     } else {
                      //         echo "File is not an image.";
                      //         $uploadOk = 0;
                      //     }
                      // }
                      // // Check if file already exists
                      // if (file_exists($target_file)) {
                      //     echo "Sorry, file already exists.";
                      //     $uploadOk = 0;
                      // }
                      // // Check file size
                      // if ($_FILES["fileToUpload"]["size"] > 500000) {
                      //     echo "Sorry, your file is too large.";
                      //     $uploadOk = 0;
                      // }
                      // // Allow certain file formats
                      // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                      // && $imageFileType != "gif" ) {
                      //     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                      //     $uploadOk = 0;
                      // }
                      // // Check if $uploadOk is set to 0 by an error
                      // if ($uploadOk == 0) {
                      //     echo "Sorry, your file was not uploaded.";
                      // // if everything is ok, try to upload file
                      // } else {
                      //     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                      //         echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                      //     } else {
                      //         echo "Sorry, there was an error uploading your file.";
                      //     }
                      // }
	$query = "INSERT INTO websiteusers2 (firstname,lastname,dateofbirth,gender,userName,email,pass) VALUES ('$firstname','$lastname','$dob','$gender','$userName','$email','$password')"; 
	$data = mysqli_query ($conn,$query)or die(mysqli_error($conn)); 
	if($data) { 
		echo "<p style='color:white;'>YOUR REGISTRATION IS COMPLETED...</p><p style='color:white;'>Click <a onclick='window.location=\"index.php\"'>here</a> to go back to Login.</p>"; 
		$_POST['firstname']=$_POST['lastname']=$_POST['email']=$_POST['dob']=$_POST['user']='';
		echo "<script>
		$(document).ready(function(){
	      $('.box2').hide();
	  });
        </script>";
	} 

}


function SignUp() 
{
$servername = "localhost";
$username = "u525250491_user1";
$password = "ashu123";
$dbname = "u525250491_user";
$conn = mysqli_connect($servername, $username, $password, $dbname);
 
if(!empty($_POST['user'])) //checking the 'user' name which is from Sign-Up.html, is it empty or have some text 
{ 
	$query = mysqli_query($conn,"SELECT * FROM websiteusers2 WHERE userName = '$_POST[user]'") or die(mysqli_error($conn)); 
	if(!$row = mysqli_fetch_array($query)) { 
		newUser(); 
	} else { 
		echo "<p style='color:white;'>SORRY...YOU ARE ALREADY REGISTERED USER...</p><br><p style='color:white;'>Click <a onclick='window.location=\"index.php\"'>here</a> to go back to Login.</p>";
		$_POST['firstname']=$_POST['lastname']=$_POST['email']=$_POST['dob']=$_POST['user']=''; 
		echo "<script>
		$(document).ready(function(){
	      $('.box2').hide();
	  });
        </script>";
        
} 
}

}


if ($_SERVER["REQUEST_METHOD"] == "POST")
	
{
	
	if($_POST['pass']==$_POST['cpass'])
{
	$counter=0;
	function test_input($data){
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
    return $data;
}
	if(empty($_POST['firstname'])){
   	$nameErr="First Name is required";
   } else{
   	$firstname = test_input($_POST['firstname']);
   	if(!preg_match("/^[a-zA-Z ]*$/",$firstname)){
   		$nameErr="Only letters and white space allowed";
   	}else{
   		$counter++;
   	} 
   }
   if(empty($_POST['lastname'])){
   	$nameErr1="Last Name is required";
   } else{
   	$lastname = test_input($_POST['lastname']);
   	if(!preg_match("/^[a-zA-Z ]*$/",$lastname)){
   		$nameErr1="Only letters and white space allowed";
   	}else{
   		$counter++;
   	} 
   }
   if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
    else{
   		$counter++;
   	} 
  }
  if($counter==3)
	{SignUp();}
}else{
	$error4="Passwords do not match";
}
}

// $sql="SELECT userName FROM websiteusers2";
// $result=mysqli_query($conn,$sql);
// // $row=mysqli_fetch_assoc($result);
// // echo "username: ".$row["userName"]." <br>";
// if (mysqli_num_rows($result) > 0) {
//     // output data of each row
//     while($row = mysqli_fetch_assoc($result)) {
//         echo "id: " . $row["userName"]."<br>";
//     }
// }



// sql to create table
$sql = "CREATE TABLE websiteusers2 
( 
	userID int(9) NOT NULL auto_increment, 
	firstname VARCHAR(50) NOT NULL,
	lastname VARCHAR(50) NOT NULL,
	dateofbirth VARCHAR(12) NOT NULL,
	gender VARCHAR(6) NOT NULL CHECK (gender IN ('Male', 'Female')),
	userName VARCHAR(40) NOT NULL, 
	email VARCHAR(40) NOT NULL, 
	pass VARCHAR(40) NOT NULL,

	PRIMARY KEY(userID)

)";

// if (mysqli_query($conn, $sql)) {
//     echo "Table MyGuests created successfully";
// } else {
//     echo "Error creating table: " . mysqli_error($conn);
// }

// mysqli_close($conn);

   

?>

<!-- <div id="Sign-Up"> 
<fieldset style="width:30%">
<legend>Registration Form</legend> 
<table border="0"> 
<tr> 
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<td>First Name:<span class="error">*</span></td>
<td> <input type="text" name="firstname" value="<?php if(isset($_POST['firstname'])) {echo $_POST['firstname'];} ?>"><span class="error"><?php echo $nameErr;?></span></td> 
</tr>
<tr> 
<td>Last Name:<span class="error">*</span></td>
<td> <input type="text" name="lastname" value="<?php if(isset($_POST['lastname'])) {echo $_POST['lastname'];} ?>"><span class="error"><?php echo $nameErr1;?></span></td> 
</tr>
<tr> 
<td>Date of Birth:<span class="error">*</span></td>
<td> <input type="date" name="dob" required value="<?php if(isset($_POST['dob'])) {echo $_POST['dob'];} ?>"></td> 
</tr> 
<tr> 
<td>Gender:<span class="error">*</span></td>
<td><input type="radio" name="gender" value="male" required> Male
<input type="radio" name="gender" value="female"> Female 
</td>
</tr>
<tr> 
<td>Email:<span class="error">*</span></td>
<td> <input type="text" name="email" value="<?php if(isset($_POST['email'])) {echo $_POST['email'];} ?>"><span class="error"><?php echo $emailErr;?></span></td> 
</tr> 
<tr> 
<td>User Name:<span class="error">*</span></td>
<td> <input type="text" name="user" required value="<?php if(isset($_POST['user'])) {echo $_POST['user'];} ?>"></td> 
</tr> 
<tr> 
<td>Password:<span class="error">*</span></td>
<td> <input type="password" name="pass" required></td> 
</tr> 
<tr> 
<td>Confirm Password:<span class="error">*</span> </td>
<td><input type="password" name="cpass" required></td>
 </tr>
 <span style="color:red;"><?php echo $error4; ?></span>
 <tr> 
 <td><input id="button" type="submit" name="submit" value="Sign-Up"></td> 
 </tr> 
 </form> 
 </table> 
 </fieldset> 
 </div> -->
<div class="box2">
<div id="Sign-Up">
<div class="row">
	<h4 style="transform:rotate(3deg);font-family: 'Oswald', sans-serif;">  &nbsp;&nbsp;&nbsp;&nbsp;   Sign Up Form</h4>
</div>
 <div class="row">
    <form class="col s12" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
      <div class="row" style="transform:rotate(3deg);">
        <div class="input-field col s6">
          <input id="first_name" type="text" class="validate" name="firstname" value="<?php if(isset($_POST['firstname'])) {echo $_POST['firstname'];} ?>" required>
          <span class="error"><?php echo $nameErr;?></span>
          <label for="first_name" >First Name*</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate" name="lastname" value="<?php if(isset($_POST['lastname'])) {echo $_POST['lastname'];} ?>" required>
          <span class="error"><?php echo $nameErr1;?></span>
          <label for="last_name">Last Name*</label>
        </div>
      </div>
      <div class="row" style="transform:rotate(3deg);">
        <div class="input-field col s6">
          <input id="user_name" type="text" name="user" value="<?php if(isset($_POST['user'])) {echo $_POST['user'];} ?>" required>
          <label for="user_name" >User Name*</label>
        </div>
        <div class=" col s6">
          <label >Birthday*</label>
          <input type="date" class="datepicker" name="dob" value="<?php if(isset($_POST['dob'])) {echo $_POST['dob'];} ?>" required>
        </div>
      </div>
      <div class="row" style="transform:rotate(3deg);">
      <div class=" col s6">
      <label>Gender*</label>
      <p>
      <input class="with-gap" name="gender" type="radio" id="male" value="male" checked>
      <label for="male">Male</label>
      
      <input class="with-gap" name="gender" type="radio" id="female" value="female">
      <label for="female">Female</label>
      </p>
      </div>
      <div class="input-field col s6" >
          <input id="email" type="email" class="validate" name="email" value="<?php if(isset($_POST['email'])) {echo $_POST['email'];} ?>" required>
          <span class="error"><?php echo $emailErr;?></span>
          <label for="email">Email*</label>
        </div>
      </div>  
      <div class="row" style="transform:rotate(3deg);">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate" name="pass" required>
          <label for="password">Password*</label>
        </div>
      </div>
      <div class="row" style="transform:rotate(3deg);">
        <div class="input-field col s12">
          <input id="cpass1" type="password" class="validate" name="cpass" required>
          <label for="cpass1">Re-Enter Password*</label>
        </div>
      </div>
  <!-- <form action="upload.php" method="post" enctype="multipart/form-data"> -->
    <!-- <div class="file-field input-field" style="transform:rotate(3deg);">
      <div class="btn">
        <span>File</span>
        <input type="file" name="fileToUpload" id="fileToUpload">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div> -->
      <!-- <input type="submit" value="Upload Image" name="submit"> -->
  <!-- </form> -->
      <span style="color:red;transform:rotate(3deg);"><?php echo $error4; ?></span><br>
      <input style="transform:rotate(3deg);background-color:#26A69A;padding:10px;color:white;" id="button" type="submit" name="submit" value="Create My Account"><br><br>
      <div style="transform:rotate(3deg);">Or Go back to <a  onclick="window.location='index.php'">Login</a></div>
    </form>
  </div>
 </div>
 </div>
 </body> 
 </html>

