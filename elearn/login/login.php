<?php include("/../connect/connect.php") ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="login/login.css">

</head>
<body>

<div class="header">
</div>

<div class="row">
  <div class="col-3 col-s-3 menu">
  </div>

  <div class="col-6 col-s-9">
    <div id="logbox">
      <h1 style="font-size: 40px">Welcome</h1>
        <img width="250" height="290" id="optionalstuff" src="window.png">
        <div id="log">
            <div class="tab">
              <button class="tablinks" onclick="openLogin(event, 'Login')" id="defaultOpen">Sign In</button>
              <button class="tablinks" onclick="openLogin(event, 'Logup')">Sign Up</button>
            </div>

            <div id="Login" class="tabcontent">
              <form method="POST" class="signin">
                <input type="radio" value="student" name="loginto" checked>Student 
                <input type="radio" value="teacher" name="loginto">Teacher<br><br>
                <input class="signin" type="text" placeholder="User ID" name="user" required><br>
                <input class="signin" type="password" placeholder="Password" name="pass" required><br><br>
                <button class="bsignin" name="login"><span>Login</span></button>
              </form>
            </div>
            
            <div id="Logup" class="tabcontent">
              <form method="POST" class="signup">
                <input type="radio" checked>Student<br>
                <input placeholder="First Name" class="signup" type="text" name="first" required><br>
                <input placeholder="Middle Name" class="signup" type="text" name="middle" required><br>
                <input placeholder="Last Name" class="signup" type="text" name="last" required><br><br>
                <input type="text" placeholder="Student ID" class="signup" name="sid" required><br>
                <select class="signup" name="sem" required>
                  <option value="no">Select Semester</option>
                  <?php
                  $qry="SELECT * from semsub";
                  $ret=mysql_query($qry);
                  if(mysql_num_rows($ret)>0)
                  {
                    while($row=mysql_fetch_assoc($ret))
                    {
                      ?>
                      <option value="<?php echo $row['semester']; ?>"><?php echo $row['semester']; ?></option>
                      <?php
                    }
                  }
                  ?>
                </select><br>
                <input class="signup" placeholder="Mobile Number" type="telephone" minlength="10" maxlength="10" name="sphone" required><br>
                <label>Date Of Birth: </label><input type="date" class="signup" name="dob" required><br>
                <input type="password" minlength="8" placeholder="Password" class="signup" name="spass" required><br>
                <button name="create" class="bsignup"><span>Create</span></button>
              </form>
            </div>
          
        </div>
    </div>
  </div>

  <div class="col-3 col-s-12">
  </div>
</div>

 <script src="login/login.js"></script> 

</body>
</html>

<?php
include("verify.php");
?>