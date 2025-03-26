<?php 
    $uid=$_GET['uid'];

    include_once '../public/sql_link.php';

    $sql_1="delete from users where uid={$uid}";
    $result=$link->exec($sql_1);
    if($result)
    {
        echo "记录删除成功！";
    }
    else
    {
        echo "记录删除失败！";
    }

    header('location:../userList.php');
?>