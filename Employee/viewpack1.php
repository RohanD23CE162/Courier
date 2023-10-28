<head>
    <link rel="stylesheet" href="xyz.css">
</head>

<?php
include('connect.php');
?>

<div class="container-fluid">
<div class="col-lg-12">
<div class="row" border-primary>
    <div class="col-md-6">
        <div class="callout callout-info">
        <?php 
        $userid = $_POST['userid'];
$query="SELECT * FROM `package` WHERE Pid='$userid'";
$stat = mysqli_query($con,$query);
$xyz = mysqli_fetch_array($stat);
$query="SELECT * FROM `sender` WHERE Sid=$xyz['Sid']";

$stat = mysqli_query($con,$query);
if($data = mysqli_fetch_array($stat)) {?>
            <b class="border-bottom border-primary">Sender Information</b>
            <dl>
                <dt>Id: <?php echo $data['Sid'];?></dt>
                <dt>Name: <?php echo $data['Sname'];?></dt>
                <dt>City: <?php echo $data['Scity'];?></dt>
                <dt>Address: <?php echo $data['Sadd'];?></dt>
                <dt>Contact: <?php echo $data['Scno'];?></dt>
                <dt>Pincode: <?php echo $data['Spin'];?></dt>
            </dl>
        </div>
        <?php }?>
    </div>
    <div class="col-md-6">
        <div class="callout callout-info">
        <?php 

    $query="SELECT * FROM `receiver` WHERE Rid=$xyz['Rid']";

$stat1 = mysqli_query($con,$query);
if($data = mysqli_fetch_array($stat1)) {?>
            <b class="border-bottom border-primary">Recipient Information</b>
            <dl>
            <dt>Id: <?php echo $data['Rid'];?></dt>
                <dt>Name: <?php echo $data['Rname'];?></dt>
                <dt>City: <?php echo $data['Rcity'];?></dt>
                <dt>Address: <?php echo $data['Radd'];?></dt>
                <dt>Contact: <?php echo $data['Rcno'];?></dt>
                <dt>Pincode: <?php echo $data['Rpin'];?></dt>
            </dl>
        </div>
        <?php }?>
    </div>
</div>
<div class="row" border-primary>
    <div class="col-md-12">
        <div class="callout callout-info">
        <?php 
//error_reporting(E_ERROR | E_PARSE);        



// id description date price weight branchid-badd updatable-status 
$query="SELECT * FROM `package` WHERE Pid=$xyz['Pid']";
$stat2 = mysqli_query($con,$query);
if($data = mysqli_fetch_array($stat2)) {?>
            <b class="border-bottom border-primary">Parcel Details</b>
            <div class="row">
                <div class="col-sm-6">
                    <dl>
                        <dt>Package id: <?php echo $data['Pid']; ?></dt>
                        <dt>Description: <?php echo $data['Description']; ?></dt>
                        <dt>Date: <?php echo $data['Date']; ?></dt>
                        <dt>Branch Address: <?php
        $xyz = mysqli_query($con,"SELECT Badd FROM `branch` WHERE Bid='$data[Bid]'");
        $x = mysqli_fetch_array($xyz);
            echo $x["Badd"];
    ?></dt>
                    </dl>
                </div>
                <div class="col-sm-6">
                        <dl>
                        <dt>Price: <?php echo $data['Price']; ?></dt>
                        <dt>Weight: <?php echo $data['Weight']; ?></dt>
                        <dt>Status: <div class="input-box">
<span class="details">Update Status: </span>
<select name="Status" require>
    <option value="Item accepted by Courier" >Item accepted by Courier</option>
    <option value="Collected" >Collected</option>
    <option value="Shipped" >Shipped</option>
    <option value="In-Transit" >In-Transit</option>
    <option value="Delivered" >Delivered</option>
</select>
</div></dt>
                        <dt>Status: <span class='badge badge-pill badge-primary'> <?php echo $data['Status'];?></span></dt>                                           
                    </dl> 
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>
</div>
</div>