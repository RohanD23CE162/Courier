<html>
<head> 
<link rel="stylesheet" href="login.css">

</head> 
<body>

  <div class="tile">
  <div class="tile-header">
    <h2 style="color: white; opacity: .75; font-size: 25px; display: flex; justify-content: center; align-items: center; height: 100%;">Forgot Password?</h2>
  </div>
  
  <div class="tile-body">
    <form id="form" method="POST" action="newpass1.php">
        <label class="form-input">
            <i class="material-icons">lock</i>
            <input type="password" name="pass1" required />
            <span class="label">New Password</span>
            <div class="underline"></div>
        </label>
        <label class="form-input">
            <i class="material-icons">lock</i>
            <input type="password" name="pass2" required />
            <span class="label">Confirm Password</span>
            <div class="underline"></div>
         </label>
      
      <div class="submit-container clearfix" style="margin-top: 2rem;">  
        <input id="submit" class="btn btn-irenic float-right" tabindex="0" type="submit" name="submit" value="Submit">
      </div>
    </form>
  </div>
</div>
</body>
</html>
 
