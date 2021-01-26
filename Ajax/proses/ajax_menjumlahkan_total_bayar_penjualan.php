<?php 
include "../../koneksi.php";
    $total = mysqli_query($koneksi,"SELECT SUM(total_harga) AS total_bayar FROM transaksi_penjualan");
    $hasil = mysqli_fetch_array($total);
    echo "Rp". number_format($hasil['total_bayar'],2,',','.');
?>