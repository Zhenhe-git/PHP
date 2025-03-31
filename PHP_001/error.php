<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>问卷管理系统 - 错误</title>
    <link rel="stylesheet" type="text/css" href="css/mousetailing.css"/>
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
    <link rel="stylesheet" type="text/css" href="css/login+.css"/>
    <link rel="stylesheet" type="text/css" href="css/error.css"/>
</head>
<body>
    <canvas id="trailCanvas"></canvas>

    <?php include_once "public/background.php"; ?>

    <div class="login-container" style="text-align: center; padding: 3rem;">
        <div class="logo-section" style="margin-bottom: 2.5rem;">
            <div class="logo" style="background: linear-gradient(45deg, #ff3366, #ff0033);">!</div>
            <h1 style="font-size: 2rem; margin: 1rem 0;">
                <?php 
                    session_start();
                    if($_SESSION['state_captcha_error']==true)
                    {
                        echo "验证码错误";
                    }
                    elseif($_SESSION['state_user_error']==true)
                    {
                        echo "用户名或密码错误";
                    }
                    else
                    {
                        echo "未知错误";
                    }
                ?>
            </h1>
            <p style="font-size: 1.2rem; color: rgba(255,99,71,0.9);">错误：非法的请求信息</p>
        </div>

        <div style="color: rgba(255,255,255,0.8); margin-bottom: 2rem;">
            <p>如对此有疑问 请联系网站管理员</p>
        </div>

        <a href="public/out.php" class="submit" style="text-decoration: none; display: block; margin-top: 1.5rem;
           background: linear-gradient(45deg, #ff3366, #ff0033);">
            返回首页
        </a>
    </div>

    <script src="js/mousetailing.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/background.js" type="text/javascript" charset="utf-8"></script>

</body>
</html>