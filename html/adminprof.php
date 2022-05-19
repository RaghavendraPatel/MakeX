<?php
 include_once "../php/conn.php";
 session_start();
 if (!isset($_SESSION['userid'])) {
    header("Location: login.html?login=nologon");
}
if (($_SESSION['usrtype'])!='admin') {
    header("Location: login.html?login=notadmin");
}
if(isset($_GET['prof'])){
    $id=$_GET['prof'];
    $sql1="SELECT firstname,lastname FROM users where email='$id'";
    $sql2="SELECT * FROM devs WHERE email='$id' AND isverified='no'";
    $result1=mysqli_query($conn,$sql1);
    $result2=mysqli_query($conn,$sql2);
    $row1 = mysqli_fetch_array($result1);
    $row2 = mysqli_fetch_array($result2);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Admin | MAkeX</title>
    <link rel="shortcut icon" href="..\assets\icon.png">
</head>
<body onload="maxdatefix(); user();">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
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
            <div class="col-12 d-flex">
                <button onclick="window.location.href='admin.php'" type="button" class="btn btn-primary mr-4">Go Back</button>
                <h2><?php echo $row1['firstname']."'".'s'.' '.'profile';?></h2>
            </div>
        </div>
    </div>

    <div class="rounded  bg-light container mt-3 p-3 d-flex justify-content-center">
    <?php 
        
        if($row1 && $row2) {
        $namee=$row1['firstname'].' '.$row1['lastname'];
        echo '<form class="form w-75 mt-3" action="../php/adminmanage.php" method="POST">  
        <div class="coo">
            <div class="form-group mb-4">
                <label for="Name">Name</label>
                <input type="text" class="form-control" id="Name" value="'.$namee.'" readonly>
            </div>
            <div class="form-group mb-4">
                <label for="Name">Email</label>
                <input type="text" class="form-control" name="mail" id="Name" value="'.$row2['email'].'" readonly>
            </div>
            <div class="form-group mb-4">
                <label for="Name">DOB</label>
                <input type="text" class="form-control" id="Name" value="'.$row2['dob'].'" readonly>
            </div>
            <div class="form-group mb-4">
                <label for="Name">Highest Education</label>
                <input type="text" class="form-control" id="Name" value="'.$row2['education'].'" readonly>
            </div>
            <div class="form-group mb-4">
                <label for="Name">Skills</label>
                <input type="text" class="form-control" id="Name" value="'.$row2['skills'].'" readonly>
            </div>
        </div>
        <div class="co">
            <div class="form-group mb-4">
                <label for="Name">Experience</label>
                <input type="text" class="form-control" id="Name" value="'.$row2['expp'].' '. 'years'.'" readonly>
            </div> 
            <div class="form-group mb-4">
                <label for="Name">Accomplishments</label>
                <textarea class="form-control" rows="6" id="Name" readonly>'.$row2['accomp'].'</textarea>
            </div>
            <div class="form-group mb-4">
                <label for="Name">Prosopography</label>
                <textarea class="form-control" rows="6" id="Name" readonly>'.$row2['prospo'].'</textarea>
            </div>
            <button type="submit" class="btn btn-success mb-3 mr-2" name="verify">Verify account</button>
            <button type="submit" class="btn btn-outline-danger mb-3" name="decline">Decline</button>
        </div>
    </form>';
    
    }
    
    ?>   
    </div>
    


<center><p style="color: #707070; margin-top: 20px;">© MakeX All rights reserved.</p></center>
</body>
</html>