<?php 
    session_start();
    $_SESSION['loginName']=null;
    header('location:../login.php');
?>