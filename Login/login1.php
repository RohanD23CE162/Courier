<?php

    session_start();
    include('connect.php');
    $user=$_POST['uname'];
    $pass=$_POST['pass'];
    
    $query="select * from sender where Sname='$user'";
    $cmd=mysqli_query($con,$query);
    $pass1=mysqli_fetch_array($cmd,MYSQLI_ASSOC);
    $_SESSION['uname']=$user;
    $_SESSION['pass']=$pass;
    if($pass==$pass1["Password"])
    {
        $_SESSION['xid']=$pass1['Sid'];
        $_SESSION['xname']=$pass1["Sname"];
        header("location:/Sender/viewpackage1.php");
    }
    else
    {
        $query="select * from employee where Ename='$user'";
        $cmd=mysqli_query($con,$query);
        $pass1=mysqli_fetch_array($cmd,MYSQLI_ASSOC);
        if($pass==$pass1["Password"])
        {
            $_SESSION['xname']=$pass1["Ename"];
            $_SESSION['xid']=$pass1["Eid"];
            if($user=="Admin")
            {   
                header("location:/Admin/Dashboard.php");
            }
            else
            {
                header("location:/Employee/Dashboard.php");
            }
        }
        else
        {
             echo '<script type="text/javascript"> '; 
            echo '  if (confirm("Invalid Username and Password !")) {';  
            echo '    document.location = "login.html";';  
            echo '  }';  
            echo '</script>'; 
        }
    }
?>