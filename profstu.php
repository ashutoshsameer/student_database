<?php 
if($_SESSION['login_user']!='admin'){
 	header("location: welcome.php");
 }
 $servername = "localhost";
$username = "u525250491_user1";
$password = "ashu123";
$dbname = "u525250491_user";
 // $connect = mysqli_connect($servername, $username, $password, $dbname);  
 $id = $_POST["list_btn"];
 
 $output = '';
 $nameErr='';
 $counter=0;
$connect = mysqli_connect($servername, $username, $password, $dbname);
$ses_sql = mysqli_query($connect,"SELECT * FROM websiteusers2 WHERE userID = '$id'");
   
   $row1 = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $name1 = $row1['firstname'];
   $name2 = $row1['lastname'];
if (isset($_POST['stuname'])){
  
      function test_input($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
         return $data;
      }
      $id = $_POST["list_btn"];
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
    $sql12 = "INSERT INTO students(prof_ID, name, roll_no) VALUES('$id','$name', '$roll')";  
    mysqli_query($connect, $sql12);
    	
     
}
}  
 

 ?>
 <html>
   
   <head>
    <link rel="shortcut icon" href="user.png">

      <title>Welcome </title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="materialize.js"></script>
<script type="text/javascript" src="materialize.min.js"></script>
<link rel="stylesheet" type="text/css" href="style1.css">
<link rel="stylesheet" type="text/css" href="materialize.css">
<link rel="stylesheet" type="text/css" href="materialize.min.css">
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
   <h3 style="position:absolute;top:0;left:35%;"><span style="color:orange;">Professor</span> <span style="color:white;"><?php echo $name1." ".$name2;?></span></h3>
      <h4 id="logout"><a href = "admin.php">Back</a></h4>
       <!-- <?php echo $gender ?> -->
      
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
                <input type='hidden' name='list_btn' value='<?php echo $id;?>' />
               <!-- <span style="color:red;"><?php echo $error ?></span><br> -->
               <!-- <?php echo $id;?>
               <?php echo $counter;?> -->
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
                url:"profstuselect.php",  
                method:"POST",
                data:{id:<?php echo $id;?>},  
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