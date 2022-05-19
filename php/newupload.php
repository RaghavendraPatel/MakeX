<?php
include_once "conn.php";
session_start();
if(isset($_GET['pid'])&&isset($_GET['id'])){
    $id1=$_GET['pid'];
    $id=$_GET['id'];
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
            $insert = "INSERT into custfile (email,fname,id) values('$email','$fileNameNew','$id')";
            mysqli_query($conn, $insert);
            move_uploaded_file($fileTmpName,$fileDestination);
        }
        header("Location:../html/viewproject.php?pid=$id1");
    }
    else {
    echo "<script type='text/javascript'>alert('File limit Exceeded');</script>";
    }
}
else{
    header('Location:custhome.php');
}

?>