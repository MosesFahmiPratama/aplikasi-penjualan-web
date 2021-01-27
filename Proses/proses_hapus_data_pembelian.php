<?php 
include "../koneksi.php";

$id = $_GET['data-id'];
$query = "DELETE FROM `tbl_pembelian` WHERE `tbl_pembelian`.`id_pembelian` = $id"; 
$hasil = mysqli_query($koneksi,$query);

?>
