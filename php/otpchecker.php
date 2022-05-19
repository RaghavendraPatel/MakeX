<?php
include_once "conn.php";
if(isset($_POST['otp-submit-btn'])){
    $usermail=$_POST['userma'];
    $userotp=$_POST['otp'];
    if (empty($userotp)){
        header("Location:../html/forgotpass.php?email=otpinvalid&mail=$usermail");
        exit();
    }

    $nowtime=date("U");
    $query = "SELECT * FROM forgotpass WHERE email = '$usermail' AND expiry>='$nowtime'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);

            if(password_verify($userotp, $row['token']))
            {
                header("location:../html/resetpass.php?reset");
                exit();
            }
            else{
                header("Location:../html/forgotpass.php?email=otpinvalid&mail=$usermail");
                exit(); 
             }
         
        }else{
            header("Location:../html/forgotpass.php?email=otpexpired");
            exit(); 

        }

}


?>