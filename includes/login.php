<?php 
include "DB.php";
include "../functions/functions.php";
session_start();

if(isset($_POST['login_submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $username=mysqli_real_escape_string($connection,$username);
    $password=mysqli_real_escape_string($connection,$password);

    $query="SELECT * FROM users WHERE user_username = '$username'";
    $query_do=mysqli_query($connection,$query);
    confirm_query($query_do);
    $row=mysqli_fetch_array($query_do);
    
    $db_user_id=$row['user_id'];
    $db_username=$row['user_username'];
    $db_fname=$row['user_fname'];
    $db_lname=$row['user_lname'];
    $db_email=$row['user_email'];
    $db_role=$row['user_role'];
    $db_password=$row['user_password'];


    if(password_verify($password,$db_password)){
        $_SESSION['username']=$db_username;
       $_SESSION['user_fname']=$db_fname;
       $_SESSION['user_lname']=$db_lname;
       $_SESSION['user_role']=$db_role;
       $_SESSION['user_id']=$db_user_id;
      
       header("Location:../admin/index.php");
    }else {
      
       header("Location:../index.php");
       
       
    
    }
}

?>