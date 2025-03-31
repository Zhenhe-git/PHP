<?php 
    session_start();
    $_SESSION['loginName']=null;
    $_SESSION['state_captcha_error']=false;
    $_SESSION['state_user_error']=false;

    header('location:../login.php');
?>