<?php 
    include_once "../public/sql_link.php";
    include_once "../public/img_upload.php";

    $uid=$_GET['uid'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $sex=$_POST['sex'];

    echo $_FILES['userimg']['name'];

    if(!empty($_FILES['userimg']['name']))
    {
        $userimg="img/" . $newname;
    }
    
    if(!empty($_FILES['userimg']['name']))
    {
        $sql_update="update users set username='$username',password='$password',email='$email',sex='$sex',img='$userimg' where uid=$uid";

    }
    else
    {
        $sql_update="update users set username='$username',password='$password',email='$email',sex='$sex' where uid=$uid";
    }
    $result=$link->exec($sql_update);

    if($result)
    {
        echo "记录修改成功！";
    }
    else
    {
        echo "记录修改失败！";
    }

    header('location:../userList.php');
?>