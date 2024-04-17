<?php 
// 「env.php」を読み込む
require_once 'env.php';

// 設定
$db_connection = DB_CONNECTION;
$db_name = DB_DATABASE;
$db_host = DB_HOST;
$db_port = DB_PORT;


// DB information(DB接続情報)
// mysql:dbname=my_shop;host=port=3306;character=utf8;
$dsn = "{$db_connection}:dbname={$db_name};host={$db_host};port={$db_port};charset=utf8;";
$db_user = DB_USERNAME;
$db_password = DB_PASSWORD;

// DB Connect（データベース接続）
try {
    // DB接続
    $pdo = new PDO($dsn, $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage();
    exit;
}

//SQLクエリ
$sql = "SELECT * FROM users;";
// SQLを実行すると、PDO Statement Object がかえってくる
$stmt = $pdo->query($sql);
// PHPのオブジェクトにコンバート
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($users);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>MySQL Test</h1>
    <dl>
        <dt>Connection</dt>
        <dd><?= $db_connection ?></dd>
        <dt>Host</dt>
        <dd><?= $db_host ?></dd>
        <dt>Port</dt>
        <dd><?= $db_port ?></dd>
    </dl>
    <h2>DSN</h2>
    <p><?= $dsn ?></p>

    <h3>SQL</h3>
    <p><?= $stmt->queryString ?></p>
</body>
</html>