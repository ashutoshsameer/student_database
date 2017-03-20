<?php
// include('session.php');
$servername = "localhost";
$username = "u525250491_user1";
$password = "ashu123";
$dbname = "u525250491_user";


$conn = mysqli_connect($servername, $username, $password, $dbname);
$error='';
session_start();
if(isset($_SESSION['login_user'])) {
    if($_SESSION['login_user']=='admin'){
      header("location: admin.php");
    }else{
     header("location: welcome.php");
    }
}


if($_SERVER["REQUEST_METHOD"]=="POST"){
	$myusername=mysqli_real_escape_string($conn,$_POST['username']);
	$mypassword=mysqli_real_escape_string($conn,$_POST['password']);
	$sql="SELECT userID FROM websiteusers2 WHERE userName='$myusername' and pass='$mypassword'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$active=$row['active'];

	$count=mysqli_num_rows($result);
    $error='';
	if($count==1 && $myusername!='admin'){
		//session_register("myusername");
		$_SESSION['login_user']=$myusername;
		header("location: welcome.php");
	}else if($myusername=='admin'){
    $_SESSION['login_user']=$myusername;
    header("location: admin.php");
  } 
  else{
		$error= "Your Login Name or Password is invalid";
	}
}




?>
<html>
<head>
<title>Log In</title>
 <link rel="shortcut icon" href="favicon.png">

<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style1.css">
<link rel="stylesheet" type="text/css" href="css/materialize.css">
<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
</head>
<body >
<!-- <div id="log-in">
	<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
                  <label>User Name  :</label><br><input type = "text" name = "username" /><br /><br />
                  <label>Password  :</label><br><input type = "password" name = "password" /><br/><br />
                  <span style="color:red"><?php echo $error ?></span><br>
                  <input type = "submit" value = "Sign In"/>
                  
    </form>



    
</div>
<input type="button" value="Create an Account" onclick="window.location='sign_up.php'"> -->

<div class="box2">
<div class="row">
<div class="row">
	<h3 style="transform:rotate(3deg);font-family: 'Lobster', cursive;">     Log In Form</h3>
</div>
    <form class="col s12" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
      <div class="row">
        <div class="input-field col s12" style="transform:rotate(3deg)">
          <input id="first_name" type="text" class="validate" name="username" required>
          <label for="first_name">User Name</label>
        </div>
        
      </div>
      
      <div class="row">
        <div class="input-field col s12" style="transform:rotate(3deg)">
          <input id="password1" type="password"  name="password" required>
          <label for="password1">Password</label>
        </div>
      </div>
     <span style="color:red;transform:rotate(3deg);"><?php echo $error ?></span><br>
     <input style="color:white;background-color:#5FCF80;font-weight:bolder;transform:rotate(3deg);padding:15px;font-family: 'Raleway', sans-serif;" type = "submit" value = "Sign In  &#9658;"/><br><br><br>
     <div style="transform:rotate(3deg);font-family: 'Raleway', sans-serif;"><a onclick="window.location='sign_up.php'">Create an Account</a>
      </div></div>

    </form>

  </div>
  </div>
  </body>
</html>