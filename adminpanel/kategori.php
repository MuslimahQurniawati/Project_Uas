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
    .kotak {
        border: solid;
        background: linear-gradient(135deg, rgb(167, 90, 75), rgb(154, 48, 96));
        padding: 30px;
        height: auto;
        width: 100%;
        border-radius: 15px;
        overflow: hidden;
        color: white;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    table {
        background-color: rgba(255, 255, 255, 0.9); /* Transparansi latar belakang tabel */
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        border-collapse: collapse;
    }

    table th, table td {
        padding: 12px 15px;
        text-align: left;
    }

    table thead th {
        background-color: rgba(154, 48, 96, 0.9); /* Warna header tabel */
        color: white;
        font-weight: bold;
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
    <div class="my-5 col-12 col-md-6">
        <h3>Tambah Kategori</h3>

        <form action="" method="post">
            <div>
                <label for="kategori">Kategori</label>
                <input type="text" id="kategori" name="kategori" placeholder="input nama kategori" class="form-control">
            </div>
            <div class="mt-3">
                <button class="btn btn-primary" type="submit" name="simpan_kategori">Simpan</button>
            </div>
        </form>

        <?php
            if(isset($_POST['simpan_kategori'])){
                $kategori = htmlspecialchars($_POST['kategori']);
                $queryExist = mysqli_query($con, "SELECT nama FROM kategori WHERE nama='$kategori'");
                $kategoriBaru = mysqli_num_rows($queryExist);
                
                if($kategoriBaru > 0){
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">Kategori Sudah Ada</div>
                    <?php
                } else {
                    $querySimpan = mysqli_query($con, "INSERT INTO kategori (nama) VALUES ('$kategori')");
                    
                    if($querySimpan){
                        ?>
                        <div class="alert alert-primary mt-3" role="alert">
                            Kategori Berhasil Disimpan
                        </div>
                        <?php
                    }

                }
            }
        ?>
    </div>

    <div class="tabel">
        <h2>List Kategori</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Nama</th>
                        <th>Action</th>
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
                                        <td>
                                        <a href="kategori-detail.php?p<?php echo $data['id']; ?>" 
                                        class="btn btn-info">
                                        <i class="fa fa-search"></i>
                                    
                                        </td>
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