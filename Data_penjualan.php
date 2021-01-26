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
 				<form action="Ajax/proses/ajax_search_data_penjualan.php" class="form-cari">
 					<label><i class="fas fa-search"></i></label>
 					<input type="text" name="kata_cari" id="kata_cari">
 				</form>
 				<div class="cetak">
 					<button class="dropdown">Cetak</button>
 					<div class="dropdown-konten">
 						<a href="#">Laporan Pdf</a>
 						<a href="#">Laporan Excel</a>
 					</div>
 				</div>
 			</div>
 			<div id="tampil_data">
 			 <div class="tabel">
	 			<table>
			      <thead>
			        <th>Tanggal Penjualan</th>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Kategori</th>
					<th>Harga Per Barang</th>
					<th>Jumlah Pelanggan Beli</th>
					<th>Total Harga</th>
			        <th>Aksi</th>
			      </thead>
			      <tbody>
	 				<?php 
	 				  include "koneksi.php";

	 				  $halaman = 10;
		              $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
		              $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

		              $sebelum = $page - 1;
		              $sesudah = $page + 1;

		              $result = mysqli_query($koneksi,"SELECT * FROM tbl_penjualan");
		              $total = mysqli_num_rows($result);
		              $pages = ceil($total/$halaman);            
		              $query = mysqli_query($koneksi,"SELECT * FROM tbl_penjualan LIMIT $mulai, $halaman")or die(mysqli_error);
		              $no =$mulai+1;
	 
	 			      while ($tampil = mysqli_fetch_array($query)) {
	                ?>
	                <tr>
	                    <td><?php echo $tampil['tanggal_penjualan']; ?></td>
	                    <td><?php echo $tampil['kd_barang']; ?></td>
	                    <td><?php echo $tampil['nm_barang']; ?></td>
	                    <td><?php echo $tampil['kategori']; ?></td>
	                    <td><?php echo "Rp. ".number_format($tampil['harga'])." ,-"; ?></td>
	                    <td><?php echo $tampil['jumlah']; ?></td>
	                    <td><?php echo $tampil['total_harga']; ?></td>
	                </tr>
	                <?php 
	                }
	                ?>
				    </tbody>
				</table>
				</div>
				<nav class="pagination">
				     <ul>
				         <li>
				             <a  <?php if ($page > 1) {echo "href='?halaman=$sebelum'";} ?>> < </a>
				         </li>
				         <?php for ($i=1; $i<=$pages ; $i++){ ?>
				              <li><a style="text-decoration: none; color: darkolivegreen;" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
				                           
				          <?php 
				              } 
				          ?>
				         <li>
				             <a  <?php if ($page < $pages) {echo "href='?halaman=$sesudah'";} ?>> > </a>
				         </li>
				     </ul>
				 </nav>  
			  
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

 		$('#kata_cari').on('keyup', function(){

		    $('#tampil_data').load('Ajax/proses/ajax_search_data_penjualan.php?nama=' + $('#kata_cari').val());
		})
 	})
 </script>
 </body>
</html>