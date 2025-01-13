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
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-makanan d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Makanan">Makanan</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-minuman d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Minuman">Minuman</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-cemilan d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Cemilan">Cemilan</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- tentang kami -->

    <div class="container-fluid warna2 py-5">
        <div class="container text-center text-white">
            <h3>Tentang Kami</h3>
            <p>Di blog Nana’s Restaurant, kami membagikan kisah, tips, dan inspirasi di dunia kuliner. Dari resep favorit hingga tren makanan terkini, nikmati artikel-artikel kami untuk menjelajahi lebih dalam soal makanan dan dunia kuliner.</p>
            <h3>Ikuti Blog Kami untuk Artikel Terbaru</h3>
                <p>Dapatkan pembaruan langsung dan temukan artikel-artikel terbaru kami setiap minggunya. Jika Anda seorang pecinta makanan, jangan lewatkan inspirasi dan tips eksklusif dari Nana's Restaurant.</p>   
        </div>
    </div>

    <!-- produk -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Produk</h3>
                <div class="row mt-5">
                    <div class="col-sm-6 col-md-4 mb-3">
                        <div class="card">
                            <img src="image/bibimbap.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text text-truncate">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <p class="card-text text-harga">Rp. 10000</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>


<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="fontawesome/js/all.min.js"></script>
</body>
</html>