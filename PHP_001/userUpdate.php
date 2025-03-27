<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>问卷管理系统 - 修改用户</title>
    <link rel="stylesheet" type="text/css" href="css/mousetailing.css"/>
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
    <link rel="stylesheet" type="text/css" href="css/index.css"/>
    <link rel="stylesheet" type="text/css" href="css/useradd.css"/>
</head>
<body>
    <canvas id="trailCanvas"></canvas>

    <?php include_once "public/background.php"; ?>

    <?php include_once "public/nav.php"; ?>

    <?php include_once "public/sql_link.php"; ?>

    <?php 
        $uid=$_GET['uid'];
        $sql="select * from users where uid=$uid";
        $rs=$link->query($sql);
        $row=$rs->fetch();
    ?>

    <main class="admin-main">
        <div class="form-container">
            <h2 class="form-title">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;编辑用户&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</h2>
            <form class="form-grid" action="form/doUpdate.php?uid=<?php echo $row['uid']; ?>" method="post" enctype="multipart/form-data">
                
                <div class="form-group full-width">
                    <label for="username">用户名</label>
                    <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>" required>
                </div>

                <div class="form-group full-width">
                    <label>用户头像</label>
                    <div class="avatar-upload">
                        <input 
                            type="file" 
                            id="avatarInput" 
                            accept="image/*" 
                            style="display: none;"
                            name="userimg"
                        >
                        <label for="avatarInput" class="avatar-label">
                            <img id="avatarPreview" style="display: none;">
                            <div class="upload-text">点击上传新头像</div>
                        </label>
                    </div>
                </div>

                <div class="form-group full-width">
                    <label for="password">密码</label>
                    <input type="password" id="password" name="password" value="<?php echo $row['password']; ?>" required>
                </div>

                <div class="form-group full-width">
                    <label for="email">邮箱</label>
                    <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>
                </div>

                <div class="form-group full-width">
                    <label>性别</label>
                    <div class="gender-group">
                        <div class="gender-option">
                            <input type="radio" name="sex" id="male" value="男" <?php echo ($row['sex']=='男')?'checked':'' ?> >
                            <label class="gender-label" for="male">男性</label>
                        </div>
                        <div class="gender-option">
                            <input type="radio" name="sex" id="female" value="女" <?php echo ($row['sex']=='女')?'checked':'' ?> >
                            <label class="gender-label" for="female">女性</label>
                        </div>
                        <div class="gender-option">
                            <input type="radio" name="sex" id="Binary" value="机" <?php echo ($row['sex']=='机')?'checked':'' ?> >
                            <label class="gender-label" for="Binary">二进制</label>
                        </div>
                    </div>
                </div>

                <div class="form-group full-width">
                    <button type="submit" class="submit-btn">确认修改</button>
                </div>

                <div class="form-group full-width" style="margin-top: -0.5rem;">
                    <button type="button" class="delete-btn" onclick="if(confirm('确定要永久删除该用户吗？此操作不可逆！')) { window.location.href='form/doDelete.php?uid=<?php echo $row['uid']; ?>'; }">删除用户</button>
                </div>
                
            </form>
        </div>
    </main>

</body>

<script src="js/mousetailing.js" type="text/javascript" charset="utf-8"></script>
<script src="js/background.js" type="text/javascript" charset="utf-8"></script>
<script src="js/useradd.js" type="text/javascript" charset="utf-8"></script>

</html>
