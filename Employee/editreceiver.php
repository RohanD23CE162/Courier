<?php 
include('connect.php');
session_start();
if($_SESSION['x']=0){
    header('location: viewreceiver.php');
}
$id=$_GET['id'];
$query="select * from receiver where rid = '$id'";
$stat = mysqli_query($con,$query);
$data = mysqli_fetch_array($stat);
if(isset($_POST["Update"]))
{
    $query="update `receiver` set Rname='$_POST[Rname]',Rcno='$_POST[Rcno]',Rcity='$_POST[Rcity]',Remail='$_POST[Remail]',Radd='$_POST[Radd]',Rpin='$_POST[Rpin]' where Rid='$id'";
    $result1=mysqli_query($con,$query);
    if(!$result1){
            echo '<script type="text/javascript"> '; 
            echo '  if (confirm("Update Unsuccessfull")) {';  
            echo '    document.location = "viewreceiver.php";';  
            echo '  }';  
            echo'</script>';
        }
        else{
            echo '<script type="text/javascript"> '; 
            echo '  if (confirm("Update successfull")) {';  
            echo '    document.location = "viewreceiver.php";';  
            echo '  }';  
            echo'</script>';
        }
}
include('start.php');
?>
<head><link rel="stylesheet" href="CSS/add.css"></head>
<div class="xyz">
    <div class="container">
        <div class="title">Edit Receiver</div>
        <div class="content">
            <form method="post">
            <div class="user-details">
                <div class="input-box">
                        <span class="details">Id</span>
                        <input type="text" value="<?php echo $data['Rid'];?>" name="Rid"required>
                    </div>
                    <div class="input-box">
                        <span class="details">Name</span>
                        <input type="text" value="<?php echo $data['Rname'];?>" name="Rname"required>
                    </div>
                    <div class="input-box">
                        <span class="details">Contact Number</span>
                        <input type="text" value="<?php echo $data['Rcno'];?>" name="Rcno" required>
                    </div>
                    <div class="input-box">
                        <span class="details">City</span>
                        <input type="text" value="<?php echo $data['Rcity'];?>" name="Rcity" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" value="<?php echo $data['Remail'];?>" name="Remail" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Address</span>
                        <input type="text" value="<?php echo $data['Radd'];?>" name="Radd" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Pincode</span>
                        <input type="text" value="<?php echo $data['Rpin'];?>" name="Rpin" required>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Update" name="Update">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include('end.php');?>