<?php
    session_start();
    include('connect.php');
    function otpx($length=6)
    {
        $char='0123456789ABCDEFGHJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz';
        $otp='';
        for($i=0;$i<$length;$i++){
            $otp.=$char[mt_rand(0,strlen($char)-1)];
        }
        return $otp;
    }
    $otp=otpx(6);
    $user=$_POST['uname'];
    
    $query="select Semail from sender where Sname='$user'";
    $cmd=mysqli_query($con,$query);
    $ans=mysqli_fetch_array($cmd,MYSQLI_ASSOC);
    
    if(isset($ans)==1)
    {
        $_SESSION['table']="sender";
        $email=$ans['Semail'];
    }
    else
    {
        $query1="select Eemail from employee where Ename='$user'";
        $cmd1=mysqli_query($con,$query1);
        $ans1=mysqli_fetch_array($cmd1,MYSQLI_ASSOC);
        
        if($cmd1)
        {
            $_SESSION['table']="employee";
            $email=$ans1['Eemail'];
            
        }
        else
        {
            header("location:forgotpass.html");
        }
    }
    $x=mail("$email","Courier Guy ","Hi! Your OTP code is: $otp");
    $_SESSION['otp']=$otp;
    $_SESSION['user']=$user;
    $_SESSION['text']="Enter New Password";
    header("location:otp1.php");
?>