<?php
include_once "conn.php";
if(isset($_POST['verify'])){
    $mail = $_POST['mail'];
    $query = "UPDATE devs SET isverified='yes' WHERE email = '$mail';";
    $result = mysqli_query($conn, $query);
    echo "<script type='text/javascript'>window.location.href='../html/admin.php?ver=success';</script>";

}
if(isset($_POST['decline'])){
    $mail = $_POST['mail'];
    $query = "UPDATE devs SET isverified='cant' WHERE email = '$mail';";
    $result = mysqli_query($conn, $query);
    echo "<script type='text/javascript'>window.location.href='../html/admin.php?rm=success';</script>";

}

?>