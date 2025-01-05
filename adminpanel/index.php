
<?php
session_start();
require "../koneksi.php";

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}


$queryKategori = mysqli_query($con, "SELECT * FROM kategori");
$jumlahKategori = mysqli_num_rows($queryKategori);

$queryProduk = mysqli_query($con, "SELECT * FROM produk");
$jumlahProduk = mysqli_num_rows($queryProduk);

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
        background: linear-gradient(135deg,rgb(167, 90, 75),rgb(154, 48, 96)); /* Gradien menarik */
        padding: 30px;
        height: 100vh;
        width: 100%;
        border-radius: 15px; /* Sudut melengkung */
        color: white;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Efek bayangan */
        transition: transform 0.3s ease, box-shadow 0.3s ease; 
    
    }
    
    .card {
        background: linear-gradient(135deg,rgb(209, 56, 26), #dd2476);
        padding: 10px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: grid;
        align-items: center;
        text-align:center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 300px;
        width: 210px;
        margin: 20px;
        position: relative;
        grid-template-rows: auto 1fr;
        border-radius: 15px;
        transition: .2s ease-in-out;
        }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

    .menu{
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100px;
        }
    .icon {
        display: center;
        margin-top: 30px
        }
    .text .category {
        font-size: 1.5em;
        font-weight: bold;
        margin: 0;
        color: #333;
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
    <div class="kotak ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-home "></i>Home
                </li>
            </ol>
        </nav>
        <h2>Selamat datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>

        <div class="menu">
            <div class="card">
                <div class="icon">
                <i class="fas fa-align-justify fa-7x"></i>
                </div>
                <div class="text">
                <p class="category">Kategori</p>
                <p><?php echo $jumlahKategori ?> Kategori</p>
                <a href="kategori.php" class="detail">Lihat Detail</a>
            </div>
        </div>

        <div class="card">
            <div class="icon">
                <i class="fas fa-shopping-cart fa-7x"></i>
                </div>
                <div class="text">
                <p class="category">Produk</p>
                <p><?php echo $jumlahProduk ?> Menu</p>
                <a href="produk.php" class="detail">Lihat Detail</a>
            </div>
        </div>

        <div class="card">
            <div class="icon">
                <i class="fas fa-sign-out fa-7x"></i>
            </div>
            <div class="text">
                <a href="login.php" class="detail"><p class="category">Logout</p></a>
            </div>
            </div>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>
