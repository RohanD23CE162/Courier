<?php 
include('connect.php');

$xyz = mysqli_query($con,"SELECT * FROM `sender`");
while ($x = mysqli_fetch_array($xyz)){
    $id=$x['Sid'];
}
$newid="S00".(ltrim($id,"S")+1);


if(isset($_POST["Add"]))
{
    $query="INSERT INTO `sender` (`Sid`, `Sname`, `Password`, `Scno`, `Scity`, `Semail`, `Sadd`, `Spin`) VALUES ('$_POST[Sid]', '$_POST[Sname]', '$_POST[Password]', '$_POST[Scno]','$_POST[Scity]', '$_POST[Semail]', '$_POST[Sadd]', '$_POST[Spin]')";
    $result1=mysqli_query($con,$query);
    if(!$result1){
            echo '<script type="text/javascript"> '; 
            echo '  if (confirm("Addition Unsuccessfull")) {';  
            echo '    document.location = "addsender.php";';  
            echo '  }';  
            echo'</script>';
        }
        else{
            echo '<script type="text/javascript"> '; 
            echo '  if (confirm("Addition successfull")) {';  
            echo '    document.location = "addsender.php";';  
            echo '  }';  
            echo'</script>';
        }
}
include('start.php');
?>
<head><link rel="stylesheet" href="CSS/add.css"></head>
<div class="xyz">
    <div class="container">
        <div class="title">Add New Sender</div>
        <div class="content">
            <form method="post">
                <div class="user-details">
                <div class="input-box">
                        <span class="details">Id</span>
                        <input type="text" name="Sid" value=<?php echo $newid?>>
                    </div>
                    <div class="input-box">
                        <span class="details">Name</span>
                        <input type="text" placeholder="Enter name" name="Sname"required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="text" placeholder="Enter Password" name="Password" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Contact Number</span>
                        <input type="text" placeholder="Enter Contact Number" name="Scno" required>
                    </div>
                    <div class="input-box">
                        <span class="details">City</span>
                        <input type="text" placeholder="Enter City" name="Scity" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" placeholder="Enter Email" name="Semail" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Address</span>
                        <input type="text" placeholder="Enter Address" name="Sadd" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Pin</span>
                        <input type="text" placeholder="Enter Pin" name="Spin" required>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Add" name="Add">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include('end.php');?>