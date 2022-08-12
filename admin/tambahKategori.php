<h2>Tambah Produk</h2>

<div class="row">
    <div class="col-md-8">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" name="kategori" class="form-control">
            </div>
            <button name="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<?php
if(isset($_POST["submit"])){
    $kategori = $_POST["kategori"];
    $query = "INSERT INTO kategori VALUES('','$kategori')";
    $result = mysqli_query($koneksi, $query);
    if($result){
        echo "<script>alert('Data berhasil ditambahkan');window.location='index.php?halaman=kategori';</script>";
    }else{
        echo "<script>alert('Data gagal ditambahkan');</script>";
    }
}

?>

<script>
$(document).ready(function() {
    $(".btn-tambah").on("click", function() {
        $(".letak-input").append("<input type='file' name='foto[]' class='form-control'>");
    })
})
</script>