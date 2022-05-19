<?php
 include_once "../php/conn.php";
 session_start();
 if (!isset($_SESSION['userid'])) {
    header("Location: login.html?login=nologon");
}
if(isset($_GET['pid'])){
    $id1=$_GET['pid'];
    $sql1="SELECT * FROM project where pid='$id1'";
    $result1=mysqli_query($conn,$sql1);
    $row1=mysqli_fetch_array($result1);
    $id=$row1['pub_on'];
}
else{
    header('Location:custhome.php');
}
if(isset($_POST['approve'])){
    $q="UPDATE project SET is_completed='yes' WHERE pid='$id1'";
    $res=mysqli_query($conn,$q);
    header('Location:viewproject.php?pid='.$id1.'&submit=success');
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
    <title>Project | MAkeX</title>
    <link rel="shortcut icon" href="..\assets\icon.png">
    <style>
        .detail{
            font-size:18px;
            color:#707070;
        }
    </style>
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="..\js\custhome.js"></script>
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
         <div class="shadow-lg bg-white row top">
            <div class="col-12 d-flex">
                <h3><?php echo $row1['pname'].'\'s '.' Details';?></h3>
                <button onclick="window.location.href='custhome.php'" type="button" class="btn btn-primary ml-auto">Close</button>
            </div>
        </div>
    </div>

    <div class="rounded  bg-light container mt-3 p-3 d-flex justify-content-center">
        <?php
            echo'
                <div>
                    <span style="font-size:30px">'.$row1['pname'].'</span><br> 
                    <span class="lead">Domain: </span><span class="detail">'.$row1['domain'].'</span><br> 
                    <span class="lead">Platform: </span><span class="detail">'.$row1['platform'].'</span><br> 
                    <span class="lead">Published on: </span><span class="detail">'.$row1['pub_on'].'</span><br> 
                    <span class="lead">Due On: </span><span class="detail">'.$row1['due'].'</span><br> 
                    <hr>
                    <span class="lead">Description</span>
                    <div class="text-muted rounded border p-2 "><span class="detail">'.$row1['descr'].'</span></div> 
                    <hr>
                    <span class="lead">Uploaded Files</span>
                    <div class="rounded border p-2">';
                    $sql2="SELECT * FROM custfile where id='$id'";
                    $result2=mysqli_query($conn,$sql2);
                    echo'<div class="justify-content-start d-flex flex-wrap" style="max-width:1040px;">';
                    while($row2=mysqli_fetch_array($result2)){
                        $file_name_enc=$row2['fname'];
                        $file_name=explode(".",$file_name_enc);
                        $file_name_final=$file_name[2].'.'.$file_name[3];
                        echo'
                            <div style="width:70px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;background-color:#efefef;" class="border rounded m-3 pt-3 pl-1 pr-1 pb-1" title="'.$file_name_final.'">
                                <a href="../uploads/'.$file_name_enc.'" download style="text-decoration:none;color:#707070;">
                                        <center><i class="far fa-file fa-3x"></i></center>
                                        <span style="font-size:12px">'.$file_name_final.'</span>  
                                </a>
                            </div>
                        ';
                    }
                    if($row1['is_completed']=='no'){
                         echo'
                         <form action="../php/newupload.php?pid='.$id1.'&id='.$id.'" method="Post" enctype="multipart/form-data">
                            <div style="width:70px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;background-color:#efefef;" class="border rounded m-3 pt-3 pl-1 pr-1 pb-1" title="'.$file_name_final.'">
                                <input type="file" onchange="addFile()" id="file-upload-inp" class="file-upload-inp" hidden multiple name=\'file[]\'>
                                <center><button type="button" onclick="upload()"id="file-upload-btn" style="border:none"><i class="fas fa-3x fa-plus-circle " style="color:#707070;"></i></button></center>
                                <button type="submit" id="up" hidden>Upload</button>
                                <center><span style="font-size:12px">Add file</span></center> 
                            </div>
                        </form>';
                    }
                        echo'
                        </div>
                    </div>';
                    if($row1['is_submitted']=='yes'){
                        echo'
                        <hr>
                        <span class="lead">Project Files</span>
                        <div class="rounded border p-2">';
                        $sql2="SELECT * FROM devfile where id='$id1'";
                        $result2=mysqli_query($conn,$sql2);
                        echo'<div class="justify-content-start d-flex flex-wrap" style="max-width:1040px;">';
                        while($row2=mysqli_fetch_array($result2)){
                            $file_name_enc=$row2['fname'];
                            $file_name=explode(".",$file_name_enc);
                            $file_name_final=$file_name[2].'.'.$file_name[3];
                            echo'
                                <div style="width:70px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;background-color:#efefef;" class="border rounded m-3 pt-3 pl-1 pr-1 pb-1" title="'.$file_name_final.'">
                                    <a href="../uploads/'.$file_name_enc.'" download style="text-decoration:none;color:#707070;">
                                            <center><i class="far fa-file fa-3x"></i></center>
                                            <span style="font-size:12px">'.$file_name_final.'</span>  
                                    </a>
                                </div>
                            ';
                        }echo'</div>
                        </div>';
                        if($row1['is_completed']=='no'){
                            echo'
                            <div class="d-flex mt-2">
                                <div class="ml-auto">
                                    <form action="" method="POST"><button type="submit"name ="approve" class="btn btn-success ml-auto">Approve</button></form>
                                </div>
                            </div>';
                        }else{
                            echo'
                                <div class="d-flex mt-2">
                                    <div class="ml-auto">
                                        <button type="button" onclick="window.location.href=\'custhome.php\'" class="btn btn-success"><i class="far fa-hand-point-left"></i> <i class="far fa-smile-wink"></i></button>
                                    </div>
                                </div>';
                        }
                    }    
                echo'
                </div> 
            ';
        ?>    
    </div>
    


    <center><p style="color: #707070; margin-top: 20px;">© MakeX All rights reserved.</p></center>
</body>
</html>