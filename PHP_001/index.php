<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>问卷管理系统 - 主页</title>
    <link rel="stylesheet" type="text/css" href="css/mousetailing.css"/>
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
    <link rel="stylesheet" type="text/css" href="css/index.css"/>
</head>
<body>
    <canvas id="trailCanvas"></canvas>

    <?php include_once "public/background.php"; ?>

    <?php include_once "public/nav.php"; ?>

    <main class="admin-main">
        <div class="detail-card">
            <div class="card-header">
                <h2>仪表盘</h2>
            </div>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">内容</div>
                    <div class="info-content">预设内容七个字</div>
                </div>

            </div>
        </div>
    </main>

    <script src="js/mousetailing.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/background.js" type="text/javascript" charset="utf-8"></script>

</body>
</html>