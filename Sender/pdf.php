<?php
	include('connect.php');
	$id = $_GET['id'];

    if(isset($_POST["back"])){
		header("location:viewPackage1.php");
	}
    
	$query="SELECT * FROM `package` WHERE Pid='$id'";
	$stat = mysqli_query($con,$query);
	$data = mysqli_fetch_array($stat);

	$query1="SELECT * FROM `sender` WHERE Sid='$data[Sid]'";
	$stat1 = mysqli_query($con,$query1);
	$data1 = mysqli_fetch_array($stat1);

	$query2="SELECT * FROM `receiver` WHERE Rid='$data[Rid]'";
	$stat2 = mysqli_query($con,$query2);
	$data2 = mysqli_fetch_array($stat2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        crossorigin="anonymous">
    <link rel="stylesheet" href="pdf.css" />
    <script src="pdf.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/invoice.css">
</head>

<body>
    <div class="col-md-12 text-right mb-3">
        <button class="btn btn-primary" id="download"><i class="fa fa-download"></i> Download Invoice </button>
        <form method="post"><button class="btn btn-success" name="back"><i class="fa fa-backward"></i> back</button></form>
    </div>
    <div class="container bootstrap snippets bootdeys">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default invoice" id="invoice">
                    <div class="panel-body">
                        <!-- <div class="invoice-ribbon">
                            <div class="ribbon-inner">PAID</div>
                        </div> -->
                        <div class="row">
                            <div class="col-sm-6 top-left">
                                <img src="logo.png" alt="" style="width:150px;height:100px;">
                            </div>
                            <div class="col-sm-6 top-right">
                                <h3 class="marginright">INVOICE-
                                    <?php echo $data['Pid'];?>
                                </h3>
                                <span class="marginright">
                                    <?php echo $data['Date'];?>
                                </span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-4 from">
                                <p class="lead marginbottom">From :
                                    <?php echo $data1['Sname'];?>
                                </p>
                                <p>
                                    <?php echo $data1['Sadd'];?>
                                </p>
                                <p>
                                    <?php echo $data1['Scity'];?>,
                                    <?php echo $data1['Spin'];?>
                                </p>
                                <p>Phone:
                                    <?php echo $data1['Scno'];?>
                                </p>
                                <p>Email:
                                    <?php echo $data1['Semail'];?>
                                </p>
                                <!-- <p>Email: <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                            data-cfemail="f2919d9c86939186b2968b9c9d948bdc919d9f">[email&#160;protected]</a>
                                                    </p> -->
                            </div>
                            <div class="col-xs-4 to">
                                <p class="lead marginbottom">To :
                                    <?php echo $data2['Rname'];?>
                                </p>
                                <p>
                                    <?php echo $data2['Radd'];?>
                                </p>
                                <p>
                                    <?php echo $data2['Rcity'];?>,
                                    <?php echo $data2['Rpin'];?>
                                </p>
                                <p>Phone:
                                    <?php echo $data2['Rcno'];?>
                                </p>
                                <p>Email:
                                    <?php echo $data2['Remail'];?>
                                </p>
                                <!-- <p>Email: <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                            data-cfemail="1e747176705e7a717b307d7173">[email&#160;protected]</a></p> -->
                            </div>
                            <div class="col-xs-4 text-right payment-details">
                                <p class="lead marginbottom payment-info">Payment details</p>
                                <p>Date:
                                    <?php echo $data['Date'];?>
                                </p>
                                <p>VAT: DK888-777 </p>
                                <p>Total Amount:
                                    <?php echo $data['Price'];?>
                                </p>
                                <!-- <p>Account Name: Flatter</p> -->
                            </div>
                        </div>
                        <div class="row table-row">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width:5%">#</th>
                                        <th style="width:50%">Item</th>
                                        <th class="text-right" style="width:15%">Quantity</th>
                                        <th class="text-right" style="width:15%">Weight</th>
                                        <th class="text-right" style="width:15%">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>
                                            <?php echo $data['Description'];?>
                                        </td>
                                        <td class="text-right">1</td>
                                        <td class="text-right">
                                            <?php echo $data['Weight'];?>
                                        </td>
                                        <td class="text-right">
                                            <?php echo $data['Price'];?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- <div class="row">
                                                <div class="col-xs-6 margintop">
                                                    <p class="lead marginbottom">THANK YOU!</p>
                                                    <a href="downloadpdf.php?file=gfgpdf">Download PDF Now</a>
                                                    <a href="download.php?MST_ID=<?php //echo $data['Pid']; ?>&ACTION=DOWNLOAD" class="btn btn-success"><i class="fa fa-download"></i> Download Invoice</a> 
                                                    <button class="btn btn-danger"><i class="fa fa-envelope-o"></i> Mail Invoice</button>
                                                </div>
                                            </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript"></script>

</body>

</html>