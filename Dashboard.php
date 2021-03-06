<?php 
include "koneksi.php";
 ?>
<!DOCTYPE html>
<html>
 <head>
 	<meta charset="utf-8">

	<title>Dashboard</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="author" content="Moses Fahmi Pratama">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="aset/css/all.min.css">
 </head>
 <body>
 	<div class="container">
 		<div class="navbar">
 			<div class="logo"><img src="boy.jpg" alt="Logo">
 			</div>
 			<h1>Dashboard</h1>
 			<nav>
 				<ul>
 					<li id="tombol-notifikasi"><i class="fas fa-bell"></i><b id="angka_notifikasi"></b></li>
 					<li><a href="#"><i class="fas fa-cog"></i></a></li>
 					<li><a href="#"><i class="fas fa-sign-out-alt"></i></a></li>
 				</ul>
 			</nav>
 			<div class="tombol-menu"><i class="fas fa-bars"></i></div>
 		</div>
 		<div class="sidebar">
 			<div class="tombol-menu"><i class="fas fa-times"></i></div>
 			<ul class="jarak">
 				<span><h3>ADmin</h3></span>
 				<li><a href="Dashboard.php" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
				<li id="data1"><a href="#"><i class="fas fa-table"></i> Data</a></li>
				<ul id="dropdown-sidebar1">
					<li><a href="Data_stok.php">Data Barang</a></li>
					<li><a href="Data_penjualan.php">Data Penjualan</a></li>
					<li><a href="Data_pembelian.php">Data Pembelian</a></li>
				</ul>
				<li id="data2"><a href="#"><i class="fas fa-chart-line"></i> Grafik</a></li>
				<ul id="dropdown-sidebar2">
					<li><a href="#">Grafik Pembelian</a></li>
					<li><a href="#">Grafik Penjualan</a></li>
				</ul>
				<li id="data3"><a href="#"><i class="fas fa-keyboard"></i> Form Input</a></li>
				<ul id="dropdown-sidebar3">
					<li><a href="Input_pembelian.php">Input Pembelian</a></li>
					<li><a href="Input_penjualan.php">Input Penjualan</a></li>
					<li><a href="Input_supplier.php">Input Supplier</a></li>
					<li><a href="Input_kategori.php">Input Kategori</a></li>
				</ul>
 			</ul>
 		</div>
 		<div class="konten">
 			<div id="notifikasi">
 				<div id="tutup-notifikasi">X</div>
 				<div id="konten-notifikasi">
 					<h2>Notifikasi</h2>
 					<p>Sisa beng-beng tinggal 1 pada stok persediaan</p>
 				</div>
 			</div>
 			<div class="kartu">
 				<div class="card Pendapatan">
 					<h3>Pendapatan</h3>
 					<p><i class="fas fa-money-bill-wave"></i></p>
 					<div class="hasil">
 						<?php
                        $laba = mysqli_query($koneksi,"SELECT SUM(total_harga) AS laba FROM tbl_penjualan") ;
                        $hasil_laba = mysqli_fetch_assoc($laba);
                        echo "Rp.".number_format($hasil_laba['laba'],0,'.','.');
                        ?>
 					</div>
 				</div>
 				<div class="card Bmasuk">
 					<h3>Barang Masuk</h3>
 					<p><i class="fas fa-shopping-cart"></i></p>
 					<div class="hasil">
 						<?php 
	                        $dibeli = mysqli_query($koneksi,"SELECT SUM(jumlah) AS total_beli FROM tbl_pembelian");
	                        $hasil = mysqli_fetch_assoc($dibeli);
	                        echo $hasil['total_beli'];
	                     ?>
 					</div>
 				</div>
 				<div class="card Bkeluar">
 					<h3>Barang Keluar</h3>
 					<p><i class="fas fa-shopping-cart"></i></p>
 					<div class="hasil">
 						<?php 
                        $dijual = mysqli_query($koneksi,"SELECT SUM(jumlah) AS total_jual FROM tbl_penjualan");
                        $hasil = mysqli_fetch_assoc($dijual);
                        echo $hasil['total_jual'];
                        ?>
 					</div>
 				</div>
 				<div class="card Pengeluaran">
 					<h3>Pengeluaran</h3>
 					<p><i class="fas fa-money-bill-wave"></i></p>
 					<div class="hasil">
 						<?php 
                        $pengeluaran = mysqli_query($koneksi,"SELECT SUM(total_harga) AS pengeluaran FROM tbl_pembelian");
                        $hasil = mysqli_fetch_assoc($pengeluaran);
                        echo "Rp.".number_format($hasil['pengeluaran'],0,'.','.');
                        ?>
 					</div>
 				</div>
 			</div>
 			
 			<div class="tabel">
	 			<table>
		 				<thead>
		 					<th>No</th>
		 					<th>Nama Lengkap</th>
		 					<th>Alamat</th>
		 					<th>Tanggal Lahir</th>
		 				</thead>
		 				<tbody>
		 					<tr>
			 					<td>1</td>
			 					<td>Moses</td>
			 					<td>Senakin</td>
			 					<td>1 januari 2003</td>
		 					</tr>
		 					<tr>
			 					<td>2</td>
			 					<td>Mila</td>
			 					<td>Karangan</td>
			 					<td>2 januari 2004</td>
		 					</tr><tr>
			 					<td>3</td>
			 					<td>Tina</td>
			 					<td>Menjalin</td>
			 					<td>5 februari 2005</td>
		 					</tr><tr>
			 					<td>4</td>
			 					<td>Justin</td>
			 					<td>Ngabang</td>
			 					<td>6 januari 2001</td>
		 					</tr><tr>
			 					<td>5</td>
			 					<td>Jo</td>
			 					<td>Pontinak</td>
			 					<td>7 Maret 2002</td>
		 					</tr>
		 				</tbody>
	 			</table>
	
	 		</div>
 		</div>
 	</div>
 	<script type="text/javascript" src="aset/css/all.min.js"></script>
 	<script type="text/javascript" src="aset/js/jquery.min.js"></script>
 <script type="text/javascript">
 	$(document).ready(function() {
 		$('.tombol-menu').click(function(){
 			$('.tombol-menu').toggleClass('active')
 			$('.sidebar').toggleClass('active')
 		})

 		$('#tombol-notifikasi').click(function(){
 			$('#notifikasi').css('display','block')
 		})
 		$('#tutup-notifikasi').click(function(){
 			$('#notifikasi').css('display','none')
 		})

 		$('#data1').click(function(){
 			$('#dropdown-sidebar1').toggle('slow');
 		});
 		$('#data2').click(function(){
 			$('#dropdown-sidebar2').toggle('slow');
 		});
 		$('#data3').click(function(){
 			$('#dropdown-sidebar3').toggle('slow');
 		});

 		ambilAngkaNotifikasi();
 	})

 	function ambilAngkaNotifikasi(){
		$.get('Ajax/Ajax_notifikasi.php',function(data) {
			$('#angka_notifikasi').html(data);
		})
	}
 </script>
 </body>
</html>