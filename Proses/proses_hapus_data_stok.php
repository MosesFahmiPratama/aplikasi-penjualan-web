<?php 
include "../koneksi.php";

$kode_barang = $_GET['data-id'];
$query = "DELETE FROM `tbl_barang` WHERE `tbl_barang`.`kd_barang` = '$kode_barang'"; 
$hasil = mysqli_query($koneksi,$query);

?>
