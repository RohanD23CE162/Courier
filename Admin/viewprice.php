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
                    <div class="title">Weight And Price</div>
                    <!-- <div class="col-sm-7">
                        <a href="addemp.php" class="btn btn-secondary"><span>Add New Employee</span></a>
                    </div> -->
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $query="SELECT * FROM `weight`";
                    $stat = mysqli_query($con,$query);
                    while ($data = mysqli_fetch_array($stat)) {?>
                    <tr>
                        <td><?php echo $data['Wid']; ?></td>
                        <td><?php echo $data['W_from']; ?></td>
                        <td><?php echo $data['W_to']; ?></td>
                        <td><?php echo $data['Price']; ?></td>
                        <!-- <td style="width: 200px; padding:0px;">
                            <a href="editemp.php?id=<?php echo $data['wid']; ?>">
                                <lord-icon src="https://cdn.lordicon.com/bxxnzvfm.json" trigger="hover"
                                    colors="primary:#3a3347,secondary:#ffc738,tertiary:#f9c9c0,quaternary:#ebe6ef"
                                    state="hover-1" style="width:50px;height:40px;display:inline-block;">
                                </lord-icon>
                            </a>
                            
                            <a href="deleteemp.php?id=<?php echo $data['wid']; ?>">
                                <lord-icon class="iconx" src="https://cdn.lordicon.com/qjwkduhc.json" trigger="hover"
                                    colors="primary:#646e78,secondary:#4bb3fd,tertiary:#ebe6ef" state="hover-empty"
                                    style="width:50px;height:40px;display:inline-block;">
                                </lord-icon>
                            </a>
                        </td> -->
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