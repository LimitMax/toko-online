<?php
// hapus kategori
if(isset($_GET['id'])){
//   $ambil = $koneksi->query("SELECT * FROM kategori WHERE id_kategori = '$_GET[id]'");
//   $pecah = $ambil->fetch_assoc();
//   $fotokategori = $pecah['foto_kategori'];
  $koneksi->query("DELETE FROM kategori WHERE id_kategori = '$_GET[id]'");

  echo "<script>alert('Kategori terhapus');</script>";
  echo "<script>location='index.php?halaman=kategori';</script>";
}

?>