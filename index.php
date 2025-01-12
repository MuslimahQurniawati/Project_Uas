<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nana's | Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require "navbar.php"; ?>
    <!-- banner -->
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center text-white">
           <h1>Selamat Datang di Nana's</h1>
           <h3>Apa yang Anda butuhkan?</h3>
                <div class="col-md-8 offset-md-2">
                    <form method="get" action="produk.php">
                        <div class="input-group input-group-lg my-4">
                            <input type="text" class="form-control" placeholder="Nama Menu" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
                            <button type="submit" class="btn warna2 text-white">Telusuri</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>

    <!-- hight fluid -->

    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Terlaris</h3>

            <div class="row mt-4">
                <div class="col-4">
                    <div class="highlighted-kategori kategori-makanan d-flex justify-content-center align-items-center">
                        <h4 class="text-white">Makanan</h4>
                    </div>
                </div>
                <div class="col-4">
                    <div class="highlighted-kategori kategori-minuman d-flex justify-content-center align-items-center">
                        <h4 class="text-white">Minuman</h4>
                    </div>
                </div>
                <div class="col-4">
                    <div class="highlighted-kategori kategori-cemilan d-flex justify-content-center align-items-center">
                        <h4 class="text-white">Cemilan</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="fontawesome/js/all.min.js"></script>
</body>
</html>