<?php 
include('connect.php');
$id=$_GET['id'];
$query="DELETE FROM sender WHERE sid = '$id'";
$stat = mysqli_query($con,$query);
if(!$stat){
    echo '<script type="text/javascript"> '; 
    echo '  if (confirm("Deleted Unsuccessfull")) {';  
    echo '    document.location = "viewsender.php";';  
    echo '  }';  
    echo'</script>';
}
else{
    echo '<script type="text/javascript"> '; 
    echo '  if (confirm("Deleted successfull")) {';  
    echo '    document.location = "viewsender.php";';  
    echo '  }';  
    echo'</script>';
}

?>