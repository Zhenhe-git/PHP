<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>创建用户 - 问卷管理系统</title>
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
    <link rel="stylesheet" type="text/css" href="css/index.css"/>
    <link rel="stylesheet" type="text/css" href="css/useradd.css"/>
</head>
<body>

    <?php include_once "public/background.php"; ?>

    <?php include_once "public/nav.php"; ?>

    <?php include_once "public/sql_link.php"; ?>

    <main class="admin-main">
        <div class="form-container">
            <h2 class="form-title">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;创建新用户&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</h2>
            <form class="form-grid" action="form/doAdd.php" method="post" enctype="multipart/form-data">
                <!-- 用户名 -->
                <div class="form-group full-width">
                    <label for="username">用户名</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <!-- 头像上传 -->
                <div class="form-group full-width">
                    <label>用户头像</label>
                    <div class="avatar-upload">
                        <input 
                            type="file" 
                            id="avatarInput" 
                            accept="image/*" 
                            style="display: none;"
                            name="userimg"
                            required
                        >
                        <label for="avatarInput" class="avatar-label">
                            <img id="avatarPreview" style="display: none;">
                            <div class="upload-text">点击上传头像</div>
                        </label>
                    </div>
                </div>

                <!-- 密码 -->
                <div class="form-group full-width">
                    <label for="password">密码</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <!-- 邮箱 -->
                <div class="form-group full-width">
                    <label for="email">邮箱</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <!-- 性别 -->
                <div class="form-group full-width">
                    <label>性别</label>
                    <div class="gender-group">
                        <div class="gender-option">
                            <input type="radio" name="sex" id="male" value="男" required>
                            <label class="gender-label" for="male">男性</label>
                        </div>
                        <div class="gender-option">
                            <input type="radio" name="sex" id="female" value="女">
                            <label class="gender-label" for="female">女性</label>
                        </div>
                        <div class="gender-option">
                            <input type="radio" name="sex" id="Binary" value="机">
                            <label class="gender-label" for="Binary">二进制</label>
                        </div>
                    </div>
                </div>

                <div class="form-group full-width">
                    <button type="submit" class="submit-btn">创建用户</button>
                </div>

            </form>
        </div>
    </main>

</body>

<script src="js/useradd.js" type="text/javascript" charset="utf-8"></script>
<script src="js/background.js" type="text/javascript" charset="utf-8"></script>

</html>
