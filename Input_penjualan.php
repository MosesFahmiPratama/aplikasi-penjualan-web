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
 			<h1>Form Penjualan</h1>
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
 				<form action="Proses/proses-penjualan.php" method="post" class="form-input-penjualan">
 					<label>Tanggal</label>
 					<input type="date" name="tanggal_jual">
 					<label>Kode Barang</label>
 					 <select name="kode_barang" onchange="cek_database()" id="kode-barang">
                  	 <option>- - Pilih - -</option>
                     <?php 
                        require 'koneksi.php';
                        
                        $kode = mysqli_query($koneksi,"SELECT * FROM tbl_barang") or die
                        (mysqli_error($koneksi));
                        while ($data_kode = mysqli_fetch_array($kode)) {
                        echo '<option value="' .$data_kode['kd_barang']. '">' .$data_kode['kd_barang']. " " .$data_kode['nm_barang']. '</option>';
                        }
                     ?>               
                    </select>
 					<label>Nama Barang</label>
 					<input type="text" name="nama_barang" id="nama_barang">
 					<label>Kategori</label>
 					<input type="text" name="kategori" id="kategori">
 					<label>Harga Per Barang</label>
 					<input type="text" name="harga" id="harga">
 					<label>Jumlah Pelanggan Beli</label>
 					<input type="text" name="jumlah_jual" id="jumlah_pelanggan_beli" onkeyup="hitung()">
 					<label>Total Harga Pelanggan Beli</label>
 					<input type="text" name="total_jual" id="total_harga">
 					
 					<div id="tombol-form">
 						<button type="submit" onclick="TambahDataPenjualan()"><i class="fas fa-save"></i> Simpan</button>
 						<button type="reset"><i class="fas fa-times"></i> Batal</button>
 					</div>

 					<p><h4>Total Bayar: </h3>
 					<h4 id="tampilkan_total_bayar"></h4></p>
 				</form>
 				
	 			<div class="tabel">
	 				<a class="hapus-transaksi-penjualan" href="Proses/hapus-transaksi-penjualan.php" onclick="return confirm('Apakah anda yakin mau menghapus data ini?')">Hapus</a>
		 			
		 			<!-- Tampilkan data setelah diinput dan diproses melalui ajax -->
		 			<div id="tampilkan_data"></div>

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

 		ambilAngkaNotifikasi();

 		TotalBayarPenjualan();

 		loadDataPenjualan();

 	})
 	function TambahDataPenjualan(){
 		$('form').on('submit',function(e){
			e.preventDefault();
			$.ajax({
				type: $(this).attr('method'),
				url : $(this).attr('action'),
				data: $(this).serialize(),
				success:function(tangkap_data){
					var tampil_data = JSON.parse(tangkap_data);
					alert(tampil_data.pesan);
					loadDataPenjualan();
					TotalBayarPenjualan();
				}
			})
		})
 	}

 	function loadDataPenjualan(){
		$.get('Ajax/proses/ajax_ambil_data_penjualan.php',function(data) {
			$('#tampilkan_data').html(data);
		})
	}

	function TotalBayarPenjualan(){
		$.get('Ajax/proses/ajax_menjumlahkan_total_bayar_penjualan.php',function(data) {
			$('#tampilkan_total_bayar').html(data);
		})
	}


 	function ambilAngkaNotifikasi(){
		$.get('Ajax/Ajax_notifikasi.php',function(data) {
			$('#angka_notifikasi').html(data);
		})
	}

 	function cek_database(){
    var kode = $("#kode-barang").val();
                $.ajax({
                    url: 'Ajax/Ajax_ambil_data.php',
                    data:"kode-barang="+kode ,
                }).success(function (data) {
                   var json = data,
                    obj = JSON.parse(json);
                   $('#nama_barang').val(obj.nm_barang);
                    $('#kategori').val(obj.kategori);
                    $('#harga').val(obj.jual);
                });
    }
    function hitung(){
    	var hargaPerBarang = $("#harga").val();
    	var jumlahPelangganBeli = $("#jumlah_pelanggan_beli").val();
    	hasil = hargaPerBarang * jumlahPelangganBeli;
    	$("#total_harga").val(hasil);
    }
 </script>
 </body>
</html>