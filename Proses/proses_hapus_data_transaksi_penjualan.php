<?php 
include "../koneksi.php";

	$query = "delete from transaksi_penjualan"; 

	$hasil = mysqli_query($koneksi,$query);

?>