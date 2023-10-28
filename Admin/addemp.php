<?php 
include('connect.php');
// $id="E001";
// $query="select * from employee where Eid = '$id'";
// $stat = mysqli_query($con,$query);

$xyz = mysqli_query($con,"SELECT * FROM `employee`");
while ($x = mysqli_fetch_array($xyz)){
    $id=$x['Eid'];
}
$newid="E00".(ltrim($id,"E")+1);


if(isset($_POST["Add"]))
{
    $query="INSERT INTO `employee` (`Eid`, `Ename`, `Password`, `Ecno`, `Eemail`, `Eadd`, `Post`, `Bid`) VALUES ('$_POST[Eid]', '$_POST[Ename]', '$_POST[Password]', '$_POST[Ecno]', '$_POST[Eemail]', '$_POST[Eadd]', '$_POST[Post]', '$_POST[Bid]')";
    $result1=mysqli_query($con,$query);
    if(!$result1){
            echo '<script type="text/javascript"> '; 
            echo '  if (confirm("Addition Unsuccessfull")) {';  
            echo '    document.location = "addemp.php";';  
            echo '  }';  
            echo'</script>';
        }
        else{
            echo '<script type="text/javascript"> '; 
            echo '  if (confirm("Addition successfull")) {';  
            echo '    document.location = "addemp.php";';  
            echo '  }';  
            echo'</script>';
        }
}
include('start.php');
?>
<head><link rel="stylesheet" href="CSS/add.css"></head>
<div class="xyz">
    <div class="container">
        <div class="title">Add New Employee</div>
        <div class="content">
            <form method="post">
                <div class="user-details">
                <div class="input-box">
                        <span class="details">Id</span>
                        <input type="text" name="Eid" value=<?php echo $newid?>>
                    </div>
                    <div class="input-box">
                        <span class="details">Name</span>
                        <input type="text" placeholder="Enter name" name="Ename"required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="text" placeholder="Enter Password" name="Password" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Contact Number</span>
                        <input type="text" placeholder="Enter Contact Number" name="Ecno" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" placeholder="Enter Email" name="Eemail" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Address</span>
                        <input type="text" placeholder="Enter Address" name="Eadd" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Post</span>
                        <input type="text" placeholder="Enter Post" name="Post" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Branch Id</span>
                        <input type="text" placeholder="Enter Branch Id" name="Bid" required>
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