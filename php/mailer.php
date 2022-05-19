<?php
include_once "conn.php";
if(isset($_POST['recover-submit'])){
    $usermail=$_POST['email'];
    if (empty($usermail)){
        header("Location:../html/forgotpass.php?email=empty");
        exit();
        
    }
    else
    {
        $query = "SELECT * FROM users WHERE email = '$usermail' LIMIT 1";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        if(mysqli_num_rows($result)==1)
        {  
            if($row['email']==$usermail){
            $otp=strtoupper(bin2hex(random_bytes(3)));
            $expires=date("U")+600;
            $query = "DELETE FROM forgotpass WHERE email = '$usermail'";
            $result = mysqli_query($conn, $query);
            $hashedotp=password_hash($otp,PASSWORD_BCRYPT);
            $sql = "INSERT INTO forgotpass (email,token, expiry) VALUES('$usermail','$hashedotp','$expires')";
            $sql_run=mysqli_query($conn,$sql);
            if($sql_run){
                $to_email = $usermail;
                $subject = "Reset Your Password for MakeX";
$body = 'Hi,
We received a Password Reset request.
Your OTP is '.$otp.' (Valid only for 10 Minutes).
        
        
Thanks,
MakeX team';
                $headers = "From: MakeX <makex.recovery@gmail.com>";
                mail($to_email, $subject, $body, $headers);
                header("Location:../html/forgotpass.php?email=success&mail=$usermail");
            exit();}}
            else 
            {
            header("Location:../html/forgotpass.php?email=invalid");
            exit();
       
            }
        }
        else 
        {
            header("Location:../html/forgotpass.php?email=invalid");
            exit();
       
        }
    }
}





