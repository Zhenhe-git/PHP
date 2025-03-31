<?php  
    session_start();
    if($_SESSION['loginName']==null || empty($_SESSION['loginName']))
    {
        header('location:login.php');
    }
?>
    <nav class="admin-sidebar">
        <div class="user-panel">
            <div class="user-avatar" style="user-select: none;">Heresy</div>
            <h3 style="color: white; user-select: none;"><?php echo $_SESSION['loginName']; ?></h3>
            <p style="color: rgba(255, 255, 255, 0.6); user-select: none;">管理员界面系统 V0.12</p>
        </div>

        <ul class="admin-menu">
            <li class="menu-item">
                <a href="index.php" class="active" style="user-select: none;">主页</a>
            </li>
            <!-- <li class="menu-item">
                <a href="game.php" class="active" style="user-select: none;">游戏管理</a>
            </li> -->
            <li class="menu-item">
                <a href="userList.php" style="user-select: none;">用户列表</a>
            </li>
            <li class="menu-item">
                <a href="public/out.php" style="color: #ff6666; user-select: none;">退出系统</a>
            </li>
        </ul>
    </nav>