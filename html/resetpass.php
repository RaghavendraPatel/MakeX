<?php
 include_once "../php/conn.php";
 session_start();
 if (!isset($_SESSION['usermail'])) {
    header("Location: forgotpass.php?");
  }

if(isset($_POST['resetsubmit'])){
    session_start();
    $usee=$_SESSION['usermail'];
    $newp = $_POST['newpass'];
    $hashedPwd=password_hash($newp,PASSWORD_BCRYPT);
    $query = "UPDATE users SET password='$hashedPwd' WHERE email = '$usee'";
    $result = mysqli_query($conn, $query);
    session_unset();
    session_destroy();
    session_write_close();
    header("location:login.html?passwordchange=success");
    exit();
    
    }

  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="shortcut icon" href="..\assets\icon.png">
    <title>Reset Password&nbsp;| MakeX</title> 
    <style>
        html{
            overflow: auto;
            font-family: google sans;
        }
        .alert{
            display: none;
        }
    </style>


    <script>
    function ValidatePassword(){

        var pwd = document.getElementById('newpass').value;
        var pwdformat =/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[a-zA-Z!#$*%&? "])[a-zA-Z0-9!#$%*&?]{6,20}$/ ;
        if(pwdformat.test(pwd)==false||(document.getElementById('newpass').value)=="")
        {
            document.getElementById('pass-regx').style.display='block';
            return true;
        }
        else
        {
            document.getElementById('pass-regx').style.display='none';
            return false;
        }

    }

    function pwdmatch() {
        var pwd = document.getElementById('newpass').value;
        var cnfpwd = document.getElementById('cnfnewpass').value;
        if(pwd!=cnfpwd || pwd==" " || cnfpwd==" ")
        {
            document.getElementById('pwd-match').style.display='inline';
            return false;
        }
        else
        {
            document.getElementById('pwd-match').style.display='none';
            return true;
            
        }
    }



    
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-xl navbar-light  notnav" id="naav">
        <a class="navbar-brand pl-4" href="landing.php"><img src="..\assets\logo.png" width= 150 height= 65></a>
    </nav>  
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 ">
                <img src="../assets/fpass.png" alt="" class=" ">
            </div>
            <div class="col-lg-6 align-self-center p-5 form-group">
                <form action="#" method="POST" >
                    <div class="form-group">
                        <label class="display-4 font-weight-bold">Reset<br>Your Password.</label>
                            <input type="password" name="newpass"  onblur="ValidatePassword();" class="form-control my-4" id="newpass"  style="border-radius:10px;height:60px; background-color:#D4E5F5" placeholder="Enter New Password" required>
                            <input type="password" name="cnfnewpass" onblur="pwdmatch();" class="form-control my-4" id="cnfnewpass"  style="border-radius:10px;height:60px; background-color:#D4E5F5" placeholder="Confirm New Password" required>
                            <input name="resetsubmit" style="border-radius:10px;" class="btn btn-lg btn-primary btn-block "  type="submit">
                    </div>
                </form>
            <div> 
            <div id="pass-regx" class="alert alert-danger" style="border-radius:10px;" role="alert" >
                <i class="fas fa-times-circle"></i>&nbsp6-20 Characters, One uppercase character,One lowercase character and One digit, One special character
            </div>
            <div id="pwd-match" class="alert alert-danger mt-3" style="border-radius:10px;" role="alert" >
                <i class="fas fa-times-circle"></i>&nbspPasswords not matching
            </div>
        </div>         
    </div>
    </div>
    <center><p style="color:black; margin-top: 40px;">© MakeX All rights reserved.</p></center>
</body>
</html>