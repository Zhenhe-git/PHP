<?php 
    session_start();
    
    $u=$_POST['login_name'];
    $p=$_POST['login_password'];

    include_once "../public/sql_link.php";

    $sql="select * from admin where user_name='$u' and password=md5('$p')";
    $rs=$link->query($sql);
    $n=$rs->rowCount();
    if(strtoupper($_POST["captcha"])==strtoupper($_SESSION['vCode']))
    {
        if($n>0)
        {
            $_SESSION['loginName']=$u;   //计入session,跨页面，默认20min时效。

            header('location:../userlist.php');
        }
        else
        {
            $_SESSION['state_user_error']=true;

            header('location:../error.php');
        }
    }
    else
    {
        $_SESSION['state_captcha_error']=true;

        header('location:../error.php');
    }
?>