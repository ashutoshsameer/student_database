<?php
include('session.php');
if($_SESSION['login_user']!='admin'){
 	header("location: welcome.php");
 }
$servername = "localhost";
$username = "u525250491_user1";
$password = "ashu123";
$dbname = "u525250491_user";
 $connect = mysqli_connect($servername, $username, $password, $dbname); 
 $output = '';  
 $sql = "SELECT * FROM websiteusers2 ORDER BY userID ASC"; 
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div id="live_data">  
           <table class="table">  
                <tr>  
                     <th width="10%">S. No.</th>  
                     <th width="50%">Professor Name</th>  
                       
                     <th width="20%">See the list</th>  
                </tr>';
$count=1; 
 if(mysqli_num_rows($result) >= 0)  
 {  
      while($row = mysqli_fetch_array($result) )  
      {
        
         if($row["userName"]!='admin'){
        
           $output .= '  
                <tr>  
                     <td>'.$count.'</td>  
                     <td class="name" data-id1="'.$row["userID"].'" >'.$row["firstname"]." ".$row["lastname"].'</td>  
                      
                     <td><form action="profstu.php" method="post"><button type="submit" name="list_btn" data-id3="'.$row["userID"].'" value="'.$row["userID"].'" class="btn btn-xs  btn_delete">&rarr;</button></form></td>  
                </tr>  
           ';
           $count++;
           }

      }   
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>'; 
 
?>
<html>
<head>
<title>Admin Page</title>
<link rel="shortcut icon" href="user.png">
 <script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="materialize.js"></script>
<script type="text/javascript" src="materialize.min.js"></script>
<link rel="stylesheet" type="text/css" href="style1.css">
<link rel="stylesheet" type="text/css" href="materialize.css">
<link rel="stylesheet" type="text/css" href="materialize.min.css">
</head>
<body>
<h4 id="logout"><a href = "logout.php">Sign Out</a></h4>
<div class="table2">
      <div class="container">  
                 
                <div class="table-responsive">  
                     <h3 align="center">List of Professors</h3><br />  
                     <div id="live_data"><?php echo $output;?></div>                 
                </div>  
           </div>
    </div>

</body>
</html>
