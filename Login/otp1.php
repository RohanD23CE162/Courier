<html>
<head> 
  <link rel="stylesheet" href="otp1.css">
</head> 
<body>
  <div class="tile">
  <div class="tile-header">
    <h2 style="color: white; opacity: .75; font-size:25px; display: flex; justify-content: center; align-items: center; height: 100%;">Forget  Password?</h2>
  </div>
  <div class="tile-body">
   Your OTP has Been sent to Your registered E-mail Address.
   <form id="form" method="POST" action="otp2.php">
    <div class="input-field">
      <input type="text" name="otp" placeholder="Enter otp"/>
  
    </div>
    <div class="submit-container clearfix" style="margin-top: 2rem;">
        <input id="submit" class="btn btn-irenic float-right" tabindex="0" type="submit" name="login" value="Login">
      </div>
  </form>
  </div>
</div>
</body>
</html>
 
