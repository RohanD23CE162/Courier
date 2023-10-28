<?php
session_start();
include "connect.php";
$xy=$_SESSION['$userid'];
$query="update `package` set Status='$_POST[Status]' where Pid='$xy'";
    $result1=mysqli_query($con,$query);
    if(!$result1){
            echo '<script type="text/javascript"> '; 
            echo '  if (confirm("Update Unsuccessfull")) {';  
            echo '    document.location = "viewsender.php";';  
            echo '  }';  
            echo'</script>';
        }
        else{
          header("location:viewpack.php");
        }
       ?>