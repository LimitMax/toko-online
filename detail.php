<?php
session_start();

// Koneksi ke database
include 'koneksi.php';

// Mendapatkan id_produk dari url
$id_produk = $_GET['id'];

// Query ambil data
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detail);
// echo "</pre>";

// Jika tombol beli di klik
if(isset($_POST['beli'])){
  // Mendapatkan jumlah yang diinputkan
  $jumlah = $_POST['jumlah'];

  // Masukkan ke keranjang belanja
  $_SESSION['keranjang'][$id_produk] = $jumlah;

  echo "<div class='alert alert-success'>Produk telah masuk ke keranjang</div>";
  echo "<meta http-equiv='refresh' content='1;url=keranjang.php'>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>

<body>

    <!-- navbar -->
    <?php include 'templates/navbar.php'; ?>
    <div class="container">
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <img src="foto_produk/<?= $detail['foto_produk']; ?>" class="img-responsive"
                            style=" width:300px; height: 250px;">
                    </div>
                    <div class="col-md-8">
                        <h2><?= $detail['nama_produk']; ?></h2>
                        <h4>Rp. <?= number_format($detail['harga_produk']); ?>,-</h4>
                        <h5>Stok : <?= $detail['stok_produk']; ?></h5>
                        <form action="" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="number" min="1" max="<?= $detail['stok_produk']; ?>"
                                        class="form-control" name="jumlah" style="width: 80px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary" name="beli"
                                            style="margin-right: 650px;">beli</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <p><?= $detail['deskripsi_produk']; ?></p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>