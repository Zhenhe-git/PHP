<?php 
    $u=$_POST['login_name'];
    $p=$_POST['login_password'];

    include_once "../public/sql_link.php";

    $sql="select * from admin where user_name='$u' and password=md5('$p')";
    $rs=$link->query($sql);
    $n=$rs->rowCount();
    if($n>0)
    {
        session_start();
        $_SESSION['loginName']=$u;
        echo '登陆成功！';
        header('location:../userlist.php');
    }
    else
    {
        echo '登陆失败！';
    }
?>