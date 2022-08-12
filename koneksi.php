<?php

$koneksi = new mysqli("localhost", "root", "", "shoponline");

// cek koneksi
if($koneksi->connect_error){
    die("Koneksi Gagal : ". $koneksi->connect_error);
}
?>