<?php
    session_start();
    $otpx=$_POST['otp'];
    $_SESSION['text']="not";
    
    if($otpx==$_SESSION['otp'])
    {
        header("location:newpass.php");
    }
    else
    {
        echo "error";
    }
?>