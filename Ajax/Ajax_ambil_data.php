<?php
include '../koneksi.php';
$kd = $_GET['kode-barang'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_barang WHERE kd_barang='$kd'");
$barang = mysqli_fetch_array($query);
$data = array(
            'nm_barang'      =>  $barang['nm_barang'],
            'kategori'   =>  $barang['kategori'],
            'jual'   =>  $barang['harga_jual'],
            );
 echo json_encode($data);
?>