<?php 
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $userimg=$_FILES['userimg'];
    $sex=$_POST['sex'];
    $time=date("Y-m-d");

    include_once "../public/img_upload.php";

    include_once "../public/sql_link.php";   //数据库连接并设置UTF-8字符集
    //通过$link获取SQL连接

    $sql_1="insert into users values (default,'$username','$password','$email','$sex','$time','img/$newname');";
    $result=$link->exec($sql_1);
    if($result)
    {
        echo "记录插入成功！";
    }
    else
    {
        echo "记录插入失败！";
    }

    header('location:../userList.php');
?>