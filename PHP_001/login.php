<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>问卷管理系统 - 登录</title>
    <link rel="stylesheet" type="text/css" href="css/mousetailing.css"/>
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
    <link rel="stylesheet" type="text/css" href="css/login+.css"/>
</head>
<body>
    <canvas id="trailCanvas"></canvas>

    <?php include_once "public/background.php"; ?>

    <div class="login-container">

        <div class="logo-section">
            <div class="logo">QM</div>
            <h1>问卷管理系统</h1>
            <p>数据洞察未来</p>
        </div>

        <form id="loginForm" action="form/doLogin.php" method="post">
            <div class="form-group">
                <input type="text" id="username" placeholder="用户" name="login_name" required>
            </div>

            <div class="form-group password-container">
                <input type="password" id="password" placeholder="密码" name="login_password" required>
                <span class="toggle-password">️</span>
            </div>

            <input class="submit" type="submit" value="登录系统">
        </form>

    </div>

    <script src="js/mousetailing.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/background.js" type="text/javascript" charset="utf-8"></script>
    
</body>
</html>
