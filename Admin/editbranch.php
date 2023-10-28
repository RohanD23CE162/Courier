<?php 
include('connect.php');
session_start();
if($_SESSION['x']=0){
    header('location: viewbranch.php');
}
$id=$_GET['id'];
$query="select * from branch where bid = '$id'";
$stat = mysqli_query($con,$query);
$data = mysqli_fetch_array($stat);
if(isset($_POST["Update"]))
{
    $query="update `branch` set Bname='$_POST[Bname]',Bcno='$_POST[Bcno]',Bcity='$_POST[Bcity]',Bemail='$_POST[Bemail]',Badd='$_POST[Badd]' where bid='$id'";
    $result1=mysqli_query($con,$query);
    if(!$result1){
            echo '<script type="text/javascript"> '; 
            echo '  if (confirm("Update Unsuccessfull")) {';  
            echo '    document.location = "viewbranch.php";';  
            echo '  }';  
            echo'</script>';
        }
        else{
            echo '<script type="text/javascript"> '; 
            echo '  if (confirm("Update successfull")) {';  
            echo '    document.location = "viewbranch.php";';  
            echo '  }';  
            echo'</script>';
        }
}
include('start.php');
?>
<head><link rel="stylesheet" href="CSS/add.css"></head>
<div class="xyz">
    <div class="container">
        <div class="title">Edit Branch</div>
        <div class="content">
            <form method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Name</span>
                        <input type="text" value="<?php echo $data['Bname'];?>" name="Bname"required>
                    </div>
                    <div class="input-box">
                        <span class="details">Contact Number</span>
                        <input type="text" value="<?php echo $data['Bcno'];?>" name="Bcno" required>
                    </div>
                    <div class="input-box">
                        <span class="details">City</span>
                        <input type="text" value="<?php echo $data['Bcity'];?>" name="Bcity" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" value="<?php echo $data['Bemail'];?>" name="Bemail" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Address</span>
                        <input type="text" value="<?php echo $data['Badd'];?>" name="Badd" required>
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