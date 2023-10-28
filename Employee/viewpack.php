<?php
include('connect.php');
include('start.php');
?>
<html>
<head>
    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
    <link rel="stylesheet" href="CSS/table.css">
    <link rel="stylesheet" href="xyz.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

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
                    <div class="title"><p>Package</p>
                    <form class="form-search" method="get" action="">

                    <input type="search" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" placeholder="Enter Package Id">
                    <button type="submit" name="submit">Search</button>

                    </form>
                    </div>
                    <div class="col-sm-7">
                        <a href="addpack.php" class="btn btn-secondary"><span>Add New Package</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                     if (isset($_GET['submit'])) {
                         if($_GET['search']==null){
                             $query="SELECT * FROM `package`";
                         }
                         else{
                             $search_query = $_GET['search'];
                             $query="SELECT * FROM `package` WHERE Pid='$search_query'";
                         }
                     }
                     else{
                         $query="SELECT * FROM `package`";
                     }
                    error_reporting(E_ERROR | E_PARSE);
                    $stat1 = mysqli_query($con,$query);
                    while ($data = mysqli_fetch_array($stat1)) {?>
                    <tr>
                        <?php $packid=$data['Pid'];?>

                        <td><?php echo $packid; ?></td>
                        <td><?php echo $data['Description']; ?></td>
                        <td><?php echo $data['Date']; ?></td>
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
                        <td><?php echo $data['Status']; ?></td>
                        <td style="width: 200px; padding:0px;">
                            <button data-id='<?php echo $packid; ?>' class="userinfo btn"><lord-icon src="https://cdn.lordicon.com/hbvgknxo.json"  trigger="hover" style="width:50px;height:40px;display:inline-block;">
                            </lord-icon></button>

                            <a href="editpack.php?id=<?php echo $data['Pid']; ?>">
                                <lord-icon src="https://cdn.lordicon.com/bxxnzvfm.json" trigger="hover"
                                    colors="primary:#3a3347,secondary:#ffc738,tertiary:#f9c9c0,quaternary:#ebe6ef"
                                    state="hover-1" style="width:50px;height:40px;display:inline-block; padding-top:12px;">
                                </lord-icon>
                            </a>
                            
                            <a href="deletepack.php?id=<?php echo $data['Pid']; ?>">
                                <lord-icon class="iconx" src="https://cdn.lordicon.com/qjwkduhc.json" trigger="hover"
                                    colors="primary:#646e78,secondary:#4bb3fd,tertiary:#ebe6ef" state="hover-empty"
                                    style="width:50px;height:40px;display:inline-block;margin-right:0px; padding-top:11px;">
                                </lord-icon>
                            </a>

                            <a href="Invoice.php?id=<?php echo $data['Pid']; ?>">
                                <img src="receipt.png" style="width:35px;height:30px;padding:-10px;">
                            </a>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>

            
            <div id="editEmployeeModal" class="modal"  data-backdrop="false" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="false">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="height:475px;">
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
        </div>


    </div>    
</div>

        </div>
    </div>
</div>
</div>
    </div>
<!-- partial -->

  <script  src="CSS/script.js"></script>


  <script type='text/javascript'>
            $(document).ready(function(){
                $('.userinfo').click(function(){
                    var userid = $(this).data('id');
                    $.ajax({
                        url: 'ajaxfile.php',
                        type: 'post',
                        data: {userid: userid},
                        success: function(response){ 
                            $('.modal-body').html(response); 
                            $('#editEmployeeModal').modal('show'); 
                        }
                    });
                });
            });
            </script>
    </body>
</html>