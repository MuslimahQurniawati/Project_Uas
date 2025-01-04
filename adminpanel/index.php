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
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>
<style>
    
    .kotak{
        border: solid;
        background: linear-gradient(135deg, #ff512f, #dd2476); /* Gradien menarik */
        padding: 20px;
        width: 100%;
        border-radius: 15px; /* Sudut melengkung */
        color: white;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Efek bayangan */
        transition: transform 0.3s ease, box-shadow 0.3s ease; 
    
    }
    
    .card {
        background: linear-gradient(135deg,rgb(209, 56, 26), #dd2476);
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        gap: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }
    .icon {
        display: flex;
        }
    .text .category {
        font-size: 1.2em;
        font-weight: bold;
        margin: 0;
        color: #333;
        display: flex;
        }

    .text .detail {
        font-size: 0.9em;
        color: #007bff;
        text-decoration: none;
        }

    .text .detail:hover {
        text-decoration: underline;
        color: #0056b3;
        }
</style>
<body>
    <?php require "navbar.php"; ?>
    <div class="kotak mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-home "></i>Home
                </li>
            </ol>
        </nav>
        <h2>Selamat datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <div class="card">
            <div class="icon">
            <i class="fas fa-align-justify fa-7x"></i>
            </div>
            <div class="text">
            <p class="category">Kategori</p>
            <a href="kategori.php" class="detail">Lihat Detail</a>
            </div>
        </div>

        <div class="card">
            <div class="icon">
            <i class="fas fa-align-justify fa-7x"></i>
            </div>
            <div class="text">
            <p class="category">Kategori</p>
            <a href="kategori.php" class="detail">Lihat Detail</a>
            </div>
        </div>

        <div class="card">
            <div class="icon">
            <i class="fas fa-align-justify fa-7x"></i>
            </div>
            <div class="text">
            <p class="category">Kategori</p>
            <a href="kategori.php" class="detail">Lihat Detail</a>
            </div>
        </div>

        <div class="card">
            <div class="icon">
            <i class="fas fa-align-justify fa-7x"></i>
            </div>
            <div class="text">
            <p class="category">Kategori</p>
            <a href="kategori.php" class="detail">Lihat Detail</a>
            </div>
        </div>

        <div class="card">
            <div class="icon">
            <i class="fas fa-align-justify fa-7x"></i>
            </div>
            <div class="text">
            <p class="category">Kategori</p>
            <a href="kategori.php" class="detail">Lihat Detail</a>
            </div>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>
