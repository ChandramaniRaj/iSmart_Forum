<?php
$showerror="false";
if($_SERVER['REQUEST_METHOD']=="POST")
{
    include 'dbconnect.php';
    $user_email=$_POST['LoginEmail'];
    $user_password=$_POST['LoginPassword'];
    

    $existSql="SELECT * FROM  `users` WHERE   `user_email`='$user_email'";
    $result=mysqli_query($conn,$existSql);
    $rows=mysqli_num_rows($result);

    if($rows==1){
      $row=mysqli_fetch_assoc($result);
      if(password_verify($user_password, $row['user_pass'])){
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['username']=$user_email;
        $_SESSION['user_id']=$row['S.NO.'];
       
         header("location: /index.php?loggedin=true");
         exit();
      }
      else{
        $showerror="password not match";
        header("location: /index.php?loggedin=false&error=$showerror");
        exit();
      }
    }
    $showerror="Invalid user";
    header("location: /index.php?loggedin=false&error=$showerror");
}
?>