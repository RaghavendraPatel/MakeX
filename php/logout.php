<?php
include_once 'conn.php';
session_start();
if($_SESSION['userid']){
  session_start();
  session_unset();
  session_destroy();
  session_write_close();
  setcookie(session_name(),'',0,'/');
  session_regenerate_id(true);
  header("Location: ../html/landing.php");
}
header("Location: ../html/landing.php");
?>
