<?php   
    include('connect.php');
    session_start();
    $id=$_POST['Pid'];
    $p=$_POST['Price'];
    $query="UPDATE `package` SET `Price` = '$p' WHERE `Pid` = '$id'";
    $result1=mysqli_query($con,$query);
    if(!$result1){
        echo '<script type="text/javascript"> '; 
        echo '  if (confirm("Addition Unsuccessfull 1")) {';  
        echo '    document.location = "addpack.php";';  
        echo '  }';  
        echo'</script>';
    }
    else{
        header("location:viewpack.php");
    }
?>
