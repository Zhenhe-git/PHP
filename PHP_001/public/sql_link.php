<?php 
    try
    {
        $link = new PDO("mysql:host=localhost;dbname=usermanager",'root','123456');
        //echo "数据库连接成功！";
    }
    catch(PDOException $e)
    {
        die('数据库连接失败：' . $e->getMessage());
    }

    $link->exec('set names utf8');   //更改文本编码
?>