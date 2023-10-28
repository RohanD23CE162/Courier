<?php 
include('connect.php');
$id="P000";
$xyz = mysqli_query($con,"SELECT * FROM `package`");
while ($x = mysqli_fetch_array($xyz)){
    $id=$x['Pid'];
}
$newid="P00".(ltrim($id,"P")+1);

include('start.php');
?>
<head>
    <link rel="stylesheet" href="CSS/add.css">
    </head>
<div class="xyz">
    <div class="container">
        <div class="title">Add New Package Details</div>
        <div class="content">
            <form method="post" action="addpack1.php" >
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Sender Id</span>
                        <input list="slist" placeholder="Select Sender Id" name="Sid" required>
                        <datalist id="slist">
                            <?php
                                $xyz = mysqli_query($con,"SELECT * FROM `sender`");
                                while ($x = mysqli_fetch_array($xyz)){
                                    echo '<option value="'.$x["Sid"].'">';
                                }
                            ?>  
                        </datalist> 
                    </div>
                    <div class="input-box">
                        <span class="details">Receiver Id</span>
                        <input list="rlist" placeholder="Select Receiver Id" name="Rid" required>
                        <datalist id="rlist">
                            <?php
                                $xyz = mysqli_query($con,"SELECT * FROM `receiver`");
                                while ($x = mysqli_fetch_array($xyz)){
                                    echo '<option value="'.$x["Rid"].'">';
                                }
                            ?>  
                        </datalist>
                    </div>
                    <div class="input-box">
                        <span class="details">Package Id</span>
                        <input type="text" placeholder="Enter Id" name="Pid" value=<?php echo $newid;?>>
                    </div>
                    <div class="input-box">
                        <span class="details">Description</span>
                        <input type="text" placeholder="Enter Description" name="Description"required>
                    </div>
                    <div class="input-box">
                        <span class="details">Weight</span>
                        <input type="text" placeholder="Enter Weight" name="Weight" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Date</span>
                        <input  type="date" placeholder="Enter Date" name="Date" required>
                    </div>
                    <?php
                        //$xid = $_SESSION['xid'];
                        $xid = "E002";
                        $xyz = mysqli_query($con,"select Bid from employee where Eid='$xid'");
                        $data1=mysqli_fetch_array($xyz);
                        $x=$data1['Bid'];
                    ?> 
                    <div class="input-box">
                        <span class="details">Branch Id</span>
                        <input list="blist" placeholder="Select Branch Id" name="Bid" value=<?php echo $x;?>>
                        <datalist id="blist">
                            <?php
                                $xyz = mysqli_query($con,"SELECT * FROM `branch`");
                                while ($x = mysqli_fetch_array($xyz)){
                                    echo '<option value="'.$x["Bid"].'">';
                                }
                            ?>  
                        </datalist>
                    </div>
                    <div class="input-box">
                        <span class="details">Package Status</span>
                        <select name="Status" require>
                            <option value="Item accepted by Courier" >Item accepted by Courier</option>
                            <option value="Collected" >Collected</option>
                            <option value="Shipped" >Shipped</option>
                            <option value="In-Transit" >In-Transit</option>
                            <option value="Delivered" >Delivered</option>
                        </select>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Calculate Price" name="Add">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include('end.php');?>