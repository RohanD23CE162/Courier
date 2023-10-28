<?php 
include('connect.php');
$id="S001";
$query="select * from sender where Sid = '$id'";
$stat = mysqli_query($con,$query);
$data = mysqli_fetch_array($stat);
if(isset($_POST["Update"]))
{
    $result1 = mysqli_query($con,"update sender set Sname='$_POST[Sname]', Password='$_POST[Password]', Scno='$_POST[Scno]', Scity='$_POST[Scity]', Semail='$_POST[Semail]', Sadd='$_POST[Sadd]', Spin='$_POST[Spin]' where Sid='$id'");
    if(!$result1){
            echo '<script type="text/javascript"> '; 
            echo '  if (confirm("update Unsuccessfull")) {';  
            echo '    document.location = "profile.php";';  
            echo '  }';  
            echo'</script>';
        }
        else{
            echo '<script type="text/javascript"> '; 
            echo '  if (confirm("update successfull")) {';  
            echo '    document.location = "profile.php";';  
            echo '  }';  
            echo'</script>';
        }
}
include('start.php');
?>
<head><link rel="stylesheet" href="CSS/add.css"></head>
<div class="xyz" style="margin-top: -45px;">
    <div class="container">
        <div class="title">Profile</div>
        <div class="content">
            <form method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Name</span>
                        <input type="text" value="<?php echo $data['Sname'];?>" name="Sname">
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="text" value="<?php echo $data['Password']; ?>" name="Password">
                    </div>
                    <div class="input-box">
                        <span class="details">Contact Number</span>
                        <input type="text" value="<?php echo $data['Scno']; ?>" name="Scno">
                    </div>
                    <div class="input-box">
                        <span class="details">City</span>
                        <input type="text" value="<?php echo $data['Scity']; ?>" name="Scity">
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" value="<?php echo $data['Semail']; ?>" name="Semail">
                    </div>
                    <div class="input-box">
                        <span class="details">Address</span>
                        <input type="text" value="<?php echo $data['Sadd']; ?>" name="Sadd">
                    </div>
                    <div class="input-box">
                        <span class="details">Pincode</span>
                        <input type="text" value="<?php echo $data['Spin']; ?>" name="Spin">
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