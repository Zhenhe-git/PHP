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
        //$sql_update="update users set username='$username',password='$password',email='$email',sex='$sex',img='$userimg' where uid=$uid";
        $sql_update="update users set username=?,password=?,email=?,sex=?,img=? where uid=?";

        $rs=$link->prepare($sql_update);
        $rs->bindParam(1,$username);
        $rs->bindParam(2,$password);
        $rs->bindParam(3,$email);
        $rs->bindParam(4,$sex);
        $rs->bindParam(5,$userimg);
        $rs->bindParam(6,$uid);
    }
    else
    {
        //$sql_update="update users set username='$username',password='$password',email='$email',sex='$sex' where uid=$uid";
        $sql_update="update users set username=?,password=?,email=?,sex=? where uid=?";

        $rs=$link->prepare($sql_update);
        $rs->bindParam(1,$username);
        $rs->bindParam(2,$password);
        $rs->bindParam(3,$email);
        $rs->bindParam(4,$sex);
        $rs->bindParam(5,$uid);
    }

    $rs->execute();
    if($rs->errorCode()==0)
    {
        echo "记录修改成功！";
    }
    else
    {
        echo "记录修改失败！";
    }

    header('location:../userList.php');
?>