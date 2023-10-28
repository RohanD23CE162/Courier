<?php 
include('connect.php');
$id=$_GET['id'];
$query="DELETE FROM employee WHERE eid = '$id'";
$stat = mysqli_query($con,$query);
if(!$stat){
    echo '<script type="text/javascript"> '; 
    echo '  if (confirm("Deleted Unsuccessfull")) {';  
    echo '    document.location = "viewemp.php";';  
    echo '  }';  
    echo'</script>';
}
else{
    echo '<script type="text/javascript"> '; 
    echo '  if (confirm("Deleted successfull")) {';  
    echo '    document.location = "viewemp.php";';  
    echo '  }';  
    echo'</script>';
}

?>