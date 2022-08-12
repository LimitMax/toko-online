<?php
// ediit
if(isset($_GET['id'])){
  $ambil = $koneksi->query("SELECT * FROM kategori WHERE id_kategori = '$_GET[id]'");
  $pecah = $ambil->fetch_assoc();
}
?>

<!-- ubah kategori -->
<h2>Edit Kategori</h2>
<div class="row">
    <div class="col-md-8">
        <form action="" method="post">
            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" name="nama" class="form-control" value="<?= $pecah['nama_kategori']; ?>">
            </div>
            <button name="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<!-- akhir ubah kategori -->

<?php
// ubah kategori
if(isset($_POST['submit'])){
  $koneksi->query("UPDATE kategori SET nama_kategori='$_POST[nama]' WHERE id_kategori='$_GET[id]'");
  echo "<script>alert('Data berhasil diubah');</script>";
  echo "<script>location='index.php?halaman=kategori';</script>";
}
?>