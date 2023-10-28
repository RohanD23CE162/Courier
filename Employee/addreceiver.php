<?php 
include('connect.php');
// $id="R001";
// $query="select * from receiver where Sid = '$id'";
// $stat = mysqli_query($con,$query);

$xyz = mysqli_query($con,"SELECT * FROM `receiver`");
while ($x = mysqli_fetch_array($xyz)){
    $id=$x['Rid'];
}
$newid="R00".(ltrim($id,"R")+1);


if(isset($_POST["Add"]))
{
    $query="INSERT INTO `receiver` (`Rid`, `Rname`, `Rcno`, `Rcity`, `Remail`, `Radd`, `Rpin`) VALUES ('$_POST[Rid]', '$_POST[Rname]', '$_POST[Rcno]','$_POST[Rcity]', '$_POST[Remail]', '$_POST[Radd]', '$_POST[Rpin]')";
    $result1=mysqli_query($con,$query);
    if(!$result1){
            echo '<script type="text/javascript"> '; 
            echo '  if (confirm("Addition Unsuccessfull")) {';  
            echo '    document.location = "addreceiver.php";';  
            echo '  }';  
            echo'</script>';
        }
        else{
            echo '<script type="text/javascript"> '; 
            echo '  if (confirm("Addition successfull")) {';  
            echo '    document.location = "addreceiver.php";';  
            echo '  }';  
            echo'</script>';
        }
}
include('start.php');
?>
<head><link rel="stylesheet" href="CSS/add.css"></head>
<div class="xyz">
    <div class="container">
        <div class="title">Add New Receiver</div>
        <div class="content">
            <form method="post">
                <div class="user-details">
                <div class="input-box">
                        <span class="details">Id</span>
                        <input type="text" name="Rid" value=<?php echo $newid?>>
                    </div>
                    <div class="input-box">
                        <span class="details">Name</span>
                        <input type="text" placeholder="Enter name" name="Rname"required>
                    </div>
                    <div class="input-box">
                        <span class="details">Contact Number</span>
                        <input type="text" placeholder="Enter Contact Number" name="Rcno" required>
                    </div>
                    <div class="input-box">
                        <span class="details">City</span>
                        <input type="text" placeholder="Enter City" name="Rcity" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" placeholder="Enter Email" name="Remail" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Address</span>
                        <input type="text" placeholder="Enter Address" name="Radd" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Pin</span>
                        <input type="text" placeholder="Enter Pin" name="Rpin" required>
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