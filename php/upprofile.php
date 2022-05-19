<?php
include_once "conn.php";
session_start();

if(isset($_POST['submitbtn'])){
    $emailid = $_POST['e_mail'];
    $phcode = $_POST['phonecode'];
    $phnum = $_POST['phonenum'];
    $phone = "+".$phcode."-".$phnum;
    $nat= $_POST['nats'];
    $prosp=trim($_POST['biot']);
    $query = "SELECT usertype FROM users WHERE email = '$emailid'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $usrtype= $row['usertype'];

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
        $sql = "UPDATE  devs SET phone='$phone' , nationality='$nat' , education='$educ', skills='$profs_string', expp='$exper', accomp='$acc', prospo='$prosp', isverified='no' WHERE email='$emailid'";
        $sql_run=mysqli_query($conn,$sql);
        if($sql_run){
            echo "<script type='text/javascript'>alert('Developer Profile Updated and sent for Verification');</script>";
            if($_SESSION['isverif']=='cant'){
                header("location:../html/cantverify.php?updatedprofile");
                exit();
              }
            echo '<script>window.location= "../html/devhome.php"</script>';
        }

    }
    else if($usrtype=='cust') 
    {
        $sql = "UPDATE  cust SET phone='$phone' , nationality='$nat' , prospo='$prosp' WHERE email='$emailid'";
        $sql_run=mysqli_query($conn,$sql);
        if($sql_run){
            echo "<script type='text/javascript'>alert('Customer Profile Updated');</script>";
            echo '<script>window.location= "../html/custhome.php"</script>';
        }
    }

}

?>




