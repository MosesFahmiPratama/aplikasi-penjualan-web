<?php
    // menghubungkan dengan koneksi database
    include 'koneksi.php';

    // mengambil data barang dengan kode paling besar
    $query = mysqli_query($koneksi, "SELECT max(kd_supplier) as kodeTerbesar FROM tbl_supplier");
    $data = mysqli_fetch_array($query);
    $kodeSupplier = $data['kodeTerbesar'];

    // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutkan = (int) substr($kodeSupplier, 3, 3);

    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutkan++;

    // membentuk kode barang baru
    // perintah sprintf("%03s", $urutan);berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "SUP";
    $kodeSupplier = $huruf . sprintf("%03s", $urutkan);
?>
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
 			<h1>Form Supplier</h1>
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
 				<form action="" class="form-input-penjualan">
 					<label>Kode Supplier</label>
 					<input type="text" value="<?php echo $kodeSupplier ?>">
 					<label>Nama supplier</label>
 					<input type="text">
 					<label>Alamat</label>
 					<input type="text">
 					<label>No.Telepon</label>
 					<input type="text">
 					
 					
 					<div id="tombol-form">
 						<button type="submit" name="simpan">Simpan</button>
 						<button type="reset">Batal</button>
 					</div>

 				</form>
 				
	 			<div class="tabel">
		 			<table>
			 				<thead>
			 					<th>Kode supplier</th>
			 					<th>Nama Supplier</th>
			 					<th>Alamat</th>
			 					<th>No.Telepon</th>
			 				</thead>
			 				<tbody>
			 					<?php 
					            $supplier = mysqli_query($koneksi,"SELECT * FROM tbl_supplier");
					            while($b = mysqli_fetch_array($supplier)){
					           ?>
					                <tr>
					                    <td><?php echo $b['kd_supplier']; ?></td>
					                    <td><?php echo $b['nama_supplier']; ?></td>
					                    <td><?php echo $b['alamat']; ?></td>
					                    <td><?php echo $b['no_telpon']; ?></td>
					                </tr>
					                <?php 
					            }
					            ?>
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