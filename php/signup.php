<?php
include_once "conn.php";
if(isset($_POST['submitbtn'])){
$fstname = $_POST['fname'];
$lstname = $_POST['lname'];
$emailid = $_POST['e_mail'];
$pwd = $_POST['pwd'];
$cnfpwd = $_POST['cnfpwd'];


if($pwd==$cnfpwd){
	   	$hashedPwd=password_hash($pwd,PASSWORD_BCRYPT);
		 $query = "SELECT * FROM users WHERE email='$emailid'";
		 $result =mysqli_query($conn,$query) or die(mysqli_error($conn));
  	if (mysqli_num_rows($result))
  	{
			echo "<script type='text/javascript'>alert('Username already exists');</script>";
  	}else{

		$sql = "INSERT INTO users (firstname, lastname, email, password ) VALUES('$fstname','$lstname','$emailid','$hashedPwd')";
		$sql_run=mysqli_query($conn,$sql);
		if($sql_run){
		// echo "<script type='text/javascript'>alert('Successfully Registered');</script>";
		session_start();
		$_SESSION['userid']=$emailid;
		$_SESSION['fname']=$fstname;
		$_SESSION['lname']=$lstname;
		header("location:../html/profile.php?login=success");
	}
	}
}else{
	echo "<script type='text/javascript'>alert('the two passwords do not match');</script>";
}
}