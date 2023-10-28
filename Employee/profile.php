<?php 
include('connect.php');
$id="E002";
$query="select * from employee where Eid = '$id'";
$stat = mysqli_query($con,$query);
$data = mysqli_fetch_array($stat);
if(isset($_POST["Update"]))
{
    $result1 = mysqli_query($con,"update employee set Ename='$_POST[Ename]', Password='$_POST[Password]', Ecno='$_POST[Ecno]', Eemail='$_POST[Eemail]', Eadd='$_POST[Eadd]', Post='$_POST[Post]'  where Eid='$id'");
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
                        <input type="text" value="<?php echo $data['Ename'];?>" name="Ename">
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="text" value="<?php echo $data['Password']; ?>" name="Password">
                    </div>
                    <div class="input-box">
                        <span class="details">Contact Number</span>
                        <input type="text" value="<?php echo $data['Ecno']; ?>" name="Ecno">
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" value="<?php echo $data['Eemail']; ?>" name="Eemail">
                    </div>
                    <div class="input-box">
                        <span class="details">Address</span>
                        <input type="text" value="<?php echo $data['Eadd']; ?>" name="Eadd">
                    </div>
                    <div class="input-box">
                        <span class="details">Post</span>
                        <input type="text" value="<?php echo $data['Post']; ?>" name="Post">
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