<?php
include_once "conn.php";
session_start();
if(isset($_POST['submit'])){
    $email = $_SESSION['userid'];
    $country = $_POST['country'];
    $province = $_POST['province'];
    $paymode = $_POST['method'];
    $plan = $_POST['plan'];
    $price = $_POST['price'];
    if($paymode=="card"){
        $cardtype = $_POST['ctype'];
        $st = $_POST['cardnum'];
        $cardnum=substr($st,strlen($st)-5,strlen($st)-1);
        $paycred=$cardtype.' '.'card ending with'.' '.$cardnum;
    }
    else if($paymode=="netbank"){
        $bank = $_POST['bank'];
        $paycred=$bank;
    }
    else if($paymode=="paypal"){
        $paycred='Paypal Secure';

    }
    else if($paymode=="upi"){
        $upiapp = $_POST['upiapp'];
        $upiid = $_POST['upiid'];
        $paycred=$upiid.' '.'using'.' '.$upiapp;
    }

    $sql1 = "INSERT INTO payments (email, country, province, paymode, paycred, plan, price) VALUES('$email','$country','$province','$paymode','$paycred','$plan','$price')";
	$sql_run1=mysqli_query($conn,$sql1);
    $sql2 = "UPDATE  cust SET activeplan='$plan' WHERE email='$email'";
    $sql_run2=mysqli_query($conn,$sql2);
    if($sql_run1 && $sql_run2)
    {
        $_SESSION['plan']=$plan;
        $_SESSION['pay']='yeaa';
        header("location:../html/paymentsuccess.php?success");
        exit();
    }
    else{
        header("location:../html/custhome.php?paymentfailed");
        exit();

    }
    
}