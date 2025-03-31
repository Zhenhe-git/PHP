<?php
session_start();

// 初始化玩家数据
if (!isset($_SESSION['player'])) {
    $_SESSION['player'] = [
        'hp' => 100,
        'max_hp' => 100,
        'attack' => 15,
        'defense' => 10,
        'gold' => 50,
        'level' => 1
    ];
}

// 敌人数据（示例）
$enemies = [
    'Goblin' => ['hp' => 30, 'attack' => 10, 'defense' => 5, 'gold' => 20],
    'Orc' => ['hp' => 50, 'attack' => 15, 'defense' => 10, 'gold' => 35],
    'Dragon' => ['hp' => 100, 'attack' => 25, 'defense' => 15, 'gold' => 100]
];

// 处理战斗
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['attack'])) {
        $enemy_type = array_rand($enemies);
        $enemy = $enemies[$enemy_type];
        
        // 玩家攻击
        $player_damage = max($_SESSION['player']['attack'] - $enemy['defense'], 1);
        $enemy['hp'] -= $player_damage;
        
        // 敌人反击（如果存活）
        if ($enemy['hp'] > 0) {
            $enemy_damage = max($enemy['attack'] - $_SESSION['player']['defense'], 1);
            $_SESSION['player']['hp'] -= $enemy_damage;
        }
        
        // 处理战斗结果
        if ($_SESSION['player']['hp'] <= 0) {
            $result = "你被{$enemy_type}击败了！";
            session_destroy();
        } else {
            $result = "你战胜了{$enemy_type}！获得{$enemy['gold']}金币！";
            $_SESSION['player']['gold'] += $enemy['gold'];
        }
    }
    
    // 处理治疗
    if (isset($_POST['heal'])) {
        if ($_SESSION['player']['gold'] >= 30) {
            $_SESSION['player']['hp'] = $_SESSION['player']['max_hp'];
            $_SESSION['player']['gold'] -= 30;
            $result = "消耗30金币恢复了全部生命值！";
        } else {
            $result = "金币不足，无法治疗！";
        }
    }
    
    // 重置游戏
    if (isset($_POST['reset'])) {
        session_destroy();
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>简易RPG游戏</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
        .status-box { border: 2px solid #333; padding: 15px; margin-bottom: 20px; }
        .button { padding: 10px 20px; margin: 5px; cursor: pointer; }
        .event-log { border: 1px solid #ccc; padding: 10px; height: 150px; overflow-y: auto; }
    </style>
</head>
<body>
    <h1>简易RPG游戏</h1>
    
    <div class="status-box">
        <h2>玩家状态</h2>
        <p>等级: <?= $_SESSION['player']['level'] ?></p>
        <p>生命值: <?= $_SESSION['player']['hp'] ?>/<?= $_SESSION['player']['max_hp'] ?></p>
        <p>攻击力: <?= $_SESSION['player']['attack'] ?></p>
        <p>防御力: <?= $_SESSION['player']['defense'] ?></p>
        <p>金币: <?= $_SESSION['player']['gold'] ?></p>
    </div>

    <div class="actions">
        <form method="post">
            <button class="button" type="submit" name="attack">攻击随机敌人</button>
            <button class="button" type="submit" name="heal">治疗（30金币）</button>
            <button class="button" type="submit" name="reset">重新开始</button>
        </form>
    </div>

    <?php if (!empty($result)): ?>
    <div class="event-log">
        <h3>战斗日志</h3>
        <p><?= htmlspecialchars($result) ?></p>
    </div>
    <?php endif; ?>
</body>
</html>