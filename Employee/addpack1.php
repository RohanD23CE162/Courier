<?php   
    include('connect.php');
    $Pid=$_POST['Pid'];
    $Description=$_POST['Description'];
    $Weight=$_POST['Weight'];
    $Date=$_POST['Date'];
    $Status=$_POST['Status'];
    $Sid=$_POST['Sid'];
    $Rid=$_POST['Rid'];
    $Bid=$_POST['Bid'];
    $query="INSERT INTO `package` (`Pid`, `Description`, `Weight`, `Date`, `Status`, `Sid`, `Rid`, `Bid`) VALUES ('$Pid', '$Description', '$Weight', '$Date', '$Status','$Sid', '$Rid', '$Bid')";
    $result1=mysqli_query($con,$query);
    if(!$result1){
        echo '<script type="text/javascript"> '; 
        echo '  if (confirm("Addition Unsuccessfull 1")) {';  
        echo '    document.location = "addpack.php";';  
        echo '  }';  
        echo'</script>';
    }
    else{
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d h:i:s', time());
        $query="INSERT INTO `tracking` (`Bid`, `Pid`, `Date_time`, `Status`) VALUES ('$Bid', '$Pid','$date','$Status')";
        $result2=mysqli_query($con,$query);
        if(!$result2){
            echo '<script type="text/javascript"> '; 
            echo '  if (confirm("Addition Unsuccessfull 2")) {';  
            echo '    document.location = "addpack.php";';  
            echo '  }';  
            echo'</script>';
        }
    }
    $abc = mysqli_query($con," SELECT * FROM `weight`");
    while ($x = mysqli_fetch_array($abc)){
        $from =$x['W_from']; 
        $to =$x['W_to'];
        $price=$x['Price'];
        if($from<$Weight && $to>$Weight)
        {
            break;
        }
    }
    include('start.php');
?>

<head>
    <link rel="stylesheet" href="CSS/add.css">
    </head>
<div class="xyz">
    <div class="container">
        <div class="title">Cost will be :</div>
        <div class="content">
            <form method="post" action="addpack2.php" >
                <div class="user-details">
                    <div class="input-box">
                        <input type="text" value=<?php echo $price;?> name="Price" required>
                        <input type="hidden" value=<?php echo $Pid;?> name="Pid">
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="ok">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include('end.php');?>