<?php
    session_start();
    include('connect.php');
    $user=$_SESSION['user'];
    $pass1=$_POST['pass1'];
    $pass2=$_POST['pass2'];
    if($pass1==$pass2)
    {
        if($_SESSION['table']=="sender")
        {
            $query="UPDATE sender SET Password = '$pass1' WHERE Sname='$user'";
            $cmd=mysqli_query($con,$query);
            if($cmd)
            {
                header("location:login.html");
            }
            else
            {
                echo "error";
            }
        }
        else
        {
            $query="UPDATE employee SET Password = '$pass1' WHERE Ename='$user'";
            $cmd=mysqli_query($con,$query);
            if($cmd)
            {
                header("location:login.html");
            }
            else
            {
                echo "error";
            }
        }
    }
    else
    {
        echo '<script type="text/javascript"> '; 
        echo '  if (confirm("Both Password must be same")) {';  
        echo '    document.location = "newpass.php";';  
        echo '  }';  
        echo '</script>';  
    }
?>