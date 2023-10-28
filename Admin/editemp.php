<?php 
include('connect.php');
session_start();
if($_SESSION['x']=0){
    header('location: viewemp.php');
}
$id=$_GET['id'];
$query="select * from employee where eid = '$id'";
$stat = mysqli_query($con,$query);
$data = mysqli_fetch_array($stat);
if(isset($_POST["Update"]))
{
    $query="update `employee` set Ename='$_POST[Ename]',Password='$_POST[Password]',Ecno='$_POST[Ecno]',Eemail='$_POST[Eemail]',Eadd='$_POST[Eadd]',Post='$_POST[Post]',Bid='$_POST[Bid]' where Eid='$id'";
    $result1=mysqli_query($con,$query);
    if(!$result1){
            echo '<script type="text/javascript"> '; 
            echo '  if (confirm("Update Unsuccessfull")) {';  
            echo '    document.location = "viewemp.php";';  
            echo '  }';  
            echo'</script>';
        }
        else{
            echo '<script type="text/javascript"> '; 
            echo '  if (confirm("Update successfull")) {';  
            echo '    document.location = "viewemp.php";';  
            echo '  }';  
            echo'</script>';
        }
}
include('start.php');
?>
<head><link rel="stylesheet" href="CSS/add.css"></head>
<div class="xyz">
    <div class="container">
        <div class="title">Edit Employee</div>
        <div class="content">
            <form method="post">
            <div class="user-details">
                <div class="input-box">
                        <span class="details">Id</span>
                        <input type="text" value="<?php echo $data['Eid'];?>" name="Eid"required>
                    </div>
                    <div class="input-box">
                        <span class="details">Name</span>
                        <input type="text" value="<?php echo $data['Ename'];?>" name="Ename"required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="text" value="<?php echo $data['Password'];?>" name="Password" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Contact Number</span>
                        <input type="text" value="<?php echo $data['Ecno'];?>" name="Ecno" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" value="<?php echo $data['Eemail'];?>" name="Eemail" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Address</span>
                        <input type="text" value="<?php echo $data['Eadd'];?>" name="Eadd" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Post</span>
                        <input type="text" value="<?php echo $data['Post'];?>" name="Post" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Branch Id</span>
                        <input type="text" value="<?php echo $data['Bid'];?>" name="Bid" required>
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