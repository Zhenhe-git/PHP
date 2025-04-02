<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>问卷管理系统 - 用户列表</title>
    <link rel="stylesheet" type="text/css" href="css/mousetailing.css"/>
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
    <link rel="stylesheet" type="text/css" href="css/index.css"/>
    <link rel="stylesheet" type="text/css" href="css/userlist.css"/>
    <link rel="stylesheet" type="text/css" href="css/userlist+.css"/>
</head>
<body>
    <canvas id="trailCanvas"></canvas>

    <?php include_once "public/background.php"; ?>

    <?php include_once "public/nav.php"; ?>

    <?php include_once "public/sql_link.php"; ?>

    <main class="admin-main">
        <form method="GET" action="form/change_pageSize.php">
            <select name="pageSize" class="page-size-select" onchange="this.form.submit()">
                <option value="5" <?= ($_SESSION['pageSize'] ?? 5) == 5 ? 'selected' : '' ?>>5 条/页</option>
                <option value="8" <?= ($_SESSION['pageSize'] ?? 5) == 8 ? 'selected' : '' ?>>8 条/页</option>
                <option value="10" <?= ($_SESSION['pageSize'] ?? 5) == 10 ? 'selected' : '' ?>>10 条/页</option>
            </select>
        </form>
        <form method="GET" class="global-search">
            <input type="text" name="search" placeholder="搜索用户..." class="search-input">
            <button type="submit" class="search-btn">
                <svg class="search-icon" viewBox="0 0 24 24">
                    <path d="M15.5 14h-.79l-.28-.27a6.5 6.5 0 0 0 1.48-5.34c-.47-2.78-2.79-5-5.59-5.34a6.505 6.505 0 0 0-7.27 7.27c.34 2.8 2.56 5.12 5.34 5.59a6.5 6.5 0 0 0 5.34-1.48l.27.28v.79l4.25 4.25c.41.41 1.08.41 1.49 0 .41-.41.41-1.08 0-1.49L15.5 14zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                </svg>
            </button>
        </form>
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
                        $pageSize= $_SESSION['pageSize'] ?? 5;;
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

    <script src="js/mousetailing.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/background.js" type="text/javascript" charset="utf-8"></script>

</body>
</html>
