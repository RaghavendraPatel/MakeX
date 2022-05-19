<?php
    include_once "../php/conn.php";
    session_start();
    if (!isset($_SESSION['userid'])) {
        header("Location: login.html?noLogon"); 
    }
    if (($_SESSION['usrtype'])=='admin') {
        header("Location: admin.php");
    }
    if($_SESSION['usrtype']=='cust'){
        header("Location: custhome.php?not%20developer");}
    if(isset($_SESSION['isverif'])){
        if($_SESSION['isverif']=='cant'){
            header("Location: cantverify.php?cantverifydetails");
        }
    }
    $sql="SELECT * FROM project";
    $dev_email = $_SESSION['userid'];
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
        <title>DevHome&nbsp;| MakeX</title>  
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

                <!-- <div onclick="openPage('clients', this);clients()"  id="item3" class="dash-ele">
                    <i class="fas fa-2x fa-user-friends"></i>
                    <span class="dash-name">Clients</span>
                </div> -->

                <!--<div onclick="openPage('team', this);team()"  id="item4" class="dash-ele">
                    <i class="fas fa-2x fa-users"></i>
                    <span class="dash-name">Team</span>
                </div> -->

                <div onclick="openPage('setting', this);settings1()"  id="item3" class="dash-ele">
                    <i class="fas fa-2x fa-sliders-h"></i>
                    <span class="dash-name">Settings</span>
                </div>

                <div onclick="window.location.href='../php/logout.php'" type="submit" class="dash-ele">
                    <i class="fas fa-2x fa-sign-out"></i>
                    <span class="dash-name">Logout</span>
                </div>
                <div style="margin-bottom:260px"></div>
                <div class="dash-usr">
                    <div><i class="fas fa-3x fa-user-circle"></i></div>
                    <div class="dash-name" style="font-size:24px">
                        <?php
                            $name=$_SESSION['fname']." ".$_SESSION['lname'];
                            echo"$name";
                        ?>
                        <p style="font-size:12px">Developer</p>
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
                            $ong = "SELECT * FROM devs WHERE email='$dev_email'";
                            $result1 = mysqli_query($conn, $ong);
                            $row1 = mysqli_fetch_array($result1);
                            if($row1['isverified']=='yes'){
                                echo '<span style="font-size:20px"> <i class="fas fa-check-circle ml-1 text-primary"></i></span>';
                            }else if($row1['isverified']='no'){
                                echo '<span style="font-size:20px"> <i class="fas fa-times-circle ml-1 text-warning"></i></span>';
                            }
                        ?>
                        <p style="font-size:16px;">Have a nice Day!!</p>
                    </div>
                </div>
                <div class="center-content">
                    <!-- <div id="daash" class="tabcontent" style="width:100%; height:110%;overflow-y:scroll;">
                       
                    </div> -->

                    <div id="projects" class="tabcontent" style="width:100%; height:100%; ">
                        <span style="font-size:42px;top:-12px;position:relative;">Projects</span>
                        <?php 
                             echo '
                                <div class="rounded bg-light border">
                                     <div>
                                         <ul class="nav nav-tabs" id="myTab" role="tablist">
                                             <li class="nav-item">
                                                 <a class="nav-link active" id="home-tab" data-toggle="tab" href="#browse" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-globe-americas"></i> Discover Projects</a>
                                             </li>
                                             <li class="nav-item">
                                                 <a class="nav-link" id="profile-tab" data-toggle="tab" href="#all" role="tab" aria-controls="profile" aria-selected="false">All</a>
                                             </li>
                                             <li class="nav-item">
                                                 <a class="nav-link" id="contact-tab" data-toggle="tab" href="#ongoing" role="tab" aria-controls="contact" aria-selected="false">Ongoing</a>
                                             </li>
                                             <li class="nav-item">
                                                 <a class="nav-link" id="contact-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="contact" aria-selected="false">Completed</a>
                                             </li>
                                         </ul>
                                     </div>
                                    <div class="tab-content" id="myTabContent" style="overflow-y: auto;">
                                        <div class="nav-content tab-pane fade show active" id="browse" role="tabpanel" aria-labelledby="home-tab">';
                                        $result = mysqli_query($conn,$sql);
                                        if($result){
                                            while($browse = mysqli_fetch_array($result)){
                                                if($browse['is_approved']=='no'){
                                                    $client_email = $browse['email'];
                                                    $sql1 = "SELECT firstname FROM users WHERE email = '$client_email'";
                                                    $result1=mysqli_query($conn,$sql1);
                                                    $row=mysqli_fetch_array($result1);
                                                    echo '
                                                        <div class="card mb-3 collapsed" onclick="window.location.href=\'devviewproject.php?pid='.$browse['pid'].'\'">
                                                            <div class="card-body" id="a2" style="display: flex;">
                                                                <div style="display:inline-block;max-width: 85%;">
                                                                    <span style="font-size:22px">'.$browse['pname'].'&nbsp </span><span style="font-size:18px">('.$browse['domain'].')</span>
                                                                    <span style="font-size: 12px;">&nbsp &nbsp'.$row['firstname'].'</span><br>
                                                                    <span id="desc"style="font-size: 14px;color:#707070" class="truncate">'.$browse['descr'].'</span>
                                                                </div>
                                                                <div class="ml-auto">
                                                                    <div>
                                                                        <span style="font-size: 14px;">'.$browse['due'].'</span><br>
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
                                        <div class="nav-content tab-pane fade" id="all" role="tabpanel" aria-labelledby="profile-tab">';
                                            $result2 = mysqli_query($conn,$sql);
                                            if($result2){
                                                while($all = mysqli_fetch_array($result2)){
                                                    if($all['is_approved']=='yes' && $all['dev']==$dev_email){
                                                        $client_email = $all['email'];
                                                        $sql1 = "SELECT firstname FROM users WHERE email = '$client_email'";
                                                        $result1=mysqli_query($conn,$sql1);
                                                        $row=mysqli_fetch_array($result1);
                                                        echo '
                                                            <div class="card mb-3 collapsed" onclick="window.location.href=\'devviewproject.php?pid='.$all['pid'].'\'">
                                                                <div class="card-body" id="a2" style="display: flex;">
                                                                    <div style="display:inline-block;max-width: 85%;">
                                                                        <span style="font-size:22px">'.$all['pname'].'&nbsp </span><span style="font-size:18px">('.$all['domain'].')</span>
                                                                        <span style="font-size: 12px;">&nbsp &nbsp'.$row['firstname'].'</span><br>
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
                                            }
                                        echo '
                                        </div>
                                        <div class="nav-content tab-pane fade" id="ongoing" role="tabpanel" aria-labelledby="contact-tab">';
                                            $result3 = mysqli_query($conn,$sql);
                                            if($result3){
                                                while($ongoing = mysqli_fetch_array($result3)){
                                                    if($ongoing['is_approved']=='yes' && $ongoing['is_completed']=='no'&& $ongoing['dev']==$dev_email){
                                                        $client_email = $ongoing['email'];
                                                        $sql1 = "SELECT firstname FROM users WHERE email = '$client_email'";
                                                        $result1=mysqli_query($conn,$sql1);
                                                        $row=mysqli_fetch_array($result1);
                                                        echo '
                                                            <div class="card mb-3 collapsed" onclick="window.location.href=\'devviewproject.php?pid='.$ongoing['pid'].'\'">
                                                                <div class="card-body" id="a2" style="display: flex;">
                                                                    <div style="display:inline-block;max-width: 85%;">
                                                                        <span style="font-size:22px">'.$ongoing['pname'].'&nbsp </span><span style="font-size:18px">('.$ongoing['domain'].')</span>
                                                                        <span style="font-size: 12px;">&nbsp &nbsp'.$row['firstname'].'</span><br>
                                                                        <span id="desc"style="font-size: 14px;color:#707070" class="truncate">'.$ongoing['descr'].'</span>
                                                                    </div>
                                                                    <div class="ml-auto">
                                                                        <div>
                                                                            <span style="font-size: 14px;">'.$ongoing['due'].'</span><br>
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
                                        echo'
                                        </div>
                                        <div class="nav-content tab-pane fade" id="completed" role="tabpanel" aria-labelledby="contact-tab">';
                                        $result4 = mysqli_query($conn,$sql);
                                        if($result4){
                                            while($completed = mysqli_fetch_array($result4)){
                                                if($completed['is_approved']=='yes' && $completed['is_completed']=='yes'&& $completed['dev']==$dev_email){
                                                    $client_email = $completed['email'];
                                                    $sql1 = "SELECT firstname FROM users WHERE email = '$client_email'";
                                                    $result1=mysqli_query($conn,$sql1);
                                                    $row=mysqli_fetch_array($result1);
                                                    echo '
                                                        <div class="card mb-3 collapsed" onclick="window.location.href=\'devviewproject.php?pid='.$completed['pid'].'\'">
                                                            <div class="card-body" id="a2" style="display: flex;">
                                                                <div style="display:inline-block;max-width: 85%;">
                                                                    <span style="font-size:22px">'.$completed['pname'].'&nbsp </span><span style="font-size:18px">('.$completed['domain'].')</span>
                                                                    <span style="font-size: 12px;">&nbsp &nbsp'.$row['firstname'].'</span><br>
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
                                    echo'
                                        </div>
                                    </div>
                                </div>
                             ';
                        ?>
                    </div>

                    <div id="clients" class="tabcontent" style="width:100%; height:100%;">
                        <p>3Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta quidem ullam perspiciatis assumenda possimus, ipsum dicta excepturi voluptatum voluptatem laboriosam fugiat, nihil reiciendis iusto qui nulla quia aliquid modi adipisci.</p>
                    </div>

                    <div id="team" class="tabcontent" style="width:100%; height:100%;">
                        <p>4Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta quidem ullam perspiciatis assumenda possimus, ipsum dicta excepturi voluptatum voluptatem laboriosam fugiat, nihil reiciendis iusto qui nulla quia aliquid modi adipisci.</p>
                     </div>

                    <div id="setting" class="tabcontent" style="width:100%; height:100%;">
                        <h5 class="h1">Settings</h5>
                        <div class="nav flex-column nav-pills "  aria-orientation="vertical">
                            <a class="nav-link  h4"  href="updateprofile.php" aria-selected="true">Profile</a>
                            <a class="nav-link h4"   href="passchange.php"   aria-selected="false">Change Password</a>
                            <a class="nav-link h4"   href="#"   aria-selected="false">Contact Us</a>
                        </div>
                        <center><p style="color: #000; margin-top: 60px;">© MakeX All rights reserved.</p></center>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="border lol123 pl-4 mt-3 pb-3">
                    <img src="../assets/earnings-icon.png" width=250px alt="" class="ml-5"><br>
                    <hr>
                    <?php
                        $com = "SELECT count(*) as number FROM project WHERE is_submitted='yes' AND is_completed='yes' AND dev='$dev_email'";
                        $result3 = mysqli_query($conn,$com);
                        $row3 = mysqli_fetch_array($result3);
                        $price=$row3["number"]*4  ;
                        echo '<span class="h3 font-weight-normal">Total Earnings: $ '.$price.'</span>';
                    ?>

                </div>
                <div class="lol123 border mt-5 pt-2">
                    <div class="lead" style="margin:0px 20px;font-size:28px;">Project Activity</div>
                    <div id="donutchart" style="" style="margin-top:-20px">
            
    
                    </div>
                </div>
                <?php   
                    $ong = "SELECT count(*) as number FROM project WHERE is_approved='yes' AND is_submitted='no' AND dev='$dev_email'";    
                    $sub = "SELECT count(*) as number FROM project WHERE is_submitted='yes' AND is_completed='no' AND dev='$dev_email'";     
                    $com = "SELECT count(*) as number FROM project WHERE is_submitted='yes' AND is_completed='yes' AND dev='$dev_email'";     
                    $result1 = mysqli_query($conn, $ong);  
                    $result2 = mysqli_query($conn, $sub);  
                    $result3 = mysqli_query($conn, $com);  
                    $row1 = mysqli_fetch_array($result1);
                    $row2 = mysqli_fetch_array($result2);
                    $row3 = mysqli_fetch_array($result3);
                ?>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                    google.charts.load("current", {packages:["corechart"]});
                    google.charts.setOnLoadCallback(drawChart);
                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['Status', 'Projects'],
                        <?php  
                            echo "['Ongoing', ".$row1["number"]."],";  
                            echo "['Submitted', ".$row2["number"]."],";  
                            echo "['Completed', ".$row3["number"]."],";  
                                    
                        ?>  
                        ]);

                        var options = {
                            backgroundColor: 'transparent',
                            pieHole: 0.4,
                            'width':400,
                            'height':400,
                            pieSliceTextStyle: {
                            color: 'black',
                        },
                        legend: 'none'
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                        chart.draw(data, options);
                    }
                </script>
            </div>   
        </div>
    </body>
</html>







