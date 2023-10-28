<?php 
include("connect.php");
session_start();
error_reporting(0);
?>
        <table border="1">
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

<?php 

        $filename="Report";
        $date1=$_SESSION['date1'];
        $date2=$_SESSION['date2'];	
        $sta=$_SESSION['Status'];
        if($sta=="All")	
        {                                
            $query = "select * from package where date between '$date1' and '$date2' ";
        }                            
        else{
            $query = "select * from package where date between '$date1' and '$date2' &&  Status='$sta' ";
        }	
        //$query = "select * from package where date between '$date1' and '$date2'";
        $result = mysqli_query($con,$query);
        if(mysqli_num_rows($result) > 0 )
        {
                while ($row=mysqli_fetch_array($result)) 
                { 
                $query1="SELECT * FROM `sender` WHERE Sid='$row[Sid]'";
                $stat1 = mysqli_query($con,$query1);
                $data1 = mysqli_fetch_array($stat1);

                $query2="SELECT * FROM `receiver` WHERE Rid='$row[Rid]'";
                $stat2 = mysqli_query($con,$query2);
                $data2 = mysqli_fetch_array($stat2);
                
                echo '  
                <tr>  
                <td>'.$Pid= $row['Pid'].'</td> 
                <td>'.$Date= $row['Date'].'</td> 	
                <td>'.$Description= $row['Description'].'</td>
                <td>'.$from= $data1['Sadd'].'</td>		
                <td>'.$to= $data2['Radd'].'</td>
                <td>'.$Weight= $row['Weight'].'</td>
                <td>'.$Price= $row['Price'].'</td>
                <td>'.$Status= $row['Status'].'</td>
                </tr>  
                ';
                header("Content-type: application/octet-stream");
                header("Content-Disposition: attachment; filename=".$filename.".docs");
                header("Pragma: no-cache");
                header("Expires: 0");
                }
        }
?>
</table>