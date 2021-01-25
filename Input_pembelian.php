<?php
    // menghubungkan dengan koneksi database
    include 'koneksi.php';

    // mengambil data barang dengan kode paling besar
    $query = mysqli_query($koneksi, "SELECT max(kd_barang) as kodeTerbesar FROM tbl_pembelian");
    $data = mysqli_fetch_array($query);
    $kodeBarang = $data['kodeTerbesar'];

    // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutan = (int) substr($kodeBarang, 3, 3);

    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;

    // membentuk kode barang baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "BRG";
    $kodeBarang = $huruf . sprintf("%03s", $urutan);
        
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
 			<h1>Form Pembelian</h1>
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
 					<label>Tanggal</label>
 					<input type="date" name="tanggal">
 					<label>Kode Barang</label>
 					<input type="text" value="<?php echo $kodeBarang ?>">
 					<label>Nama Barang</label>
 					<input type="text" name="nama-barang">
 					<label>Kategori</label>
 					<select name="kategori" id="select" class="form-control">
			         <option>--Pilih--</option>
			         <?php 
                        $kode = mysqli_query($koneksi,"SELECT * FROM tbl_kategori") or die
                        (mysqli_error($koneksi));
                        while ($data_kode = mysqli_fetch_array($kode)) {
                        echo '<option value="' .$data_kode['nama_kategori']. '">' .$data_kode['nama_kategori']. '</option>';
                        }
			         ?>
			        </select>
 					<label>Kode Supplier</label>
 					<select name="kode-supplier" id="select">
				        <option>--Pilih--</option>
				            <?php 
	                        $kode = mysqli_query($koneksi,"SELECT * FROM tbl_supplier") or die
	                        (mysqli_error($koneksi));
	                        while ($data_kode = mysqli_fetch_array($kode)) {
	                        echo '<option value="' .$data_kode['kd_supplier']. '">' .$data_kode['kd_supplier']. " " .$data_kode['nama_supplier']. '</option>';
	                        }
				            ?>
	                </select>
 					<label>Harga Per Barang</label>
 					<input type="text" name="harga" onkeyup="hitung()" id="harga_per_barang">
 					<label>Jumlah Beli</label>
 					<input type="text" name="jumlah" onkeyup="hitung()" id="jumlah_beli">
 					<label>Total Harga Beli</label>
 					<input type="text" name="total" id="total_harga">
 					<label>Bayar</label>
 					<input type="text" id="bayar" onkeyup="hitung()">
 					<label>Kembalian</label>
 					<input type="text" id="Kembalian">
 					
 					<div id="tombol-form">
 						<button type="submit" name="simpan">Simpan</button>
 						<button type="reset">Batal</button>
 					</div>
 				</form>
 				
	 			<div class="tabel">
		 			<table>
			 				<thead>
			 					<th>Tanggal</th>
			 					<th>Kode Barang</th>
			 					<th>Nama Barang</th>
			 					<th>Kategori</th>
			 					<th>Kode Supplier</th>
			 					<th>Harga Per Barang</th>
			 					<th>Jumlah Beli</th>
			 					<th>Total Harga</th>
			 				</thead>
			 				<tbody>
			 					<?php 
					            $pembelian = mysqli_query($koneksi,"SELECT * FROM tbl_pembelian ORDER BY id_pembelian ASC ");
					            while($b = mysqli_fetch_array($pembelian)){
					                ?>
					                <tr>
					                    <td><?php echo $b['tanggal']; ?></td>
					                    <td><?php echo $b['kd_barang']; ?></td>
					                    <td><?php echo $b['nm_barang']; ?></td>
					                    <td><?php echo $b['kategori']; ?></td>
					                    <td><?php echo $b['kd_supplier']; ?></td>
					                    <td><?php echo "Rp. ".number_format($b['harga'])." ,-"; ?></td>
					                    <td><?php echo $b['jumlah']; ?></td>
					                    <td><?php echo $b['total_harga']; ?></td>
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

 	function hitung(){
 		var harga = $('#harga_per_barang').val();
 		var jumlah = $('#jumlah_beli').val();
 		hasil = harga * jumlah;
 		$('#total_harga').val(hasil);
 		var bayar = $('#bayar').val();
 		kembalian = bayar - hasil;
 		$('#Kembalian').val(kembalian);
 	}
 </script>
 </body>
</html>