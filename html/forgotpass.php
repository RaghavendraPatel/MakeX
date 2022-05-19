<?php
 include_once "../php/conn.php";
 session_start();
 if (isset($_SESSION['userid'])) {
    header("Location: landing.php?logged-in");
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
    <title>Forgot Password&nbsp;| MakeX</title> 
    <style>
        html{
            overflow: auto;
            font-family: google sans;
        }
        .alert{
            display: none;
        }
       #bad-mail,#good-mail,#good-otp,#fill-mail,#exp-otp,#reset-karo{

           display:none;
       }
    </style>
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
            <div class="col-lg-6 align-self-center p-5">
                <form action="../php/mailer.php" method="POST">
                    <div class="form-group">
                        <label class="display-4 font-weight-bold" for="InputEmail">Forgot<br>Your Password?</label>
                        <?php 
                        if (isset($_GET['mail'])){
                            $mail=$_GET['mail'];
                            $_SESSION['usermail']=$mail;
                            echo '<input type="email" readonly name="email" class="form-control my-4" id="InputEmail"  style="border-radius:10px;height:60px; background-color:#D4E5F5" value="'.$mail.'">';
                        }
                        else{
                            echo '<input type="email" name="email" class="form-control my-4" id="InputEmail"  style="border-radius:10px;height:60px; background-color:#D4E5F5" placeholder="Enter email">';
                            echo '<input name="recover-submit" style="border-radius:10px;" class="btn btn-lg btn-primary btn-block " value="Reset Password" type="submit">';
                        }
                        ?>
                        
                      </div>
                </form>
            <div> 
            <div id="fill-mail" class="alert alert-danger" style="border-radius:10px;" role="alert" >
                <i class="fas fa-times-circle"></i>&nbspPlease fill your E-mail!
            </div>
            <div id="bad-mail" class="alert alert-danger" style="border-radius:10px;" role="alert" >
                <i class="fas fa-times-circle"></i>&nbspPlease check your E-mail!
            </div>
            <div id="good-mail"> 
                    <form action="../php/otpchecker.php" method="POST">
                        <label class="lead" for="Inputotp">Enter OTP</label>
                        <input type="hidden" name="userma" value="<?php echo $_SESSION['usermail'];?>">
                        <input type="text" name="otp" class="form-control " id="Inputotp"  style="border-radius:10px;height:60px; background-color:#D4E5F5" placeholder="Enter OTP">
                        <input name="otp-submit-btn" style="border-radius:10px;" class="btn btn-lg btn-success btn-block mt-4"  type="submit">
                    </form>
                </div>
                <div id="bad-otp" class="alert alert-danger mt-3" style="border-radius:10px;" role="alert" >
                    <i class="fas fa-times-circle"></i>&nbspPlease check your OTP!
                </div>
                <div id="exp-otp" class="alert alert-danger" style="border-radius:10px;" role="alert" >
                    <i class="fas fa-times-circle"></i>&nbspOTP expired please Retry
                </div>
                </div>
                
                  
                <div class="d-flex  justify-content-center mt-4">
                    <a class="text-muted" href="../html/login.html">Back to Login</a>
                </div>
            </div>
            </div>
    </div>
    <center><p style="color:black; margin-top: 40px;">© MakeX All rights reserved.</p></center>
    <?php
                    $fullURL="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    if(strpos($fullURL,"email=empty")==true){
                        echo "<script>document.getElementById('fill-mail').style.display='block'</script>";
                        exit();
                
                    }

                    if(strpos($fullURL,"email=success")==true){
                        echo "<script>document.getElementById('good-mail').style.display='block'</script>";
                        exit();
                
                    }
                    if(strpos($fullURL,"email=invalid")==true){
                        echo "<script>document.getElementById('bad-mail').style.display='block'</script>";
                        exit();
                
                    }
                    if(strpos($fullURL,"email=otpinvalid")==true){
                        echo "<script>document.getElementById('bad-otp').style.display='block'</script>";
                        echo "<script>document.getElementById('good-mail').style.display='block'</script>";
                        exit();
                
                    }
                    if(strpos($fullURL,"email=otpexpired")==true){
                        echo "<script>document.getElementById('exp-otp').style.display='block'</script>";
                        exit();  
                    }


                ?>
   
</body>
</html>