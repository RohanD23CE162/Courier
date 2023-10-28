<?php
include('connect.php');
include('start.php');
?>
<head>
    <link rel="stylesheet" href="CSS/Dashboard.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="container">
</head>
<div class="home-content">
    <div class="title1">
        <p>Employee Dashboard</p>
    </div>

    <div class="overview-boxes">
    <div class="box">
            <div class="right-side">
                <div class="box-topic">Total Order</div>
                <div class="number">
                <?php
                    $result=mysqli_query($con,"select * from 	package ");
                    $row=mysqli_num_rows($result);
                    echo $row;
                  ?>
                </div>
            </div>
            <i class="fa fa-cubes"></i>
        </div>
        <div class="box">
            <div class="right-side">
                <div class="box-topic">Total Customer</div>
                <div class="number">
                  <?php
                    $result=mysqli_query($con,"select * from 	sender ");
                    $row=mysqli_num_rows($result);
                    echo $row;
                  ?>
                </div>
            </div>
            <i class='fas fa-users two'></i>
        </div>
    </div>
    <!-- <div class="overview-boxes">
        <div class="box">
            <div class="right-side">
                <div class="box-topic">Total Branch</div>
                <div class="number">
                  <?php
                    $result=mysqli_query($con,"select * from 	branch ");
                    $row=mysqli_num_rows($result);
                    echo $row;
                  ?>
                </div>
            </div>
            <i class='fas fa-building'></i>
        </div>
    </div> -->
    
</div>
<?php
include('end.php');
?>