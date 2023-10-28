<?php 
include('connect.php');

if($_SESSION['x']=0){
    header('location: viewpack.php');
}
$id=$_GET['id'];
$query="select * from package where pid = '$id'";
$stat = mysqli_query($con,$query);
$data = mysqli_fetch_array($stat);
if(isset($_POST["Update"]))
{
    $query="update `package` set Description='$_POST[Description]',Date='$_POST[Date]',Sid='$_POST[Sid]',Rid='$_POST[Rid]' where Pid='$id'";
    $result1=mysqli_query($con,$query);
    if(!$result1){
            echo '<script type="text/javascript"> '; 
            echo '  if (confirm("Update Unsuccessfull")) {';  
            echo '    document.location = "viewpack.php";';  
            echo '  }';  
            echo'</script>';
        }
        else{
            echo '<script type="text/javascript"> '; 
            echo '  if (confirm("Update successfull")) {';  
            echo '    document.location = "viewpack.php";';  
            echo '  }';  
            echo'</script>';
        }
}
include('start.php');
?>
<head><link rel="stylesheet" href="CSS/add.css"></head>
<div class="xyz">
    <div class="container">
        <div class="title">Edit Package</div>
        <div class="content">
            <form method="post">
            <div class="user-details">
                <div class="input-box">
                        <span class="details">Id</span>
                        <input type="text" value="<?php echo $data['Pid'];?>" name="Pid"required>
                    </div>
                    <div class="input-box">
                        <span class="details">Description</span>
                        <input type="text" value="<?php echo $data['Description'];?>" name="Description"required>
                    </div>
                    <div class="input-box">
                        <span class="details">Date</span>
                        <input type="text" value="<?php echo $data['Date'];?>" name="Date" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Sender Address</span>
                        <input type="text" value="<?php echo $data['Sid'];?>" name="Sid" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Receiver Address</span>
                        <input type="text" value="<?php echo $data['Rid'];?>" name="Rid" required>
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