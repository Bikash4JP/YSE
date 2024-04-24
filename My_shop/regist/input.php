<?php
// セッションを開始
session_start();
// セッションIDを再発行
session_regenerate_id(true);

$errors = []; // Initialize errors array

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = validate($_POST); // Validate the input
    if (empty($errors)) {
        $_SESSION['my_shop']['regist'] = $_POST;
        header('Location: confirm.php'); // Redirect to confirmation if no errors
        exit;
    } else {
        // Populate the form fields with previously entered values to maintain sticky form behavior
        $regist = $_POST;
    }
} else {
    // Load existing session data into form if present
    $regist = $_SESSION['my_shop']['regist'] ?? [];
}

// Define the validation function
function validate($data) {
    $errors = [];
    if (empty($data['name'])) {
        $errors['name'] = 'Nameを入力してください';
    }
    if (empty($data['email'])) {
        $errors['email'] = 'Emailを入力してください';
    }
    if (empty($data['password'])) {
        $errors['password'] = 'Passwordを入力してください';
    }
    return $errors;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <main class="container">
        <h2 class="text-center p-3">Register</h2>
        <form action="input.php" method="post">
            <div>
                <label class="form-label" for="">Name</label>
                <input class="form-control" type="text" name="name" value="<?= htmlspecialchars($regist['name'] ?? '') ?>">
                <?php if (isset($errors['name'])): ?>
                    <div class="text-danger"><?= $errors['name'] ?></div>
                <?php endif; ?>
            </div>
            <div>
                <label class="form-label" for="">Email</label>
                <input class="form-control" type="text" name="email" value="<?= htmlspecialchars($regist['email'] ?? '') ?>">
                <?php if (isset($errors['email'])): ?>
                    <div class="text-danger"><?= $errors['email'] ?></div>
                <?php endif; ?>
            </div>
            <div>
                <label class="form-label" for="">Password</label>
                <input class="form-control" type="password" name="password">
                <?php if (isset($errors['password'])): ?>
                    <div class="text-danger"><?= $errors['password'] ?></div>
                <?php endif; ?>
            </div>
            <div class="mt-3">
                <button class="btn btn-primary">Next</button>
            </div>
        </form>
    </main>
</body>
</html>
