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
 </head>
 <body>
 	<div class="container">
 		<div class="navbar">
 			<div class="logo"><img src="boy.jpg" alt="Logo">
 			</div>
 			<h1>Form Kategori</h1>
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
 			<!-- menu notifikasi -->
 			<div id="notifikasi">
 				<div id="tutup-notifikasi">X</div>
 				<div id="konten-notifikasi">
 					<h2>Notifikasi</h2>
 					<p>Sisa beng-beng tinggal 1 pada stok persediaan</p>
 				</div>
 			</div>
 			<!-- batas menu notifikasi -->
 			<div class="form-input">
 				<form action="Proses/proses-kategori.php" method="post" class="form-input-penjualan">
 					
 					<label>Jenis Barang</label>
 					<input type="text" name="nama-kategori">
 					
 					<div id="tombol-form">
 						<button type="submit"><i class="fas fa-save"></i> Simpan</button>
 						<button type="reset"><i class="fas fa-times"></i>Batal</button>
 					</div>
 				</form>
 				
	 			<div id="tampilkan_data"></div>

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

 		loadDataKategori();

 		$('form').on('submit',function(e){
			e.preventDefault();
			$.ajax({
				type: $(this).attr('method'),
				url : $(this).attr('action'),
				data: $(this).serialize(),
				success:function(){
					loadDataKategori();
				}
			})
		})
 	})

 	function ambilAngkaNotifikasi(){
		$.get('Ajax/Ajax_notifikasi.php',function(data) {
			$('#angka_notifikasi').html(data);
			})
	}

 	function loadDataKategori(){
		$.get('Ajax/proses/ajax_ambil_data_kategori.php',function(data) {
			$('#tampilkan_data').html(data);
		})
	}
 </script>
 </body>
</html>