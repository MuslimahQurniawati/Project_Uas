<?php
session_start();

// Konfigurasi database
$host = 'localhost';
$dbname = 'toko_online';
$user = 'root'; // Ganti sesuai dengan username database
$password = ''; // Ganti sesuai dengan password database

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Ambil data dari database
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->execute(['username' => $username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['username'] = $username; // Set session
                header('Location: index.php'); // Redirect ke halaman index
                exit;
            } else {
                $error = "Username atau password salah!";
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<style>
    .main{
        height: 100vh;
    }
    .login-box{
        width: 500px;
        height: 300px;
        border: 2px solid;
    }
</style>
<body>
    <div class="main d-flex justify-content-center align-items-center">
        <div class="login-box p-5">
            <form method="POST" action="">
                <div>
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div>
                <label for="username">Password</label>
                <input type="text" class="form-control" name="password" id="password" required>
                </div>
                <div>
                    <button class="btn btn-success form-control mt-3 mb-3" type="submit">Login</button>
                </div>
            <?php if (!empty($error)): ?>
                <p style="color: red;"><?php echo $error; ?></p>
                <?php endif; ?>
            
            </form>
        </div>
    </div>

    
    
</body>
</html>
