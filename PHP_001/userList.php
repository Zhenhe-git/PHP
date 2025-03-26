<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>问卷管理系统 - 用户列表</title>
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
    <link rel="stylesheet" type="text/css" href="css/index.css"/>
    <link rel="stylesheet" type="text/css" href="css/userlist.css"/>
    <link rel="stylesheet" type="text/css" href="css/userlist+.css"/>
</head>
<body>

    <?php include_once "public/background.php"; ?>

    <?php include_once "public/nav.php"; ?>

    <?php include_once "public/sql_link.php"; ?>

    <main class="admin-main">
        <div class="create-user-wrapper">
            <button class="create-user-btn" onclick="window.location.href='userAdd.php'">手动创建用户</button>
        </div>
        <table class="user-table">
            <thead>
                <tr>
                    <th>用户ID</th>
                    <th>用户名</th>
                    <th>头像</th>
                    <th>密码</th>
                    <th>邮箱</th>
                    <th>性别</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                        $sql_1="select * from users order by uid desc";
                        $rs=$link->query($sql_1);
                        $wholeCount=$rs->rowCount();
                        $pageSize=5;
                        $pageCount=ceil($wholeCount/$pageSize);
                    
                        if(empty($_GET["page"]))
                        {
                          $page=1;
                        }
                        else
                        {
                          $page=$_GET["page"];
                        }
                        $start=($page-1)*$pageSize;
                        $sqlPage="select * from users order by uid desc limit $start,$pageSize";
                        $rsPage=$link->query($sqlPage);
                    
                        while($row=$rsPage->fetch())
                        {
                            echo
                            "
                            <tr>
                                <td>{$row['uid']}</td>
                                <td>{$row['username']}</td>
                                <td><img id='img_tx' src='{$row['img']}' alt='头像'></td>
                                <td>{$row['password']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['sex']}</td>
                                <td><button class='edit-btn' onclick=\"location.href='userUpdate.php?uid={$row['uid']}'\">编辑</button></td>
                            </tr>
                            ";
                        }
                ?>
            </tbody>
        </table>

        <div class="pagination">
            <?php 
                for($i=1;$i<=$pageCount;$i++)
                {
                  if($page==$i)
                  {
                    echo "<div class='page-item active' onclick=\"window.open('?page=$i','_self')\">$i</div>";
                  }
                  else
                  {
                    echo "<div class='page-item' onclick=\"window.open('?page=$i','_self')\">$i</div>";
                  }
                }
            ?>
        </div>

    </main>

    <script src="js/background.js" type="text/javascript" charset="utf-8"></script>

</body>
</html>
