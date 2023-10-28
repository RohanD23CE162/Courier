<?php
include('connect.php');
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
                    <div class="title"><p>Sender</p>
                    <form class="form-search" method="get" action="">

<input type="search" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" placeholder="Enter Sender Id">
<button type="submit" name="submit">Search</button>

</form>
                    </div>
                    <div class="col-sm-7">
                        <a href="addsender.php" class="btn btn-secondary"><span>Add New Sender</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Password</th>
                        <th>Contact No.</th>
                        <th>City</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Pincode</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    if (isset($_GET['submit'])) {
                        if($_GET['search']==null){
                            $query="SELECT * FROM `sender`";
                        }
                        else{
                            $search_query = $_GET['search'];
                            $query="SELECT * FROM `sender` WHERE Sid='$search_query'";
                        }
                    }
                    else{
                        $query="SELECT * FROM `sender`";
                    }
                    $stat = mysqli_query($con,$query);
                    while ($data = mysqli_fetch_array($stat)) {?>
                    <tr>
                        <td><?php echo $data['Sid']; ?></td>
                        <td><?php echo $data['Sname']; ?></td>
                        <td><?php echo $data['Password']; ?></td>
                        <td><?php echo $data['Scno']; ?></td>
                        <td><?php echo $data['Scity']; ?></td>
                        <td><?php echo $data['Semail']; ?></td>
                        <td><?php echo $data['Sadd']; ?></td>
                        <td><?php echo $data['Spin']; ?></td>
                        <td style="width: 200px; padding:0px;">
                            <a href="editsender.php?id=<?php echo $data['Sid']; ?>">
                                <lord-icon src="https://cdn.lordicon.com/bxxnzvfm.json" trigger="hover"
                                    colors="primary:#3a3347,secondary:#ffc738,tertiary:#f9c9c0,quaternary:#ebe6ef"
                                    state="hover-1" style="width:50px;height:40px;display:inline-block;">
                                </lord-icon>
                            </a>
                            
                            <a href="deletesender.php?id=<?php echo $data['Sid']; ?>">
                                <lord-icon class="iconx" src="https://cdn.lordicon.com/qjwkduhc.json" trigger="hover"
                                    colors="primary:#646e78,secondary:#4bb3fd,tertiary:#ebe6ef" state="hover-empty"
                                    style="width:50px;height:40px;display:inline-block;margin-right:0px;">
                                </lord-icon>
                            </a>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</html>
<?php
include('end.php');
?>