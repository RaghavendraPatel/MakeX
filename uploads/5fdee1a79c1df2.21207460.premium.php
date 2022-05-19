<?php
 include_once "../php/conn.php";
 session_start();
 if (!isset($_SESSION['userid'])) {
   header("Location: login.html?login=nologon");
 }
$_SESSION['plan']='Premium';
$_SESSION['price']=90;
header("location:../html/payment.php?plan=premium");
?>