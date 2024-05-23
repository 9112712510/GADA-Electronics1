<?php
session_start();
include('../config/db.php');
include('myfunctions.php');
if(isset($_POST['submit']))
{
    $full_name= mysqli_real_escape_string($conn, $_POST['full_name']);
    $phone= mysqli_real_escape_string($conn, $_POST['phone']);
    $email= mysqli_real_escape_string($conn, $_POST['email']);
    $password= mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword= mysqli_real_escape_string($conn, $_POST['cpassword']);



    $check_email_query = "SELECT * from log_users where email='$email'";
    $check_email_query_run = mysqli_query($conn, $check_email_query);

    if(mysqli_num_rows($check_email_query_run)> 0)
    {
        $_SESSION['message'] = "Email aleardy exits";
        header('Location: ../regis.php');
    }
    else
    {
       if($password == $cpassword)
       {
          $insert_query =  "INSERT INTO `log_users` (`full_name`, `phone`, `email`, `password`) VALUES  ('$full_name', '$phone', '$email', '$password' )";
          $insert_query_run = mysqli_query($conn,$insert_query);

            if($insert_query_run)
         {
        $_SESSION['message'] = "Registered succesfully";
        header('Location: ../login.php');
       }
       else
       {
        $_SESSION['message'] = "Something went wroung";
        header('Location: ../regis.php');
       }
       }
    else{
        $_SESSION['message'] = "Password does not match";
        header('Location: ../regis.php');
    }
    }
}
else if(isset($_POST['login_btn']))
{
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $login_query = "SELECT * FROM log_users WHERE email='$email' AND password='$password'" ;
    $login_query_run = mysqli_query($conn, $login_query);

    if(mysqli_num_rows($login_query_run)>0)
    {
        $_SESSION['auth'] =true;
        $userdata = mysqli_fetch_array($login_query_run);
        $userid = $userdata['id'];
        $username = $userdata['full_name'];
        $useremail = $userdata['email'];
        $role_as = $userdata['role_as'];

        $_SESSION['auth_user']=[
            'user_id' => $userid,
            'full_name' => $username,
            'email' => $useremail
        ];

        $_SESSION['role_as'] = $role_as;

        if($role_as == 1){

            redirect("../admin/admindash.php", "Welcome to dashboard");

        }
        else{

            redirect(" ../index1.php", "Logged In Successfully");
           
        }


    }
    else{

        redirect(" ../login.php", "Invalid Credentials");
       
    }
}
?>