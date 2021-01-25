<!DOCTYPE html>
<html>
 <head>
 	<meta charset="utf-8">

	<title>Template Moses</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="author" content="Moses Fahmi Pratama">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="aset/css/all.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
 </head>
 <body>
 	<div class="container">
 		<div class="navbar">
 			<div class="logo"><img src="boy.jpg" alt="Logo">
 			</div>
 			<h1>Data Penjualan</h1>
 			<nav>
 				<ul>
 					<li id="tombol-notifikasi"><a href="#"><i class="fas fa-bell"></i></a></li>
 					<li><a href="#"><i class="fas fa-cog"></i></a></li>
 					<li><a href="#"><i class="fas fa-sign-out-alt"></i></a></li>
 				</ul>
 			</nav>
 			<div class="tombol-menu"><i class="fas fa-bars"></i></div>
 		</div>
 		<div class="sidebar">
 			<div class="tombol-menu"><i class="fas fa-times"></i></div>
 			<ul>
 				<span><h3>ADmin</h3></span>
 				<li><a href="#" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
				<li><a href="#"><i class="fas fa-table"></i> Data Penjualan</a></li>
				<li><a href="#"><i class="fas fa-table"></i> Data Pembelian</a></li>
				<li><a href="#"><i class="fas fa-database"></i> Data Stok Barang</a></li>
				<li><a href="#"><i class="fas fa-chart-line"></i> Grafik Penjualan</a></li>
				<li><a href="#"><i class="fas fa-chart-line"></i> Grafik Pembelian</a></li>
				<li><a href="#"><i class="fas fa-keyboard"></i> Input Pembelian</a></li>
				<li><a href="#"><i class="fas fa-keyboard"></i> Input Penjualan</a></li>
 			</ul>
 		</div>
 		<div class="konten">
 			<div id="notifikasi">
 				<div id="tutup-notifikasi">X</div>
 				<div id="konten-notifikasi">
 					<h2>Notifikasi</h2>
 					<p>Sisa beng-beng tinggal 1 pada stok persediaan</p>
 					<p>mantap bro</p>
 				</div>
 			</div>
 			<div class="form-laporan">
 				<form action="" class="form-cari">
 					<label><i class="fas fa-search"></i></label>
 					<input type="text">
 				</form>
 				<div class="cetak">
 					<button class="dropdown">Cetak</button>
 					<div class="dropdown-konten">
 						<a href="#">Laporan Pdf</a>
 						<a href="#">Laporan Excel</a>
 					</div>
 				</div>
 			</div>
 			<div class="tabel">
	 			<table>
		 				<thead>
		 					<th>No</th>
		 					<th>umur</th>
		 					<th>Nama Lengkap</th>
		 					<th>Alamat</th>
		 					<th colspan="2">Aksi</th>
		 				</thead>
		 				<tbody>
		 					<tr>
			 					<td>1</td>
			 					<td>Moses</td>
			 					<td>Senakin</td>
			 					<td>1 januari 2003</td>
			 					<td><a href="#" id="edit">Edit</a></td>
			 					<td><a href="#" id="hapus">Hapus</a></td>
		 					</tr>
		 					<tr>
			 					<td>2</td>
			 					<td>Mila</td>
			 					<td>Karangan</td>
			 					<td>2 januari 2004</td>
			 					<td><a href="#">Edit</a></td>
			 					<td><a href="#">Hapus</a></td>
		 					</tr><tr>
			 					<td>3</td>
			 					<td>Tina</td>
			 					<td>Menjalin</td>
			 					<td>5 februari 2005</td>
			 					<td><a href="#">Edit</a></td>
			 					<td><a href="#">Hapus</a></td>
		 					</tr><tr>
			 					<td>4</td>
			 					<td>Justin</td>
			 					<td>Ngabang</td>
			 					<td>6 januari 2001</td>
			 					<td><a href="#">Edit</a></td>
			 					<td><a href="#">Hapus</a></td>
		 					</tr><tr>
			 					<td>5</td>
			 					<td>Jo</td>
			 					<td>Pontinak</td>
			 					<td>7 Maret 2002</td>
			 					<td><a href="#">Edit</a></td>
			 					<td><a href="#">Hapus</a></td>
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
 	})
 </script>
 </body>
</html>