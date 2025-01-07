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
?>

<style>
    .kotak{
        border: solid;
        background: linear-gradient(135deg,rgb(167, 90, 75),rgb(154, 48, 96)); /* Gradien menarik */
        padding: 30px;
        height: 100vh;
        width: 100%;
        border-radius: 15px;
        color: white;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease; 
    
    }
    .tabel {
        margin-top: 5px
        
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>
<body>
    <?php require "navbar.php"; ?>
    <div class="kotak">
    <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="../adminpanel">
                    <i class="fas fa-home "></i>Home
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-align-justify "></i>Kategori
                </li>
            </ol>
    </nav>
    <div class="my-5">
        <h3>Tambah Kategori</h3>

        <form action="" method="post">
            
        </form>
    </div>

    <div class="tabel">
        <h2>List Kategori</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Nama</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $number = 1;
                        if ($jumlahKategori == 0) {
                            echo "<tr><td colspan='2'>Tidak Ada data Kategori</td></tr>";
                        } else {
                            while ($data = mysqli_fetch_array($queryKategori)) {
                                ?>
                                <tr>
                                    <td><?php echo $number; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                </tr>
                                <?php
                                $number++;
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
        
    </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>