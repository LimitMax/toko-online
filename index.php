<?php
session_start();
//koneksi ke database
include 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Suit</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>

<body>
    <?php include 'templates/navbar.php'; ?>
    <!-- konten   -->
    <div class="container">
        <section class="content">
            <div class="container">
                <h1>Produk Terbaru</h1>
                <div class="col-md-4">
                    <div class="card mb-4" style="width: 110rem;">
                        <div class="row">
                            <?php
                        $ambil = $koneksi->query("SELECT * FROM produk");
                        while($perproduk = $ambil->fetch_assoc()):
                    ?>
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <!-- foto -->
                                    <img src="foto_produk/<?= $perproduk['foto_produk']; ?>" alt=""
                                        style=" width:300px; height: 250px;">
                                    <!-- akhir foto -->
                                    <div class=" caption">
                                        <h3><?= $perproduk['nama_produk']; ?></h3>
                                        <h5>Rp. <?= number_format($perproduk['harga_produk']); ?>,-</h5>
                                        <a href="beli.php?id=<?= $perproduk['id_produk']; ?>"
                                            class="btn btn-primary">beli</a>
                                        <a href="detail.php?id=<?= $perproduk['id_produk']; ?>"
                                            class="btn btn-default">detail</a>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
    <!-- footer -->
    <footer class="footer fixed-bottom bg-gray">
        <div class="container ">
            <div class="row">
                <div class="col-md-6">
                    <p class="text-white">Copyright &copy; 2022</p>
                </div>
                <div class="col-md-6">
                    <p class="text-right text-white">Created with 🧡 by : LimitMax</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- akhir footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>