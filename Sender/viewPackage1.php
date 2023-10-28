<?php
include('connect.php');
include('start.php');
?>
<html>
<head>
    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
    <link rel="stylesheet" href="CSS/table.css">
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
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
                    <div class="title"><p>Package</p>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th>Pid</th>
                    <th style="padding:0 60px;">Date</th>
                    <th>Discription</th>
                    <th>Status</th>
                    <th>Receiver Name</th>
                    <th>Receiver Address</th>
                    <th colspan="2" style="padding-left:100px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php  
                // 
                        $xid=$_SESSION['xid'];
                        $query="SELECT * FROM `package`  where Sid='$xid' ";
                     
                    //error_reporting(E_ERROR | E_PARSE);
                    $stat1 = mysqli_query($con,$query);
                    while ($data = mysqli_fetch_array($stat1)) {?>
                    <tr><?php $packid=$data['Pid'];?></td>
                        <td><?php echo $data['Pid']; ?></td>
                        <td><?php echo $data['Date']; ?></td>
                        <td><?php echo $data['Description']; ?></td>
                        <td><?php echo $data['Status']; ?></td>
                        <td><?php
                                $xyz = mysqli_query($con,"SELECT Rname FROM `receiver` WHERE Rid='$data[Rid]'");
                                $x = mysqli_fetch_array($xyz);
                                    echo $x["Rname"];
                            ?></td>
                        <td><?php 
                                $xyz = mysqli_query($con,"SELECT Radd FROM `receiver` WHERE Rid='$data[Rid]'");
                                $x = mysqli_fetch_array($xyz);
                                    echo $x["Radd"];
                                ?></td>
                        <td>     
                            
                        <button data-id='<?php echo $data['Status']; ?>' class="userinfo btn"><lord-icon
                            src="https://cdn.lordicon.com/zzcjjxew.json"
                            trigger="hover"
                            colors="primary:#121331,secondary:#2516c7"
                            state="hover-spin"
                            style="width:50px;height:40px;display:inline-block;margin-right:0px; ">

                        </lord-icon>
                    </button>
                    </td>    
                    <td>   
                        <a href="pdf.php?id=<?php echo $data['Pid']; ?>">
                            <img src="receipt.png" style="width:35px;height:30px;padding:-10px;">
                        </a>
                        </td>
                        <td style="width: 200px; padding:0px;">
              
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type='text/javascript'>
            $(document).ready(function(){
                $('.userinfo').click(function(){
                    var userid = $(this).data('id');
                    $.ajax({
                        url: 'pqr.php',
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
<div id="editEmployeeModal" class="modal"  data-backdrop="false" role="dialog" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                Tracking
                
            </div>
            <div class="modal-body">
 
        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                
            </div>
        </div>
        </div>
        
        </div>


</html>
<?php
include('end.php');
?>