<?php
session_start();
require "../koneksi.php";

    $queryProduk = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.kategori_id=b.id");
    $jumlahProduk = mysqli_num_rows($queryProduk);

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");

    function generateRandomString($length = 10){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString ='';
        for ($i =0; $i < $length; $i++){
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>
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
    table {
        background-color: rgba(255, 255, 255, 0.9); /* Transparansi latar belakang tabel */
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        border-collapse: collapse;
    }
</style>
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
                    <i class="fas fa-shopping-cart "></i>produk
                </li>
            </ol>
    </nav>

    <div class="my-5 col-12 col-md-6">
        <h3>Tambah Produk</h3>

        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="nama">Nama</label>
                <input type="text" id="produk" name="nama" placeholder="input nama produk" class="form-control" required >
            </div>
            <div class=>
                <label for="kategori">kategori</label>
                <select name="kategori" id="kategori" class="form-control"  required>
                    <option value="">Pilih kategori</option>
                    <?php
                        while($data=mysqli_fetch_array($queryKategori)){
                        ?>
                            <option value="<?php echo $data['id'] ?>"><?php echo $data['nama']; ?> </option>
                        <?php        
                        }
                    ?>
                </select>
            </div>

            <div>
                <label for="harga">Harga</label>
                <input type="number" class="form-control" name="harga" required >
            </div>

            <div>
                <label for="foto">Foto</label>
                <input type="file" name="foto" id="foto" class="form-control">
            </div>
            <label for="detail">Detail</label>
                <textarea name="detail" id="detail" class="form-control"></textarea>

            <div>
                <label for="stok" >Stok</label>
                <select name="stok" id="stok" class="form-control">
                    <option value="tersedia">Tersedia</option>
                    <option value="habis">Habis</option>
                </select>
            </div>

            <div class="mt-3">
                <button class="btn btn-primary" type="submit" name="simpan_produk">Simpan</button>
            </div>
        </form>

        <?php
            if(isset($_POST['simpan_produk'])){
                $nama = htmlspecialchars($_POST['nama']);
                $kategori = htmlspecialchars($_POST['kategori']);
                $harga = htmlspecialchars($_POST['harga']);
                $detail = htmlspecialchars($_POST['detail']);
                $stok = htmlspecialchars($_POST['stok']);

                $target_dir = "../image/";
                $nama_file = basename($_FILES["foto"]["name"]);
                $target_file = $target_dir . $nama_file;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $image_size= $_FILES["foto"]["size"];
                $random_name = generateRandomString(20);
                $new_name = $random_name . "." . $imageFileType;

                if($nama=='' || $kategori=='' || $harga==''){
                ?>
                    <div class="alert alert-warning mt-3" role="alert">
                            Nama, Kategori dan Harga wajib di isi
                    </div>
                <?php    
                }
                else{
                    if($nama_file!=''){
                        if($image_size >500000){
        ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                file tidak boleh lebih dari 500kb
                            </div>
        <?php                   
                        }
                            else{
                                if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'gif'){
        ?>
                                <div class="alert alert-warning mt-3" role="alert">
                                    file wajib bertipe jpg, png atau gif
                                </div>    
        <?php                        
                            }
                            else{
                                    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);
                                }
                    }
                }
                    //query insert
                    $queryTambah = mysqli_query($con, "INSERT INTO produk (kategori_id, nama, harga, foto, detail, stok) VALUES ('$kategori', '$nama', '$harga', '$new_name', '$detail', '$stok')");

                    if($queryTambah){
        ?>
                        <div class="alert alert-primary mt-3" role="alert">
                            Kategori Berhasil Disimpan
                        </div>
        <?php
                    }
                    else{
                        echo_mysqli_error($con);
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
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($jumlahProduk == 0) {
                            ?>
                                <tr>
                                    <td>Tidak ada data produk</td>
                                </tr>
                            <?php
                        } else{
                            $jumlah = 1;
                            while($data=mysqli_fetch_array($queryProduk)){
                        ?>
                            <tr>
                                <td><?php echo $jumlah; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['nama_kategori']; ?></td>
                                <td><?php echo $data['harga']; ?></td>
                                <td><?php echo $data['stok']; ?></td>
                            </tr>
                        <?php
                            $jumlah++;
                            }
                        }
                    
                    ?>
                </tbody>
                
            </table>
        </div>
        
    </div>



   <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>