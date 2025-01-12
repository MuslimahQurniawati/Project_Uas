<?php
session_start();
require "../koneksi.php";

    $id = $_GET['p'];
    $query =mysqli_query($con, "SELECT * FROM kategori WHERE id='$id'");
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
    <title>Detail kategori</title>
</head>
<body>
<?php require "navbar.php"; ?>
    <div class="kotak">
    <h2>Detail Kategori</h2>
    <div class="col-12 col-md-6">
        <form action="" method="post">
        <div>
            <label for="kategori">Kategori</label>
            <input type="text" name="kategori" class="form-control" 
                value="<?php echo isset($data['nama']) ? $data['nama'] : ''; ?>">

        </div>

        <div class="mt-3 ">
            <button type="submit" class="btn btn-primary" name="editBtn">Edit</button>
            <button type="submit" class="btn btn-danger" name="deleteBtn">Delete</button>
        </div>
        </form>

        <?php
            if(isset($_POST['editBtn'])){
                $kategori = htmlspecialchars($_POST['kategori']);

                if($data['nama']==$kategori){
                    ?>
                    <meta http-equiv="refresh" content="0; url=kategori.php" />
                    <?php
                }
                else{
                        $query = mysqli_query($con, "SELECT * FROM kategori WHERE nama='$kategori'");
                        $jumlahData =mysqli_num_rows($query);
                        
                        if($jumlahData > 0){
                            ?>
                            <div class="alert alert-warning mt-3" role="alert">Kategori Sudah Ada</div>
                            <?php
                        }
                        else{
                            $querySimpan = mysqli_query($con, "UPDATE kategori SET nama='$kategori' WHERE id='$id'");
                            if($querySimpan){
                                ?>
                                    <div class="alert alert-primary mt-3" role="alert">
                                    Kategori Berhasil Disimpan
                                    </div>
    
                                    <meta http-equiv="refresh" content="0; url=kategori.php" />
                                <?php
                            } else{
                                echo mysqli_error($con);
                            }
                        }
                    }
                }
            

            if(isset($_POST['deleteBtn'])){
                $queryDelete = mysqli_query($con, "DELETE FROM kategori WHERE id='$id'");
            
                if($queryDelete){
                    ?>
                    <div class="alert alert-primary mt-3" role="alert">
                        Kategori Berhasil Dihapus
                    </div>

                    <meta http-equiv="refresh" content="0; url=kategori.php" />
                    <?php
                }else{
                    echo mysqli_error($con);
                }
            }
        ?>
    </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
