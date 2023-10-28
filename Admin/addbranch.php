<?php 
include('connect.php');

$xyz = mysqli_query($con,"SELECT * FROM `branch`");
while ($x = mysqli_fetch_array($xyz)){
    $id=$x['Bid'];
}
$newid="B00".(ltrim($id,"B")+1);

if(isset($_POST["Add"]))
{
    $query="INSERT INTO `branch`(`Bid`,`Bname`,`Bcno`,`Bcity`,`Bemail`,`Badd`)VALUES('$_POST[Bid]','$_POST[Bname]','$_POST[Bcno]','$_POST[Bcity]','$_POST[Bemail]','$_POST[Badd]')";
    $result1=mysqli_query($con,$query);
    if(!$result1){
            echo '<script type="text/javascript"> '; 
            echo '  if (confirm("Addition Unsuccessfull")) {';  
            echo '    document.location = "addbranch.php";';  
            echo '  }';  
            echo'</script>';
        }
        else{
            echo '<script type="text/javascript"> '; 
            echo '  if (confirm("Addition successfull")) {';  
            echo '    document.location = "addbranch.php";';  
            echo '  }';  
            echo'</script>';
        }
}
include('start.php');
?>
<head><link rel="stylesheet" href="CSS/add.css"></head>
<div class="xyz" style="margin-top: -45px;">
    <div class="container">
        <div class="title">Add New Branch</div>
        <div class="content">
            <form method="post">
                <div class="user-details">
                <div class="input-box">
                        <span class="details">Id</span>
                        <input type="text" placeholder="Enter Id" name="Bid" value=<?php echo $newid?>>
                    </div>
                    <div class="input-box">
                        <span class="details">Name</span>
                        <input type="text" placeholder="Enter name" name="Bname"required>
                    </div>
                    <div class="input-box">
                        <span class="details">Contact Number</span>
                        <input type="text" placeholder="Enter Contact Number" name="Bcno" required>
                    </div>
                    <div class="input-box">
                        <span class="details">City</span>
                        <input type="text" placeholder="Enter City" name="Bcity" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" placeholder="Enter Email" name="Bemail" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Address</span>
                        <input type="text" placeholder="Enter Address" name="Badd" required>
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