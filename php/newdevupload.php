<?php
include_once "conn.php";
session_start();
if(isset($_GET['pid'])){
    $id1=$_GET['pid'];
    $email=$_SESSION['userid'];
    $totalfiles = count($_FILES['file']['name']);
    $fileSizeFinal=0;
    for($i=0;$i<$totalfiles;$i++){
        $fileSize= $_FILES['file']['size'][$i];
        $fileSizeFinal+=$fileSize;
    }
    if($fileSizeFinal<=25000000){
        for($i=0;$i<$totalfiles;$i++){
            $filename = $_FILES['file']['name'][$i];
            $fileNameNew=uniqid('', true).".".$filename;
            $fileTmpName= $_FILES['file']['tmp_name'][$i];
            $fileDestination='../uploads/'.$fileNameNew;
            $insert = "INSERT into devfile (email,fname,id) values('$email','$fileNameNew','$id1')";
            mysqli_query($conn, $insert);
            move_uploaded_file($fileTmpName,$fileDestination);
        }
        header("Location:../html/devviewproject.php?pid=$id1");
    }
    else {
    echo "<script type='text/javascript'>alert('File limit Exceeded');</script>";
    }
}
else{
    header('Location:devhome.php');
}

?>