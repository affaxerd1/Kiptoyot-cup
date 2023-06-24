<?php
    include_once 'db_connect.php';
    if(isset($_POST['cancel']))
    {

        
      $id=$_POST['id'];
      $sql ="DELETE FROM players WHERE id='$id'";
      
      $query=mysqli_query($conn, $sql);  


      
      if($query)
      {
       
        header("location:add_team_members.php?deleted");
      }
    }

   
  ?>