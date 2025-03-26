<?php 
    ///完整的文件上传
    date_default_timezone_set('Asia/Shanghai');
    //var_dump($_FILES);   //调试用
    //print_r($_FILES);   //调试用
    $myfile=$_FILES['userimg'];
    $filename=$myfile['name'];

    $ext=pathinfo($filename,PATHINFO_EXTENSION);
    $newname="f_" . date('YmdHms') . rand(1000,9999) . "." . $ext;
    
    $allowType=['gif','jpg','jpeg','png'];
    if(!empty($filename))
    {
        if(in_array($ext,$allowType))
        {
            $path='../img/';
            move_uploaded_file($myfile['tmp_name'], $path . $newname);   //把上传的临时文件，存在目录下，用新名字命名。
            if($myfile['error']==0)
            {
                //echo "上传成功，新文件名为：{$newname}";   //本行用于测试
            }
            else
            {
                echo "上传失败！<br>";
            }
        }
        else
        {
            echo "非法的文件！";
        }
    }
    ///
?>