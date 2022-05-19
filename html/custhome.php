<?php
 include_once "../php/conn.php";
 session_start();
 if (!isset($_SESSION['userid'])) {
     header("Location: login.html?noLogon");
}
$email=$_SESSION['userid'];
 if (($_SESSION['usrtype'])=='admin') {
    header("Location: admin.php");
  }
 if($_SESSION['usrtype']=='dev')
     header("Location: devhome.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
        <link rel="stylesheet" href="..\css\home.css">
        <link rel="shortcut icon" href="..\assets\icon.png">
        <title>Home&nbsp;| MakeX</title>  
    </head>
    <body onload="document.getElementById('item2').click()">
        <script src="..\js\custhome.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <div class="outer">
            <div class="left">
                <a href="landing.php">
                   <img src="..\assets\logo.png" width= 150 height= 65 style="margin-left:75px ;">
                </a>

                <!-- <div onclick="openPage('daash', this);dash()"  id="item1"  class="dash-ele ">
                    <i class="fas fa-2x fa-tachometer-alt"></i>
                    <span class="dash-name">Dashboard</span>
                </div> -->

                <div onclick="openPage('projects', this);project()" id="item2" class="dash-ele"> 
                    <i class="fas fa-2x fa-cubes"></i>
                    <span class="dash-name">Projects</span>
                </div>

                <div onclick="openPage('plans', this);plans()"  id="item3" class="dash-ele">
                    <i class="fas fa-2x fa-paper-plane"></i>
                    <span class="dash-name">Plans</span>
                </div>

                <div onclick="openPage('setting', this);settings()"  id="item4" class="dash-ele">
                    <i class="fas fa-2x fa-sliders-h"></i>
                    <span class="dash-name">Settings</span>
                </div>

                <div onclick="window.location.href='../php/logout.php'" type="submit" class="dash-ele">
                    <i class="fas fa-2x fa-sign-out"></i>
                    <span class="dash-name">Logout</span>
                </div>
                <div class="sp"></div>
                <div class="dash-usr">
                    <div><i class="fas fa-3x fa-user-circle"></i></div>
                    <div class="dash-name" style="font-size:24px">
                        <?php
                            $name=$_SESSION['fname']." ".$_SESSION['lname'];
                            echo"$name";
                        ?>
                        <p style="font-size:12px">Customer</p>
                    </div>
                </div> 
            </div>
            <div class="center">
                <div class="center-usr">
                    <div><i class="fas fa-4x fa-user-circle"></i></div>
                    <div class="dash-name" style="font-size:28px ;margin-top:-6px;">
                        <?php
                            $name="Hello, ".$_SESSION['fname'];
                            echo"$name";
                        ?>
                        <p style="font-size:16px;">Have a nice Day!!</p>
                    </div>
                </div>
                <div class="center-content">
                    <!-- <div id="daash" class="tabcontent" style="width:100%; height:110%;overflow-y:scroll;">
                    </div> -->

                    <div id="projects" class="tabcontent" style="width:100%; height:100%; ">
                        <?php 
                            if(!isset($_SESSION['plan'])){
                                $lol = "openPage('plans', this);plans()";
                            }
                            else{
                                $lol = "next('empty')";
                            }
                            $sql = "SELECT nop from cust where email = '$email'";
                            $result = mysqli_query($conn,$sql);
                            $row = mysqli_fetch_array($result);
                            $sql1 = "SELECT * from project where email ='$email'";
                            $result1 = mysqli_query($conn,$sql1);
                            echo '<script>console.log('.$row['nop'].')</script>';
                            if($row['nop']<1){
                                echo '
                                <div class="empty shadow" id="empty">
                                    <p class="em"style="font-size:50px;">Nothing In Here</p>
                                    <p class="em"style="font-size:30px;margin-bottom: 70px;">Try creating a new project</p>
                                    <div class="create-btn" onclick="'.$lol.'">
                                        <i class="fas fa-1x fa-plus"></i>
                                        <span style="font-size:20px;">&nbsp Create Project</span> 
                                    </div>
                                </div>
                                ';
                            }
                            else{
                                echo '
                                <div class="not_empty" style="margin-bottom:50px" id="empty">
                                    <div class="d-flex">
                                        <span style="font-size:42px;top:-12px;position:relative;">Projects</span>
                                        <button type="button" class="ml-auto create-btn1" onclick="next(\'empty\')"><i class="fas fa-1x fa-plus"> </i> <span style="font-size:20px;">&nbsp Create Project</span> </button>
                                    </div>
                                    <div class="rounded bg-light border">
                                        <div>
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#all" role="tab" aria-controls="home" aria-selected="true">All</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#ongoing" role="tab" aria-controls="profile" aria-selected="false">Ongoing</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="contact" aria-selected="false">Completed</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#notapproved" role="tab" aria-controls="contact" aria-selected="false">Not Approved</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-content" id="myTabContent" style="overflow-y: auto;">
                                            <div class="nav-content tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="home-tab">';
                                                if($result1){
                                                    while($all = mysqli_fetch_array($result1)){
                                                        echo '
                                                        <div class="card mb-3 collapsed" onclick="window.location.href=\'viewproject.php?pid='.$all['pid'].'\'">
                                                            <div class="card-body" id="a2" style="display: flex;" onclick="exp(\'a1\',\'a2\')">
                                                                <div style="display:inline-block;max-width: 85%;">
                                                                    <span style="font-size:22px">'.$all['pname'].'&nbsp </span><span style="font-size:18px">('.$all['domain'].')</span>
                                                                    <span style="font-size: 12px;">&nbsp &nbspSomeone</span><br>
                                                                    <span id="desc"style="font-size: 14px;color:#707070" class="truncate">'.$all['descr'].'</span>
                                                                </div>
                                                                <div class="ml-auto">
                                                                    <div>
                                                                        <span style="font-size: 14px;">'.$all['due'].'</span><br>
                                                                    </div>';
                                                                    if($all['is_approved']=='no'){
                                                                        echo'
                                                                        <div class="mt-5 text-warning">
                                                                            <span style="font-size: 14px;">Not Approved</span>
                                                                        </div>';
                                                                    }
                                                                    else if($all['is_approved']=='yes'&&$all['is_completed']=='no'){
                                                                        echo'
                                                                        <div class="mt-5 text-primary">
                                                                            <span style="font-size: 14px;">Ongoing</span>
                                                                        </div>';
                                                                    }
                                                                    else{
                                                                        echo'
                                                                        <div class="mt-5 text-success">
                                                                            <span style="font-size: 14px;">Completed</span>
                                                                        </div>';
                                                                    }
                                                                    echo'
                                                                </div>
                                                            </div>
                                                        </div>';
                                                    }
                                                }
                                                echo '
                                                </div>
                                                <div class="nav-content tab-pane fade" id="ongoing" role="tabpanel" aria-labelledby="profile-tab">';
                                                $result2 = mysqli_query($conn,$sql1);
                                                if($result2){
                                                    while($ongiong = mysqli_fetch_array($result2)){
                                                        if($ongiong['is_approved']=='yes' && $ongiong['is_completed']=='no'){
                                                            echo '
                                                            <div class="card mb-3 collapsed" onclick="window.location.href=\'viewproject.php?pid='.$ongiong['pid'].'\'">
                                                                <div class="card-body" id="a2" style="display: flex;" onclick="exp(\'a1\',\'a2\')">
                                                                    <div style="display:inline-block;max-width: 85%;">
                                                                        <span style="font-size:22px">'.$ongiong['pname'].'&nbsp </span><span style="font-size:18px">('.$ongiong['domain'].')</span>
                                                                        <span style="font-size: 12px;">&nbsp &nbspSomeone</span><br>
                                                                        <span id="desc"style="font-size: 14px;color:#707070" class="truncate">'.$ongiong['descr'].'</span>
                                                                    </div>
                                                                    <div class="ml-auto">
                                                                        <div>
                                                                            <span style="font-size: 14px;">'.$ongiong['due'].'</span><br>
                                                                        </div>
                                                                        <div class="mt-5 text-primary">
                                                                            <span style="font-size: 14px;">Ongoing</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>';
                                                        }
                                                    }
                                                }
                                                echo '
                                                </div>
                                                <div class="nav-content tab-pane fade" id="completed" role="tabpanel" aria-labelledby="contact-tab">';
                                                $result3 = mysqli_query($conn,$sql1);
                                                if($result3){
                                                    while($completed = mysqli_fetch_array($result3)){
                                                        if($completed['is_approved']=='yes'&&$completed['is_completed']=='yes'){
                                                            echo '
                                                            <div class="card mb-3 collapsed" onclick="window.location.href=\'viewproject.php?pid='.$completed['pid'].'\'">
                                                                <div class="card-body" id="a2" style="display: flex;" onclick="exp(\'a1\',\'a2\')">
                                                                    <div style="display:inline-block;max-width: 85%;">
                                                                        <span style="font-size:22px">'.$completed['pname'].'&nbsp </span><span style="font-size:18px">('.$completed['domain'].')</span>
                                                                        <span style="font-size: 12px;">&nbsp &nbspSomeone</span><br>
                                                                        <span id="desc"style="font-size: 14px;color:#707070" class="truncate">'.$completed['descr'].'</span>
                                                                    </div>
                                                                    <div class="ml-auto">
                                                                        <div>
                                                                        <span style="font-size: 14px;">'.$completed['due'].'</span><br>
                                                                        </div>
                                                                        <div class="mt-5 text-success">
                                                                        <span style="font-size: 14px;">Completed</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>';
                                                        }
                                                    }
                                                }
                                                echo '
                                                </div>
                                                <div class="nav-content tab-pane fade" id="notapproved" role="tabpanel" aria-labelledby="contact-tab">';
                                                $result4 = mysqli_query($conn,$sql1);
                                                if($result4){
                                                    while($notapproved = mysqli_fetch_array($result4)){
                                                        if($notapproved['is_approved']=='no'){
                                                            echo '
                                                                <div class="card mb-3 collapsed" onclick="window.location.href=\'viewproject.php?pid='.$notapproved['pid'].'\'">
                                                                    <div class="card-body" id="a2" style="display: flex;" onclick="exp(\'a1\',\'a2\')">
                                                                        <div style="display:inline-block;max-width: 85%;">
                                                                            <span style="font-size:22px">'.$notapproved['pname'].'&nbsp </span><span style="font-size:18px">('.$notapproved['domain'].')</span>
                                                                            <span style="font-size: 12px;">&nbsp &nbspSomeone</span><br>
                                                                            <span id="desc"style="font-size: 14px;color:#707070" class="truncate">'.$notapproved['descr'].'</span>
                                                                        </div>
                                                                        <div class="ml-auto">
                                                                            <div>
                                                                                <span style="font-size: 14px;">'.$notapproved['due'].'</span><br>
                                                                            </div>
                                                                            <div class="mt-5 text-warning">
                                                                                <span style="font-size: 14px;">Not Approved</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>';
                                                        }
                                                    }
                                                }
                                                echo '
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                ';
                            }
                        ?> 
                        <form action="../php/createproject.php" method='POST' enctype="multipart/form-data">
                            <div class="step1" id="step1">
                                <div class="d-flex">
                                    <span style="font-size:40px;top:-16px;position:relative">Tell us what you need done.</span>
                                    <div class="ml-auto d-flex" onclick="document.getElementById('empty').style.display='block'">
                                        <i class="far fa-times-circle fa-2x"></i>
                                    </div>
                                </div>
                                <div class="step-content">
                                    <span style="font-size:24px">Choose a name for your project<br></span>
                                    <input type="text" placeholder="eg. MakeX" class="inp" name="pname">
                                    <span style="font-size:24px">Tell us about project<br></span>
                                    <span style="font-size:18px">Select platform<br></span>
                                    <select name="platform" id="" class="inp">
                                        <option value="" selected hidden disabled>Nothing Selected</option>
                                        <option value="Android">Android</option>
                                        <option value="IOS">IOS</option>
                                        <option value="Mac Os">Mac Os</option>
                                        <option value="Windows">Windows</option>
                                        <option value="Linux">Linux</option>
                                        <option value="CrossPlatform">CrossPlatform</option>
                                    </select>
                                    <span style="font-size:18px">Select Domain<br></span>
                                    <select name="domain" id="" class="inp">
                                        <option value="" selected hidden disabled>Nothing Selected</option>
                                        <option value="Website">Website</option>
                                        <option value="Web Application">Web Application</option>
                                        <option value="Native Software">Native Software</option>
                                        <option value="CrossPlatform Software">CrossPlatform Software</option>
                                    </select>
                                    <textarea name="descr" id="" style="padding:5px;resize:none;"placeholder="Describe your project here..."></textarea>
                                    <div class="upload">
                                        <div>
                                            <input type="file" onchange='filename()' id="file-upload-inp" class="file-upload-inp" hidden multiple name='file[]'>
                                            <button  type="button" onclick='upload()' id='file-upload-btn'><i class="fas fa-1x fa-plus "></i> Upload</button>
                                        </div>
                                        <div>
                                            <span style="font-size:18px" id="file-upload-label">
                                                 Upload any images or documents that might be helpful in <br>explaining your brief here (Max file size: 25 MB).
                                            </span>
                                        </div>
                                    </div>
                                    <button type="button" onclick="next('step1','step2')">Next</button>
                                </div>
                            </div>
                            <div id="step2" style="height:120%;display:none">
                                <div class="d-flex">
                                    <span style="font-size:40px;top:-16px;position:relative">Tell us when you need it done.</span>
                                    <div class="ml-auto d-flex" onclick="document.getElementById('empty').style.display='block'">
                                        <i class="far fa-times-circle fa-2x"></i>
                                    </div>
                                </div>
                                <!-- <div class="prog">
                                    <Span>Almost Done</Span>
                                    <div style="display:flex;margin-top:10px">
                                        <div style="background:#6089FF; opacity:.5;width:250px; height:10px;margin-right:3px"></div>
                                         <div style="background:#6089FF; width:250px; height:10px; margin-right:3px"></div>
                                        <div style="background:#efefef; width:250px; height:10px;"></div>
                                    </div>
                                </div> -->
                                <div class="step-content" >
                                    <div class="s2-plan">
                                        <?php
                                            if($_SESSION['plan']=='Basic'){
                                                echo '<div style="display:flex"><img class="plan-img" src="..\assets\basic.png" alt=""><span style="font-size:18px;">Your current plan has a minimum delivery time of 1 month
                                                <br>We recommend upgrading your plan for faster delivery.</span></div>';
    
                                            }
                                            else if($_SESSION['plan']=='Standard'){
                                                echo '<div style="display:flex"><img class="plan-img" src="..\assets\standard.png" alt=""><span style="font-size:18px;">Your current plan has a minimum delivery time of 2 weeks 
                                                <br>We recommend upgrading your plan for faster delivery.</span></div>';
    
                                            }
                                            else if ($_SESSION['plan']=='Premium'){
                                                echo '<div style="display:flex"><img class="plan-img" src="..\assets\premium.png" alt=""><span style="font-size:18px;">Your current plan has a minimum delivery time of 1 month
                                                <br>We recommend upgrading your plan for faster delivery.</span></div>';
    
                                            }
                                        ?>
                                    </div>
                                    <span style="font-size:24px">Select a deadline <br></span>
                                    <span>There might be some variation in delivery time, we'll try our best to deliver within the deadline <br></span>
                                    <input type="date" style="width:240px;height:40px;margin:10px 0px 15px 0px;" name='due'><br>
                                    <div style="display flex">
                                        <button type='submit' name='submit'>Submit</button>
                                        <button type="button" onclick="prev('step1','step2')" style="margin-left:558px">Previous</button>
                                    </div>
                                </div>
                            </div>
                            <!-- <div id="step3">
                                <span style="font-size:40px">Terms Of Use</span>
                                <div class="prog">
                                    <Span>Final Step</Span>
                                    <div style="display:flex;margin-top:10px">
                                        <div style="background:#6089FF; opacity:.5;width:250px; height:10px;margin-right:3px"></div>
                                        <div style="background:#6089FF; opacity:.5;width:250px; height:10px;margin-right:3px"></div>
                                        <div style="background:#6089FF; width:250px; height:10px; margin-right:3px"></div>
                                    </div>
                                </div>
                                <div class="step-content">
                                    <div style="display flex">
                                        <button onclick="submit()">Submit</button>
                                        <button onclick="prev('step2')" style="margin-left:558px">Previous</button>
                                    </div>
                                </div>
                            </div> -->
                        </form>
                    </div>

                    <div id="plans" class="tabcontent" style="width:100%; height:100%;">
                        <div style="margin-bottom:40px">
                            <H1>Plans that fit your needs</H1>
                            <p>No matter the size of your budget, MakeX has a plan that’s right for you.</p>
                            <hr>
                        </div>
                        <?php if(!isset($_SESSION['plan'])){
                            echo'<div style="display:flex">
                                <div class="basic sel-plan mr-3" style="background:white;width:266px;border-radius:10px" onclick="window.location.href=\'../html/payment.php?plan=Basic\'">
                                    <img src="..\assets\basic.png" width=266px height=201px alt="" style="border-radius:10px 10px 0px 0px">
                                    <div style="padding:15px 20px">
                                        <h5 class=" text-muted mb-3 mt-2"><i class="fa fa-check-circle"  style="color:#9B6FF8 ;"></i> &nbspDelivery by 4 Weeks</h5>
                                        <h5 class="text-muted mb-3 "><i class="fa fa-check-circle"  style="color:#9B6FF8 ;"></i> &nbsp1 Concurrent project</h5>
                                        <h5 class="text-muted mb-3 "><i class="fa fa-check-circle"  style="color:#9B6FF8 ;"></i> &nbspMaximum 4 project</h5>
                                        <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#9B6FF8 ;"></i> &nbspGeneral Support</h5>
                                        <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#9B6FF8 ;"></i> &nbspVerified Developers</h5>
                                        <h5 class=" text-muted mb-3"><i class="fa fa-times-circle"  style="color:#FF5252 ;"></i> &nbspPriority Response</h5>
                                        <h5 class=" text-muted mb-3"><i class="fa fa-times-circle"  style="color:#FF5252 ;"></i> &nbspVIP Support</h5>
                                    </div>
                                </div>
                                <div class="standard  sel-plan mr-3" style="background:white;width:266px;border-radius:10px" onclick="window.location.href=\'../html/payment.php?plan=Standard\'">
                                    <img src="..\assets\standard.png" width=266px height=201px alt="" style="border-radius:10px 10px 0px 0px">
                                    <div style="padding:15px 20px">
                                        <h5 class=" text-muted mb-3 mt-2"><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i> &nbspDelivery by 2 Weeks</h5>
                                        <h5 class="text-muted mb-3"><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i>&nbsp2 Concurrent projects</h5>
                                        <h5 class="text-muted mb-3 "><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i> &nbspMaximum 8 project</h5>
                                        <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i> &nbspGeneral Support</h5>
                                        <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i> &nbspVerified Developers</h5>
                                        <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i> &nbspPriority Response</h5>
                                        <h5 class=" text-muted mb-3"><i class="fa fa-times-circle"  style="color:#FF5252 ;"></i> &nbspVIP Support</h5>
                                    </div>
                                </div>
                                <div class="premium sel-plan" style="background:white;width:266px;border-radius:10px">
                                    <img src="..\assets\premium.png"width=266px height=201px alt="" style="border-radius:10px 10px 0px 0px" onclick="window.location.href=\'../html/payment.php?plan=Premium\'">
                                    <div style="padding:15px 20px">
                                        <h5 class=" text-muted mb-3 mt-2"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspDelivery by 1 Weeks</h5>
                                        <h5 class="text-muted mb-3 "><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbsp4 Concurrent project</h5>
                                        <h5 class="text-muted mb-3 "><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspMaximum 15 project</h5>
                                        <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspGeneral Support</h5>
                                        <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspVerified Developers</h5>
                                        <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspPriority Response</h5>
                                        <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspVIP Support</h5>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top:20px;font-size:11px">
                                    <hr>
                                    <p>Prices do not include applicable taxes, which are determined according to your billing address.
                                    The final price can be seen on the purchase page, before payment is completed. Plans are subject to the <a href="#">Terms of Use </a>please read the terms carefully.</p>
                            </div>';
                        }
                        else{
                            if($_SESSION['plan']=='Basic'){
                                echo '<div style="display:flex;margin-left:50px;margin-top:20px;">
                                        <div>
                                            <div class="basic sel-plan mr-3" style="background:white;width:266px;border-radius:10px">
                                                <img src="..\assets\basic.png" width=266px height=201px alt="" style="border-radius:10px 10px 0px 0px">
                                                <div style="padding:15px 70px;">
                                                    <h3 class=" text-muted mb-3 mt-2"><i class="fa fa-check-circle"  style="font-weight:100"></i> &nbspActive</h3>
                                                </div>
                                            </div>
                                            <button id="upgrade" data-toggle="modal" data-target="#exampleModalCenter">Upgrade</button>
                                        </div>
                                        <div style="background:white;width:400px;border-radius:10px;margin-left:20px">
                                            <div style="padding:40px 70px">
                                                <h5 class=" text-muted mb-3 mt-2"><i class="fa fa-check-circle"  style="color:#9B6FF8 ;"></i> &nbspDelivery by 4 Weeks</h5>
                                                <h5 class="text-muted mb-3 "><i class="fa fa-check-circle"  style="color:#9B6FF8 ;"></i> &nbsp1 Concurrent project</h5>
                                                <h5 class="text-muted mb-3 "><i class="fa fa-check-circle"  style="color:#9B6FF8 ;"></i> &nbspMaximum 4 project</h5>
                                                <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#9B6FF8 ;"></i> &nbspGeneral Support</h5>
                                                <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#9B6FF8 ;"></i> &nbspVerified Developers</h5>
                                                <h5 class=" text-muted mb-3"><i class="fa fa-times-circle"  style="color:#FF5252 ;"></i> &nbspPriority Response</h5>
                                                <h5 class=" text-muted mb-3"><i class="fa fa-times-circle"  style="color:#FF5252 ;"></i> &nbspVIP Support</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin-top:150px;font-size:11px">
                                        <hr>
                                        <p>Prices do not include applicable taxes, which are determined according to your billing address.
                                        The final price can be seen on the purchase page, before payment is completed. Plans are subject to the <a href="#">Terms of Use </a>please read the terms carefully.</p>
                                    </div>';
                            }
                            else if($_SESSION['plan']=='Standard'){
                                echo '<div style="display:flex;margin-left:50px;margin-top:20px;">
                                        <div>
                                            <div class="basic sel-plan mr-3" style="background:white;width:266px;border-radius:10px">
                                                <img src="..\assets\standard.png" width=266px height=201px alt="" style="border-radius:10px 10px 0px 0px">
                                                <div style="padding:15px 70px;">
                                                    <h3 class=" text-muted mb-3 mt-2"><i class="fa fa-check-circle"  style="font-weight:100"></i> &nbspActive</h3>
                                                </div>
                                            </div>
                                            <button id="upgrade" data-toggle="modal" data-target="#exampleModalCenter">Upgrade</button>
                                        </div>
                                        <div style="background:white;width:400px;border-radius:10px;margin-left:20px">
                                            <div style="padding:40px 70px">
                                                <h5 class=" text-muted mb-3 mt-2"><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i> &nbspDelivery by 2 Weeks</h5>
                                                <h5 class="text-muted mb-3"><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i>&nbsp2 Concurrent projects</h5>
                                                <h5 class="text-muted mb-3 "><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i> &nbspMaximum 8 project</h5>
                                                <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i> &nbspGeneral Support</h5>
                                                <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i> &nbspVerified Developers</h5>
                                                <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i> &nbspPriority Response</h5>
                                                <h5 class=" text-muted mb-3"><i class="fa fa-times-circle"  style="color:#FF5252 ;"></i> &nbspVIP Support</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin-top:150px;font-size:11px">
                                        <hr>
                                        <p>Prices do not include applicable taxes, which are determined according to your billing address.
                                        The final price can be seen on the purchase page, before payment is completed. Plans are subject to the <a href="#">Terms of Use </a>please read the terms carefully.</p>
                                    </div>';

                            }
                            else if ($_SESSION['plan']=='Premium'){
                                echo '<div style="display:flex;margin-left:50px;margin-top:20px;">
                                        <div>
                                            <div class="basic sel-plan mr-3" style="background:white;width:266px;border-radius:10px">
                                                <img src="..\assets\premium.png" width=266px height=201px alt="" style="border-radius:10px 10px 0px 0px">
                                                <div style="padding:15px 70px;">
                                                    <h3 class=" text-muted mb-3 mt-2"><i class="fa fa-check-circle"  style="font-weight:100"></i> &nbspActive</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="background:white;width:400px;border-radius:10px;margin-left:20px">
                                            <div style="padding:40px 70px">
                                                <h5 class=" text-muted mb-3 mt-2"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspDelivery by 1 Weeks</h5>
                                                <h5 class="text-muted mb-3 "><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbsp4 Concurrent project</h5>
                                                <h5 class="text-muted mb-3 "><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspMaximum 15 project</h5>
                                                <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspGeneral Support</h5>
                                                <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspVerified Developers</h5>
                                                <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspPriority Response</h5>
                                                <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspVIP Support</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin-top:150px;font-size:11px">
                                        <hr>
                                        <p>Prices do not include applicable taxes, which are determined according to your billing address.
                                        The final price can be seen on the purchase page, before payment is completed. Plans are subject to the <a href="#">Terms of Use </a>please read the terms carefully.</p>
                                    </div>';
                            }
                        }?>
                        
                    </div>

                    <div id="setting" class="tabcontent" style="width:100%; height:100%;">
                        <h5 class="h1">Settings</h5>
                        <div class="nav flex-column nav-pills "  aria-orientation="vertical">
                            <a class="nav-link  h4"  href="updateprofile.php" aria-selected="true">Profile</a>
                            <a class="nav-link h4"   href="passchange.php"   aria-selected="false">Change Password</a>
                            <a class="nav-link h4"   href="about.html" target="_blank"  aria-selected="false">Contact Us</a>
                        </div>
                        <center><p style="color: #000; margin-top: 490px;">© MakeX All rights reserved.</p></center>
                    </div>
                </div>
            </div>
            <div class="right">
                <!-- <div class="d-flex notification"><div class="ml-auto mr-2" onclick="document.getElementById('notif').style.display='none';"><i class="fas fa-2x fa-bell"></div></i></div> -->
                <div class="border mt-5 lol123">
                    <div class="lead" style="margin:5px 20px;font-size:28px;">Active Plan</div>
                    <div class="active_plan" onclick="document.getElementById('item3').click()">
                        <?php
                            if($_SESSION['plan']=='Basic'){
                                echo '<img class="active-img" src="..\assets\basic-active.png" alt="">';
                            }
                            else if($_SESSION['plan']=='Standard'){
                                echo '<img class="active-img" src="..\assets\standard-active.png" alt="">';
    
                            }
                            else if ($_SESSION['plan']=='Premium'){
                                echo '<img class="active-img" src="..\assets\premium-active.png" alt="">';
    
                            }
                            else{
                                echo '<img class="active-img" src="..\assets\notactive-active.png" alt="">';
    
                            }
                        ?>
                    </div> 
                </div>
                <div class="border mt-4 lol123">
                    <div class="lead" style="margin:5px 20px;font-size:28px;">Project Activity</div>
                    <hr>
                    <div class="lead" style="margin:5px 20px;font-size:18px;">Project Created</div>
                    <?php 
                        $sql_not="SELECT * FROM project WHERE email ='$email' and is_submitted='no'";
                        $res_not=mysqli_query($conn,$sql_not);
                        if($res_not){
                            $count1=mysqli_num_rows($res_not);
                            if($count1==0){
                                echo '
                                <div class="rounded mx-3 mb-2 p-2 bg-light d-flex lol1234" onclick="document.getElementById(\'item2\').click();next(\'empty\')">
                                        <div class=" mx-auto pr-2 text-primary">
                                            <span style="font-size: 14px;">Create Project</span>
                                        </div>
                                </div>';
                            }
                            else{
                                while($row_not=mysqli_fetch_array($res_not)){
                                    echo '
                                        <div class="rounded mx-3 mb-2 p-2 bg-light d-flex lol1234" onclick="window.location.href=\'viewproject.php?pid='.$row_not['pid'].'\'">
                                            <div>'.$row_not['pname'].'</div>';
                                            if($row_not['is_approved']=='no'){
                                                echo'
                                                <div class=" ml-auto pr-2 text-warning">
                                                    <span style="font-size: 14px;">Not Approved</span>
                                                </div>';
                                            }
                                            else if($row_not['is_approved']=='yes'){
                                                echo'
                                                <div class="text-primary ml-auto pr-2 ">
                                                    <span style="font-size: 14px;">Ongoing</span>
                                                </div>';
                                            }
                                            echo'
                                        </div>
                                    ';
                                }
                            }
                        }
                        echo'<div class="lead " style="margin:15px 20px 5px 20px;font-size:18px;">Project Received</div>';
                        $sql_sub="SELECT * FROM project WHERE email ='$email' and is_submitted='yes'";
                        $res_sub=mysqli_query($conn,$sql_sub);
                        if($res_sub){
                            $count2=mysqli_num_rows($res_sub);
                            if($count2==0){
                                echo '
                                <div class="rounded mx-3 mb-2 p-2 bg-light d-flex">
                                        <div class=" mx-auto pr-2 text-primary">
                                            <span style="font-size: 14px;">No Project</span>
                                        </div>
                                </div>';
                            }
                            else{
                                while($row_sub=mysqli_fetch_array($res_sub)){
                                    echo '
                                        <div class="rounded mx-3 mb-2 p-2 bg-light d-flex lol1234" onclick=";window.location.href=\'viewproject.php?pid='.$row_sub['pid'].'\'">
                                            <div>'.$row_sub['pname'].'</div>';
                                            if($row_sub['is_completed']=='no'){
                                                echo'
                                                <div class=" ml-auto pr-2 text-primary">
                                                    <span style="font-size: 14px;">Submitted</span>
                                                </div>';
                                            }
                                            else if($row_sub['is_completed']=='yes'){
                                                echo'
                                                <div class="text-success ml-auto pr-2 ">
                                                    <span style="font-size: 14px;">Completed</span>
                                                </div>';
                                            }
                                            echo'
                                        </div>
                                    ';
                                }
                            }
                        }
                    ?>     
                <div>
        </div>
        <div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered <?php  if($_SESSION['plan']=='Basic'){echo'modal-lg';}?>" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Select a Plan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <?php 
                        if($_SESSION['plan']=='Basic'){
                            echo'
                                <div class="d-flex justify-content-center">
                                    <div class="standard  sel-plan mr-5" style="background:white;width:266px;border-radius:10px" onclick="window.location.href=\'../html/payment.php?plan=Standard\'">
                                        <img src="..\assets\standard.png" width=266px height=201px alt="" style="border-radius:10px 10px 0px 0px">
                                        <div style="padding:15px 20px">
                                            <h5 class=" text-muted mb-3 mt-2"><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i> &nbspDelivery by 2 Weeks</h5>
                                            <h5 class="text-muted mb-3"><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i>&nbsp2 Concurrent projects</h5>
                                            <h5 class="text-muted mb-3 "><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i> &nbspMaximum 8 project</h5>
                                            <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i> &nbspGeneral Support</h5>
                                            <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i> &nbspVerified Developers</h5>
                                            <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#FC6183 ;"></i> &nbspPriority Response</h5>
                                            <h5 class=" text-muted mb-3"><i class="fa fa-times-circle"  style="color:#FF5252 ;"></i> &nbspVIP Support</h5>
                                        </div>
                                    </div>
                                    <div class="premium sel-plan " style="background:white;width:266px;border-radius:10px">
                                        <img src="..\assets\premium.png"width=266px height=201px alt="" style="border-radius:10px 10px 0px 0px" onclick="window.location.href=\'../html/payment.php?plan=Premium\'">
                                        <div style="padding:15px 20px">
                                            <h5 class=" text-muted mb-3 mt-2"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspDelivery by 1 Weeks</h5>
                                            <h5 class="text-muted mb-3 "><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbsp4 Concurrent project</h5>
                                            <h5 class="text-muted mb-3 "><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspMaximum 15 project</h5>
                                            <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspGeneral Support</h5>
                                            <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspVerified Developers</h5>
                                            <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspPriority Response</h5>
                                            <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspVIP Support</h5>
                                        </div>
                                    </div>
                                </div>
                            ';
                        }
                        else if($_SESSION['plan']=='Standard'){
                            echo'
                                <div class="justify-content-center d-flex">
                                    <div class="premium sel-plan " style="background:white;width:266px;border-radius:10px">
                                        <img src="..\assets\premium.png"width=266px height=201px alt="" style="border-radius:10px 10px 0px 0px" onclick="window.location.href=\'../html/payment.php?plan=Premium\'">
                                        <div style="padding:15px 20px">
                                            <h5 class=" text-muted mb-3 mt-2"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspDelivery by 1 Weeks</h5>
                                            <h5 class="text-muted mb-3 "><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbsp4 Concurrent project</h5>
                                            <h5 class="text-muted mb-3 "><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspMaximum 15 project</h5>
                                            <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspGeneral Support</h5>
                                            <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspVerified Developers</h5>
                                            <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspPriority Response</h5>
                                            <h5 class=" text-muted mb-3"><i class="fa fa-check-circle"  style="color:#5B75EC ;"></i> &nbspVIP Support</h5>
                                        </div>
                                    </div>
                                </div>
                            ';
                        }
                      ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>







