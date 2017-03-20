<?php
   include('session.php');
if(($_SESSION['login_user'])=='admin'){
     header("location: admin.php");
}
$servername = "localhost";
$username = "u525250491_user1";
$password = "ashu123";
$dbname = "u525250491_user";
$nameErr='';
$connect = mysqli_connect($servername, $username, $password, $dbname);
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  
      function test_input($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
         return $data;
      }
    $name=test_input($_POST['stuname']);
    $roll=test_input($_POST['rollno']);
$counter=0;
    if(empty($_POST['stuname'])){
    $nameErr="Name is required";
   } else{
    $name = test_input($_POST['stuname']);
    if(!preg_match("/^[a-zA-Z ]*$/",$name)){
      $nameErr="Only letters and white space allowed";
    }else{
      $counter++;
      $_POST['stuname']='';
    } 
   }
    if($counter==1){
    $sql = "INSERT INTO students(prof_ID, name, roll_no) VALUES('$profID','$name', '$roll')";  
    mysqli_query($connect, $sql);  
             
                
           
    }
}


?>
<html>
   
   <head>
    <link rel="shortcut icon" href="user.png">

      <title>Welcome </title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style1.css">
<link rel="stylesheet" type="text/css" href="css/materialize.css">
<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
           <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />   -->
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<style>   
.error{
  color:red;
} 
</style>
   </head>
   
   <body>
      <h3 id="name" style="color:orange;">Welcome Professor <?php
      
      echo "<span style='color:white;'> ".$login_session." ".$disp_lastname."</span>";
      
      ?></h3>
       <!-- <?php echo $gender ?> -->
      <h4 id="logout"><a href = "logout.php">Sign Out</a></h4>
      <div style="background-color:white;padding:10px;border-radius:5px;border:2px solid black;position:absolute;left:10%;top:15%;">
      
              <div class="row">
                  <div class="row">
                    <h3 style="font-family: 'Lobster', cursive;">Add a Student</h3>
                  </div>
            <form class="col s12" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div class="row">
                  <div class="input-field col s12" id="stuname" >
                    <input id="stuname" type="text" class="validate" name="stuname" value="<?php if(isset($_POST['stuname'])) {echo $_POST['stuname'];} ?>" required>
                    <span class="error"><?php echo $nameErr;?></span>
                    <label for="stuname">Student's Name</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12" id="rollno">
                    <input id="rollno" type="text"  name="rollno" required>
                    <label for="rollno">Roll Number</label>
                  </div>
                </div>
               <!-- <span style="color:red;"><?php echo $error ?></span><br> -->
               <div id='btn_add'>
                   <input style="color:white;background-color:#5FCF80;font-weight:bolder;padding:15px;font-family: 'Raleway', sans-serif;" type = "submit" value = "Add  &plus;"/><br><br><br>
               </div>
               

            </form>
            </div>
      </div>
  

    <div class="table1">
      <div class="container">  
                 
                <div class="table-responsive">  
                     <h3 align="center">List of Students</h3><br />  
                     <div id="live_data"></div>                 
                </div>  
           </div>
    </div>



   </body>
   
</html>
 <script>  
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      // $(document).on('click', '#btn_add', function(){
      //      // var uid=$profID;
             
      //      var stuname = $('#stuname').text();
      //      alert(stuname);  
      //      var rollno = $('#rollno').text();  
      //      if(stuname == '')  
      //      {  
      //           alert("Enter Name");  
      //           return false;  
      //      }  
      //      if(rollno == '')  
      //      {  
      //           alert("Enter Roll No.");  
      //           return false;  
      //      }  
      //      $.ajax({  
      //           url:"insert.php",  
      //           method:"POST",  
      //           data:{ stuname:stuname, rollno:rollno},  
      //           dataType:"text",  
      //           success:function(data)  
      //           {  
      //                alert(data);  
      //                fetch_data();  
      //           }  
      //      })  
      // });  
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.name', function(){  
           var id = $(this).data("id1");  
           var name = $(this).text();  
           edit_data(id, name, "name");  
      });  
      $(document).on('blur', '.rollno', function(){  
           var id = $(this).data("id2");  
           var rollno = $(this).text();  
           edit_data(id,rollno, "roll_no");  
      });  
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id3");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  
 });  
 </script>  