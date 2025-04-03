<?php 
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $userimg=$_FILES['userimg'];
    $sex=$_POST['sex'];
    $time=date("Y-m-d");

    include_once "../public/img_upload.php";

    $imgsrc='img/' . $newname;

    include_once "../public/sql_link.php";   //数据库连接并设置UTF-8字符集
    //通过$link获取SQL连接

    $sql_1="insert into users values (default,?,?,?,?,?,?);";   //防止SQL注入的预设语句
    $rs=$link->prepare($sql_1);
    $rs->bindParam(1,$username);
    $rs->bindParam(2,$password);
    $rs->bindParam(3,$email);
    $rs->bindParam(4,$sex);
    $rs->bindParam(5,$time);
    $rs->bindParam(6,$imgsrc);

    $rs->execute();
    if($rs->errorCode()==0)
    {
        echo "记录插入成功！";
    }
    else
    {
        echo "记录插入失败！";
    }

    header('location:../userList.php');
?>