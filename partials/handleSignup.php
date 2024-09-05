<?php
$showerror="false";
if($_SERVER['REQUEST_METHOD']=="POST")
{
    include 'dbconnect.php';
    $user_email=$_POST['SignUpemail'];
    $user_password=$_POST['SignUpPassword'];
    $user_cpassword=$_POST['SignUpcPassword'];

    $existSql="SELECT * FROM  `users` WHERE   `user_email`='$user_email'";
    $result=mysqli_query($conn,$existSql);
    $rows=mysqli_num_rows($result);

    if($rows>0){
       $showerror= "email already in use";

    }
    else{
        if($user_password==$user_cpassword){
            $hash=password_hash($user_password,PASSWORD_DEFAULT);
            $sql="INSERT INTO  `users` (`user_email` , `user_pass`,	`timestamp`) VALUES ('$user_email'	,'$hash', current_timestamp() )";
              $result=mysqli_query($conn,$sql);  
              if($result){
              //echo "signup successfylly";
               header("Location:/index.php?signupsuccess=true");
               exit();
              }
        }
        else{
            $showerror= "Password do not match";
        }
    }
    header("Location:/index.php?signupsuccess=false&error=$showerror");
}

?>