<?php
 include_once "../php/conn.php";
 session_start();
 if (!isset($_SESSION['userid'])) {
  header("Location: login.html?login=nologon");
}
if (($_SESSION['usrtype'])!='admin') {
  header("Location: login.html?login=notadmin");
}
$sql = "SELECT users.firstname, users.lastname,users.email FROM users
INNER JOIN devs ON devs.email = users.email AND devs.isverified='no';";
$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Admin | MAkeX</title>
    <link rel="shortcut icon" href="..\assets\icon.png">
    <style>
body{
  overflow: hidden;
}
      
    </style>
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-xl navbar-light  notnav" id="naav">
        <a class="navbar-brand pl-4" href="landing.php"><img src="..\assets\logo.png" width= 150 height= 65></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto h3">
            <a class="nav-item nav-link">
              <?php
                  echo '<div id="logg" style="display: flex;">
                    <img src="..\assets\adminicon.png" width="35"  style="font-size:25px ;margin-top:2px;margin-right:8px;" height="35" class="usr-btn ml-4">
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
         <div class="shadow-lg bg-white row top">
            <div class="col-12">
                <h2>Admin</h2>
            </div>
        </div>
    </div>
<div class="outer mx-5 rounded mt-3 p-3 " style="background-color:#efefef;height:100%;overflow-y:scroll;" id="out">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="pills-ver-tab" data-toggle="pill" href="#pills-ver" role="tab" aria-controls="pills-ver" aria-selected="true">Verification Requests</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile Reports</a>
      </li>
    </ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-ver" role="tabpanel" aria-labelledby="pills-ver-tab">
  <?php
      if($result){
        while($row = mysqli_fetch_array($result)){
           echo  '<div class="card mb-3">
              <div class="card-body d-flex">
                <h5 class="card-title">'.$row['firstname'].' '.$row['lastname'].'</h5>
                <p class="card-text ml-5">'.$row['email'].'</p>
                <a href="adminprof.php?prof='.$row['email'].'" class="btn btn-primary ml-auto">View Profile</a>
              </div>
            </div>';}}
            if(empty($row)){
          echo '<center><h3 style="color: #707070; margin-top: 200px;margin-bottom: 220px;">No Pending Requests!</h3></center>';
            }
         ?>   

  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

  </div>
</div>
</div>



<center><p style="color: #707070; margin-top: 20px;">© MakeX All rights reserved.</p></center>
</body>
</html>