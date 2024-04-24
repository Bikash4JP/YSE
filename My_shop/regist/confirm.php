<?php
// POSTデータ取得
$posts = $_POST;
// var_dump($posts);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Register</h2>
    <p>この内容で登録しますか？</p>
    <form action="" method="post">
        <div>
            <label for="">Name</label>
            <p><?= $posts['name'] ?></p>
        </div>
        <div>
            <label for="">Email</label>
            <p><?= $posts['email'] ?></p>
        </div>
        <div>
            <button>Regist</button>
            <a href="input.php">Back</a>
        </div>
    </form>
</body>

</html>