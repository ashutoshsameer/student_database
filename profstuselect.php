<?php

$servername = "localhost";
$username = "u525250491_user1";
$password = "ashu123";
$dbname = "u525250491_user";
 $connect = mysqli_connect($servername, $username, $password, $dbname); 
 $id = $_POST["id"]; 
$output = '';
$sql = "SELECT * FROM students ORDER BY userID ASC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">S. No.</th>  
                     <th width="30%">Name</th>  
                     <th width="30%">Roll No.</th>  
                     <th width="10%">Delete</th>  
                </tr>';
                // $row = mysqli_fetch_array($result);
                // echo $profID.'<br>'; 
$count=1; 
 if(mysqli_num_rows($result) >= 0)  
 {  
      while($row = mysqli_fetch_array($result) )  
      {
        if($row['prof_ID']==$id){
         
        
           $output .= '  
                <tr>  
                     <td>'.$count.'</td>  
                     <td class="name" data-id1="'.$row["userID"].'" contenteditable>'.$row["name"].'</td>  
                     <td class="rollno" data-id2="'.$row["userID"].'" contenteditable>'.$row["roll_no"].'</td>  
                     <td><button type="button" name="delete_btn" data-id3="'.$row["userID"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';
           $count++;
           }

      }  
      // $output .= '  
      //      <tr>  
      //           <td></td>  
      //           <td id="stuname" contenteditable></td>  
      //           <td id="rollno" contenteditable></td>  
      //           <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
      //      </tr>  
      // ';  
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
echo $output; 


?>