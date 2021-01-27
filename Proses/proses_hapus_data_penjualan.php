<?php 
include "../koneksi.php";

$id = $_GET['data-id'];
$query = "DELETE FROM `tbl_penjualan` WHERE `tbl_penjualan`.`tanggal_penjualan` = '$id'"; 
$hasil = mysqli_query($koneksi,$query);

?>
