<?php
include('connect.php');
include('start.php');
error_reporting(0);
?>
<html>
<head>
    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
    <link rel="stylesheet" href="CSS/table.css">
    <link rel="stylesheet" href="xyz.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>-->
    
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>  -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <script>
        $(document).ready(function () { $('[data-toggle="tooltip"]').tooltip(); });
    </script>
</head>
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="title">
                        <p>Report</p>

                    <form class="date" method="POST">
                        Date From :  <input type="date" name="date1" value="" require="true">
                        &nbsp; &nbsp; &nbsp; &nbsp; 
                        Date To :  <input type="date" name="date2" value="" require="true">
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        Status :<select name="Status" require>
                                    <option value="All" >ALL</option>
                                    <option value="Item accepted by Courier" >Item accepted by Courier</option>
                                    <option value="Collected" >Collected</option>
                                    <option value="Shipped" >Shipped</option>
                                    <option value="In-Transit" >In-Transit</option>
                                    <option value="Delivered" >Delivered</option>
                                </select>
                    &nbsp; &nbsp; &nbsp; &nbsp;
                    <input type="submit" name="submit" value="Submit" 
                    style=" border-bottom-right-radius: 2px;
                            border-top-right-radius: 2px;
                            background-color:  #0e42dd;
                            box-shadow: 1px 2px 4px 0 rgba(0, 0, 0, 0.08);
                            color: #ffffff;
                            margin-left: -4px;
                            cursor: pointer;
                            border: none;
                            outline: none;
                            height: 30px;">
                    </form>
                    <form action="downReport.php" method="post">
                    <input type="submit" name="Download" value="Download" 
                    style=" border-bottom-right-radius: 2px;
                            border-top-right-radius: 2px;
                            background-color:  #0e42dd;
                            box-shadow: 1px 2px 4px 0 rgba(0, 0, 0, 0.08);
                            color: #ffffff;
                            margin-left: -4px;
                            cursor: pointer;
                            border: none;
                            outline: none;
                            height: 30px;">
                    </form>

                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Weight</th>
                        <th>Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    if(isset($_POST['submit'])) {
                            $date1=$_POST['date1'];
                            $date2=$_POST['date2'];	
                            $sta=$_POST['Status'];
                            $_SESSION['date1']=$date1;
                            $_SESSION['date2']=$date2;	
                            $_SESSION['Status']=$sta;
                            if($sta=="All")	
                            {                                
                                $query = "select * from package where date between '$date1' and '$date2' ";
                            }                            
                            else{
                                $query = "select * from package where date between '$date1' and '$date2' &&  Status='$sta' ";
                            }
                    
                            $stat1 = mysqli_query($con,$query);
                            while ($data = mysqli_fetch_array($stat1)) {?>
                    <tr>
                        <?php $packid=$data['Pid'];?>
                        <td><?php echo $packid; ?></td>
                        
                        <td><?php echo $data['Date']; ?></td>
                        <td><?php echo $data['Description']; ?></td>
                        <td><?php
                                $xyz = mysqli_query($con,"SELECT Sadd FROM `sender` WHERE Sid='$data[Sid]'");
                                $x = mysqli_fetch_array($xyz);
                                    echo $x["Sadd"];
                            ?></td>
                        <td><?php 
                                $xyz = mysqli_query($con,"SELECT Radd FROM `receiver` WHERE Rid='$data[Rid]'");
                                $x = mysqli_fetch_array($xyz);
                                    echo $x["Radd"];
                                ?></td>
                        <td><?php echo $data['Weight']; ?></td>
                        <td><?php echo $data['Price']; ?></td>
                        <td><?php echo $data['Status']; ?></td>
                    </tr>
                <?php }}?>
                </tbody>
            </table>
            
    </div>    
</div>

        </div>
    </div>
</div>
</div>
    </div>
 <?php   include('end.php'); ?>