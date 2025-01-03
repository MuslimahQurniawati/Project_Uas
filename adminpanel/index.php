<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <h2>Selamat datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <form method="POST">
        <button type="submit" name="logout">Logout</button>
    </form>
</body>
</html>
