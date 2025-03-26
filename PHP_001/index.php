<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>问卷管理系统 - 后台</title>
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
    <link rel="stylesheet" type="text/css" href="css/index.css"/>
</head>
<body>

    <?php include_once "public/background.php"; ?>

    <?php include_once "public/nav.php"; ?>

    <main class="admin-main">
        <div class="detail-card">
            <div class="card-header">
                <h2>用户信息 - 张三</h2>
            </div>
            <button class="edit-btn">修改信息</button>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">用户ID</div>
                    <div class="info-content">USR2023001</div>
                </div>
                <div class="info-item">
                    <div class="info-label">注册时间</div>
                    <div class="info-content">2023-08-15 14:30</div>
                </div>
                <div class="info-item">
                    <div class="info-label">联系电话</div>
                    <div class="info-content">138-1234-5678</div>
                </div>
                <div class="info-item">
                    <div class="info-label">最近登录</div>
                    <div class="info-content">2023-08-20 09:15</div>
                </div>
            </div>
        </div>
    </main>

    <script src="js/background.js" type="text/javascript" charset="utf-8"></script>

</body>
</html>