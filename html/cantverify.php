<?php
 include_once "../php/conn.php";
 session_start();
 if (!isset($_SESSION['userid'])) {
    header("Location: login.html?noLogon"); 
 }
 if($_SESSION['usrtype']=='cust'){
    header("Location: custhome.php?not%20developer");}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <title>Profile not verified</title>
    <link rel="shortcut icon" href="..\assets\icon.png">
    <style>


    </style>
</head>
<body onload="maxdatefix()">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="../js/profile.js"></script>
    <nav class="navbar navbar-expand-xl navbar-light  bg-light notnav" id="naav">
        <a class="navbar-brand pl-4" href="landing.php"><img src="..\assets\logo.png" width= 150 height= 65></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto h3">
            <a class="nav-item nav-link">
              <?php
                  echo '<div id="logg" style="display: flex;">
                    <img src="..\assets\user1.png" width="35"  style="font-size:25px ;margin-top:2px;margin-right:8px;" height="35" class="usr-btn ml-4">
                    <div class="dash-name Lead" style="font-size:23px ;margin-top:3px; margin-right:2px;font-weight:400;">';
                  $name=$_SESSION['fname'];
                  echo"$name";
                  echo '</div>
                  <button type="button" class="btn btn-outline-dark ml-4 mr-3" onclick="window.location.href=\'../php/logout.php\'">Logout</button>
                  </div>';
              ?>
            </a>
          </div>
        </div>
    </nav>
    <div class="container-fluid">
         <div class=" bg-white row">
            <div class="col-md-8 ">
                <img src="../assets/cantverifybg.png" class="img-fluid" alt="">
            </div> 
            <div class="col-md-4  d-flex align-self-center ">
                <div>
                <p class="display-4 font-weight-bold ">Profile <br>Can't be Verified!</p>
                <p class="text-muted ">Try Updating your profile.</p>
                <button type="button" class="btn btn-dark" onclick="location.href='updateprofile.php'">Update Profile</button>
               </div>
            </div>
        </div>
    </div>

    <center><p style="color: #707070; margin-top: 40px;">© MakeX All rights reserved.</p></center>


</body>
</html>