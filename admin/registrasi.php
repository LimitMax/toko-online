<!doctype html>
<html lang="en">
<?php
// koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "shoponline");
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<style>
/* mengatur warna backgroud dan padding pada tag body bagian atas agar form tidak menempel diatas */
body {
    background: #7A58FF;
    padding-top: 6vh;
}

/* mengatur warna backgroud form */
form {
    background: #fff;
    border-radius: 2%;
}

/* mengatur border dan padding class form-container */
.form-container {
    border-radius: 10px;
    padding: 30px;
}
</style>

<body>
    <!-- Registrasi -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="form-container">
                    <form class="p-2" action="registrasi.php" method="post">
                        <h1>Registrasi</h1>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="username" class="form-control" id="username" name="username"
                                placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="nama" class="form-control" id="nama" name="nama" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                        </div>
                        <button type="submit" name="registrasi" class="btn btn-primary mt-2">Registrasi</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Akhir registrasi -->

        <!-- proses daftar admin -->
        <?php
        if (isset($_POST['registrasi'])) {
            $nama = $_POST['nama'];
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $cek = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username'");
            if (mysqli_num_rows($cek) > 0) {
                echo "<script>alert('Username sudah terdaftar')</script>";
                echo "<script>window.location='registrasi.php'</script>";
            } else {
                $simpan = mysqli_query($koneksi, "INSERT INTO admin (id_admin,username, password,nama_lengkap) VALUES ('','$username', '$password','$nama')");
                if ($simpan) {
                    echo "<script>alert('Pendaftaran berhasil')</script>";
                    echo "<script>window.location='login.php'</script>";
                } else {
                    echo "<script>alert('Pendaftaran gagal')</script>";
                    echo "<script>window.location='registrasi.php'</script>";
                }
            }
        }
        ?>
        <!-- akhir proses daftar -->

        <!-- Js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
        </script>
        <!-- akhir js -->
</body>

</html>