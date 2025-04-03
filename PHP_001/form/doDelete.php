<?php 
    $uid=$_GET['uid'];

    include_once '../public/sql_link.php';

    $sql_1="delete from users where uid=?";

    $rs=$link->prepare($sql_1);
    $rs->bindParam(1,$uid);

    $rs->execute();
    if($rs->errorCode()==0)
    {
        echo "记录删除成功！";
    }
    else
    {
        echo "记录删除失败！";
    }

    header('location:../userList.php');
?>