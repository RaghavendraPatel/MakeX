<?php
include_once "conn.php";
if(isset($_POST['submitbtn'])){
    $emailid = $_POST['e_mail'];
    $phcode = $_POST['phonecode'];
    $phnum = $_POST['phonenum'];
    $phone = "+".$phcode."-".$phnum;
    $dob = $_POST['dob'];
    $gend= $_POST['gender'];
    $nat= $_POST['nats'];
    $usrtype= $_POST['usrt'];
    $prosp=trim($_POST['biot']);

    if($usrtype=='dev')
    {
        $educ= $_POST['edu'];
        $profs_string="";
        $lel=$_POST['skills'];
        foreach ($lel as $selectedOption)
        {
            $profs_string=$profs_string .",". $selectedOption;
        }
        $profs_string= substr($profs_string,1,strlen($profs_string));
        $exper= $_POST['exp'];
        $acc=trim($_POST['accomp']);
        $sql = "INSERT INTO devs (email, phone, dob, gender, nationality, education, skills, expp, accomp, prospo) VALUES('$emailid','$phone','$dob','$gend','$nat','$educ','$profs_string','$exper','$acc','$prosp')";
        $sql_run=mysqli_query($conn,$sql);
        $sql1="UPDATE users SET usertype = 'dev' WHERE email = '$emailid'";
        $sql_run1=mysqli_query($conn,$sql1);
        if($sql_run && $sql_run1){
            session_start();
            $_SESSION['usrtype']='dev';
            echo "<script type='text/javascript'>alert('Profile Set as Developer. Sent for verification');</script>";
            echo '<script>window.location= "../html/devhome.php"</script>';
        }

    }
    else if($usrtype=='cust') 
    {
        $who=$_POST['whoo'];
        $sql = "INSERT INTO cust (email, phone, dob, gender, nationality, who, prospo) VALUES('$emailid','$phone','$dob','$gend','$nat','$who','$prosp')";
        $sql_run=mysqli_query($conn,$sql);
        $sql1="UPDATE users SET usertype = 'cust' WHERE email = '$emailid'";
        $sql_run1=mysqli_query($conn,$sql1);
        if($sql_run && $sql_run1){
            session_start();
            $_SESSION['usrtype']='cust';
            echo "<script type='text/javascript'>alert('Profile set as Customer');</script>";
            echo '<script>window.location= "../html/custhome.php"</script>';

        }
    }

}

?>





<!-- 
// if($pwd==$cnfpwd){
// 	   	$hashedPwd=password_hash($pwd,PASSWORD_BCRYPT);
// 		 $query = "SELECT * FROM users WHERE email='$emailid'";
// 		 $result =mysqli_query($conn,$query) or die(mysqli_error($conn));
//   	if (mysqli_num_rows($result))
//   	{
// 			echo "<script type='text/javascript'>alert('Username already exists');</script>";
//   	}else{

// 		$sql = "INSERT INTO users (firstname, lastname, email, password ) VALUES('$fstname','$lstname','$emailid','$hashedPwd')";
// 		$sql_run=mysqli_query($conn,$sql);
// 		if($sql_run){
// 		echo "<script type='text/javascript'>alert('Successfully Registered');</script>";
// 		echo '<script>window.location= "../html/login.html"</script>';
// 		}
// 	}
// }else{
// 	echo "<script type='text/javascript'>alert('the two passwords do not match');</script>";
// }
// } -->

