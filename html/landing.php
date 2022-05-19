<?php
 include_once "../php/conn.php";
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="..\css\landing.css">
    <link rel="shortcut icon" href="..\assets\icon.png">
    <title>MakeX</title>
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    
    
    <nav class="navbar navbar-expand-xl navbar-light  notnav" id="naav">
        <a class="navbar-brand pl-4" href="#"><img src="..\assets\logo.png" width= 150 height= 65></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto h3" >
            <a class="nav-item nav-link mr-5 font-weight-normal" href="devhome.php">Home</a>
            <a class="nav-item nav-link mr-5 font-weight-normal" href="#pricing">Pricing</a>
            <a class="nav-item nav-link mr-5 font-weight-normal" href="#thingsdone">How It Works</a>
            <a class="nav-item nav-link mr-5 font-weight-normal" href="about.html" target="_blank">About Us</a>
            <a class="nav-item nav-link">
              <?php
                if (!isset($_SESSION['userid'])) {
                  echo '<div id="log" style="display: flex;">
                      <img src="..\assets\user1.png" width="35" height="35" class="usr-btn">
                      <a href="login.html" class="log-exp">Login</a>
                      <a href="signup.html" class="log-exp">Signup</a>
                  </div>';
                }
                else
                {
                  echo '<div id="logg" style="display: flex;">
                    <img src="..\assets\user1.png" width="35"  style="font-size:25px ;margin-top:2px;margin-right:8px;" height="35" class="usr-btn ml-4">
                    <div class="dash-name " style="font-size:24px ;margin-top:3px; margin-right:2px;font-weight:400;">';
                  $name=$_SESSION['fname'];
                  echo"$name";
                  echo '</div>
                  <button type="button" class="btn btn-outline-dark ml-4" onclick="window.location.href=\'../php/logout.php\'">Logout</button>
                  </div>';
                }
              ?>
            </a>
          </div>
        </div>
    </nav>
    <div class="conatiner-fluid p-5 ">
        <div class="row ">
            <div class="col-lg-6 text-left  p-5 ">
                    <span class="display-4 d-block pb-2">Find the best digital talent for  your project.</span>
                    <br>
                    <span class="lead d-block d-block  text-muted">MakeX directs you easily and quickly to the <br> best talent able to realize your idea.</span>
                    <br>
                    <button class="btn btn1">Learn More</button>
            </div>
            <div class="col-lg-6 ">
                <img src="..\assets\findingtalent.png" alt="" class="img-fluid">
            </div>
        </div>
    </div>
    
    <div class="conatiner-fluid p-5 shadow-lg  mb-5 bg-white anyone mx-lg-5 mx-2">
        <div class="row ">
            <div class="col-lg-6 text-left order-2 p-5 ">
                    <span class="display-4 d-block pb-2 create">Create anything, for anyone.</span>
                    <br>
                    <span class="d-block lead font-weight-normal text-muted">MakeX allows you to build a website/software that meets your unique needs. Start a blog, business site, portfolio, online store, or anything else you can imagine.</span>
                    <br>
                    <span class="d-block lead font-weight-normal text-muted">With built-in optimization and responsive, mobile-ready themes, there’s no limit to who you can reach with your new application. Create a simple website for your family or sell products around the world—it’s up to you.</span>
            </div>
            <div class="col-lg-6">
                <img src="..\assets\find2.png" alt="" class="img-fluid">
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row text-center mb-4" id="thingsdone">
            <div class="col-12">
                <img src="../assets/somethingdone.png" alt="" class="img-fluid">
            </div>
        </div>
    </div>
    
    <div class="conatiner-fluid p-5 shadow-lg  mb-5 bg-white anyone mx-lg-5 mx-2 wow-par" id="pricing">
        <div class="row ">
            <div class="col-lg-6 text-left p-5 ">
                    <span class="display-4 d-block pb-2 plan">Plans that fit your needs.</span>
                    <br>
                    <span class=" d-block lead font-weight-normal text-muted">No matter the size of your budget, MakeX has a plan that’s right for you.</span>
                    <br>
                    <span class=" d-block lead font-weight-normal text-muted ">You can choose from one of three affordable plans. With 
                        each plan you’ll get storage and priority support. Some 
                        plans also include advanced design customization, 
                        monetization tools, and the ability to upload custom 
                        MakeX plugins or themes.</span>
                </div>
            <div class="col-lg-6" >
                <img src="..\assets\saving.png" alt="" class="img-fluid">
            </div>
        </div> 
    </div>
    
    <div class="container-fluid text-center wow " >
        <div class="row  justify-content-md-start mr-5" >
            <a href="#" class="text-decoration-none">
                <div class="col-lg-2 offset-lg-2 p-0 ">
                <div class="card h-200 price  shadow-lg  mb-5 bg-white" style="width:20rem;">
                    <img class="card-img-top crd" src="../assets/basic.png" alt="">
                    <div class="card-body">
                      <h5 class="card-title text-muted"><i class="fa fa-check-circle"  style="color:#9B6FF8 ;"></i> &nbsp1-3 Developers</h5>
                      <h5 class="card-title text-muted"><i class="fa fa-check-circle"  style="color:#9B6FF8 ;"></i> &nbspDelivery by 4 Weeks</h5>
                    </div>
                  </div>
                </a>
            </div>
    
            <div class="col-lg-2 offset-lg-1 p-0">
                <a href="#" class="text-decoration-none">
                <div class="card h-200 price shadow  mb-5 bg-white" style="width:20rem;">
                <img class="card-img-top crd" src="../assets/standard.png" alt="C">
                    <div class="card-body">
                      <h5 class="card-title text-muted"><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i> &nbsp1-6 Developers</h5>
                      <h5 class="card-title text-muted"><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i> &nbspDelivery by 2 Weeks</h5>
                    </div>
                  </div>
                </a>
            </div>
    
            <div class="col-lg-2 offset-lg-1  p-0 ">
                <a href="#" class="text-decoration-none">
                <div class="card h-200 price  shadow-lg  mb-5 bg-white" style="width: 20rem;">
                    <img class="card-img-top crd" src="../assets/premium.png" alt="">
                    <div class="card-body">
                      <h5 class="card-title text-muted"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbsp 1-8 Developers</h5>
                      <h5 class="card-title text-muted"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbsp Delivery by 1 Weeks</h5>
                    </div>
                </div>
            </a>
            </div>
        </div>
        <div class="row text-center mt-5 pt-5">
            <div class="col-12">
                <img src="../assets/speak.png" alt="" class="img-fluid">
            </div>
        </div>
    </div>
    
    
    <!-- Footer -->
    <footer class="page-footer font-small pt-4 bg-dark text-white cool">
        <div class="container-fluid text-center text-md-left">
          <div class="row">
            <div class="col-md-6 mt-md-0 mt-3">
                <h5 class="">MakeX</h5>
              <p>🎯</p>
            </div>
      
            <hr class="clearfix w-100 d-md-none pb-3">
            <div class="col-md-3 mb-md-0 mb-3">
                <ul class="list-unstyled">
                <li>
                  <a href="#naav">Home</a>
                </li>
                <li>
                  <a href="#thingsdone">How It Works</a>
                </li>
              </ul>
            </div>
           
            <div class="col-md-3 mb-md-0 mb-3">
                <ul class="list-unstyled">
                <li>
                  <a href="#!">Privacy policy</a>
                </li>
                <li>
                  <a href="about.html" target="_blank">About Us</a>
                </li>
              </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
          <a href="../html/landing1.html"> ✨MakeX</a>
    </div>
    </footer>
    </body>
    </html>