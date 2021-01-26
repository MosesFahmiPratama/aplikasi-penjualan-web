<?php
include '../koneksi.php';

$nama = $_POST['nama-kategori'];
$simpan = mysqli_query($koneksi,"INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES (NULL, '$nama')");

?>