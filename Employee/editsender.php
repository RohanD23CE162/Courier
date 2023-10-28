<?php 
include('connect.php');
session_start();
if($_SESSION['x']=0){
    header('location: viewsender.php');
}
$id=$_GET['id'];
$query="select * from sender where sid = '$id'";
$stat = mysqli_query($con,$query);
$data = mysqli_fetch_array($stat);
if(isset($_POST["Update"]))
{
    $query="update `sender` set Sname='$_POST[Sname]',Password='$_POST[Password]',Scno='$_POST[Scno]',Scity='$_POST[Scity]',Semail='$_POST[Semail]',Sadd='$_POST[Sadd]',Spin='$_POST[Spin]' where Sid='$id'";
    $result1=mysqli_query($con,$query);
    if(!$result1){
            echo '<script type="text/javascript"> '; 
            echo '  if (confirm("Update Unsuccessfull")) {';  
            echo '    document.location = "viewsender.php";';  
            echo '  }';  
            echo'</script>';
        }
        else{
            echo '<script type="text/javascript"> '; 
            echo '  if (confirm("Update successfull")) {';  
            echo '    document.location = "viewsender.php";';  
            echo '  }';  
            echo'</script>';
        }
}
include('start.php');
?>
<head><link rel="stylesheet" href="CSS/add.css"></head>
<div class="xyz">
    <div class="container">
        <div class="title">Edit Sender</div>
        <div class="content">
            <form method="post">
            <div class="user-details">
                <div class="input-box">
                        <span class="details">Id</span>
                        <input type="text" value="<?php echo $data['Sid'];?>" name="Sid"required>
                    </div>
                    <div class="input-box">
                        <span class="details">Name</span>
                        <input type="text" value="<?php echo $data['Sname'];?>" name="Sname"required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="text" value="<?php echo $data['Password'];?>" name="Password" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Contact Number</span>
                        <input type="text" value="<?php echo $data['Scno'];?>" name="Scno" required>
                    </div>
                    <div class="input-box">
                        <span class="details">City</span>
                        <input type="text" value="<?php echo $data['Scity'];?>" name="Scity" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" value="<?php echo $data['Semail'];?>" name="Semail" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Address</span>
                        <input type="text" value="<?php echo $data['Sadd'];?>" name="Sadd" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Pincode</span>
                        <input type="text" value="<?php echo $data['Spin'];?>" name="Spin" required>
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