<?php
include_once "conn.php";

if(isset($_POST['loginbtn'])){

    $username=$_POST['email'];
    $password=$_POST['pass'];

    $query = "SELECT * FROM users WHERE email = '$username'";
    $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result)==1)
            {
                 while($row = mysqli_fetch_array($result))
                 {
                      if(password_verify($password, $row["password"]))
                      {
                            session_start();
                            $_SESSION['userid']=$row['email'];
                            $_SESSION['fname']=$row['firstname'];
                            $_SESSION['lname']=$row['lastname'];
                            $_SESSION['usrtype']=$row['usertype'];
                            if(empty($_SESSION['usrtype'])){
                              header("location:../html/profile.php?set%20your%20profile");
                              exit();
                            }
                            if(($_SESSION['usrtype'])=='dev'){
                              $query = "SELECT * FROM devs WHERE email = '$username'";
                              $result = mysqli_query($conn, $query);
                              $row = mysqli_fetch_array($result);
                              $_SESSION['isverif']=$row['isverified'];
                              if($_SESSION['isverif']=='cant'){
                                header("location:../html/cantverify.php?cantverifydetails");
                                exit();
                              }
                              header("location:../html/devhome.php?login=success");
                              exit();
                            }
                            else if(($_SESSION['usrtype'])=='cust'){
                              $query = "SELECT * FROM cust WHERE email = '$username'";
                              $result = mysqli_query($conn, $query);
                              $row = mysqli_fetch_array($result);
                              if($row['activeplan']!='notactive'){
                                $_SESSION['plan']=$row['activeplan'];
                              }
                              header("location:../html/custhome.php?login=success");
                              exit();
                            }
                            else if(($_SESSION['usrtype'])=='admin'){

                              header("location:../html/admin.php?login=success");
                              exit();
                              }
                         }
                      else
                      {
                           echo "<script>
                                   alert('Wrong Password')
                                   window.location= '../html/login.html?tryagain'
                                 </script>";
                            exit();
                      }
                 }
            }
            else
            {
                 echo '<script>alert("Wrong User Details")</script>';
                 echo '<script>window.location= "../html/login.html?tryagain"</script>';

                  exit();
            }}
?> 