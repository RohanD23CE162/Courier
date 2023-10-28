<?php
include('connect.php');
if(isset($_POST["Update"]))
{
    $id=$_POST['Wid'];
    $query="update `weight` set W_from='$_POST[W_from]',W_to='$_POST[W_to]',Price='$_POST[Price]' where Wid='$id'";
    $result1=mysqli_query($con,$query);
    if(!$result1){
        echo '<script type="text/javascript"> '; 
        echo '  if (confirm("Update Unsuccessfull")) {';  
        echo '    document.location = "editprice.php";';  
        echo '  }';  
        echo'</script>';
    }
}
if(isset($_POST["Delete"]))
{
    $id=$_POST['Wid'];
    $query="DELETE FROM `weight` WHERE Wid='$id'";
    $result1=mysqli_query($con,$query);
    if(!$result1){
        echo '<script type="text/javascript"> '; 
        echo '  if (confirm("Deleted Unsuccessfull")) {';  
        echo '    document.location = "editprice.php";';  
        echo '  }';  
        echo'</script>';
    }
}
if(isset($_POST["add"]))
{
    $xyz = mysqli_query($con,"SELECT * FROM `weight`");
    while ($x = mysqli_fetch_array($xyz)){
        $id=$x['Wid'];
    }
    if(isset($id))
{
    $id="W00".(ltrim($id,"W")+1);
}
else
{
    $id="W001";   
}
    $query="INSERT INTO `weight`VALUES ('$id','', '', '');";
    $result1=mysqli_query($con,$query);
    if(!$result1){
        echo '<script type="text/javascript"> '; 
        echo '  if (confirm("Addition Unsuccessfull")) {';  
        echo '    document.location = "editprice.php";';  
        echo '  }';  
        echo'</script>';
    }
}

include('start.php');
?>
<html>
<head>
    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
    <link rel="stylesheet" href="CSS/table.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
    <script>
        $(document).ready(function () { $('[data-toggle="tooltip"]').tooltip(); });
    </script>
</head>
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="title">Weight And Price</div>
                    <div class="col-sm-7">
                        <form method="post" >
                            <input class="btn btn-secondary" type="submit" value="Add New Row" name="add" >
                        </form>
                        <!-- <a href="addemp.php" class="btn btn-secondary"><span>Add New Employee</span></a> -->
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Price</th>
                        <th rowspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $query="SELECT * FROM `weight`";
                    $stat = mysqli_query($con,$query);
                    while ($data = mysqli_fetch_array($stat)) {?>
                    <tr>
                    <form method="post">
                    <td><input type="text" id="input-box" value="<?php echo $data['Wid']; ?>" disabled><input type="hidden" value="<?php echo $data['Wid']; ?>" name="Wid" ></td>
                        <td><input type="text" value="<?php echo $data['W_from']; ?>" name="W_from" id="input-box"></td>
                        <td><input type="text" value="<?php echo $data['W_to']; ?>" name="W_to" id="input-box"></td>
                        <td><input type="text" value="<?php echo $data['Price']; ?>" name="Price" id="input-box"></td>
                        <td>
                            <div class="btn-inputt">
                            <button type="submit" name="Update">
                                Save
                            </button>
                        <!-- </div>
                        </td>
                        <td>
                        <div class="btn-inputt"> -->
                            <button type="submit" name="Delete">
                                Delete
                            </button>
                            </div>
                        </td>
                    </form> 
                    </tr>
                <?php }?>
                </tbody>
                <tr>
                    
                </tr>
            </table>
        </div>
    </div>
</div>
<?php
include('end.php');
?>