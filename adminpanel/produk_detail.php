<?php
session_start();
require "../koneksi.php";

    $id = $_GET['q'];
    $queryProduk =mysqli_query($con, "SELECT * FROM produk WHERE id='$id'");
    $data =mysqli_fetch_array($query);
    
?>
<style>
    .kotak {
        border: solid;
        background: linear-gradient(135deg, rgb(167, 90, 75), rgb(154, 48, 96));
        padding: 30px;
        height: 100%;
        width: 100%;
        border-radius: 15px;
        overflow: hidden;
        color: white;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Detail Produk</title>
</head>
<body>
<?php require "navbar.php"; ?>
    <div class="kotak">
    <h2>Detail Produk</h2>
    <div class="col-12 col-md-6">
        <form action="" method="post">
        <div>
            <label for="produk">produk</label>
            <input type="text" name="produk" class="form-control" 
                value="<?php echo isset($data['nama']) ? $data['nama'] : ''; ?>">

        </div>

        <div class="mt-3 ">
            <button type="submit" class="btn btn-primary" name="editBtn">Edit</button>
            <button type="submit" class="btn btn-danger" name="deleteBtn">Delete</button>
        </div>
        </form>

        
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
