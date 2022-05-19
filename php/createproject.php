<?php
include_once "conn.php";
session_start();
if(isset($_POST['submit'])){
     $email = $_SESSION['userid'];
     $pname = $_POST['pname'];
     $platform = $_POST['platform'];
     $domain = $_POST['domain'];
     $descr = $_POST['descr'];
     $due = $_POST['due'];
     $sql1 = "INSERT INTO project (email, pname, platform, domain, descr, due) VALUES('$email','$pname','$platform','$domain','$descr','$due')";
     $sql1_run=mysqli_query($conn,$sql1);
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
             $insert = "INSERT into custfile (email,fname) values('$email','$fileNameNew')";
             mysqli_query($conn, $insert);
             move_uploaded_file($fileTmpName,$fileDestination);
         }
     }
     else {
        echo "<script type='text/javascript'>alert('File limit Exceeded');</script>";
     }  
    if($sql1_run){
        $query = "SELECT nop FROM cust WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $nop= $row['nop'];
        $nop+=1;
        $sql = "UPDATE  cust SET nop='$nop' WHERE email='$email'";
        $sql_run=mysqli_query($conn,$sql);
        if($sql_run){
            echo "<script type='text/javascript'>alert('Project Created');</script>";
            header('Location:../html/custhome.php?project%20created');
        }
    }
}
    
    
    
    
    
    
    
    