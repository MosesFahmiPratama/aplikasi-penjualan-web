<?php
include '../koneksi.php';

$Tanggal     = $_POST['tanggal'];
$KodeBarang  = $_POST['kode-barang'];
$NamaBarang  = $_POST['nama-barang'];
$Kategori    = $_POST['kategori'];
$KodeSupplier= $_POST['kode-supplier'];
$Harga       = $_POST['harga'];
$Jumlah      = $_POST['jumlah'];
$Total       = $_POST['total'];
$Jual        = 0;
$validasi['pesan']= "";

        if ($Tanggal=="") {
          $validasi['pesan']= "Tanggal Harus Di isi";
        }elseif ($KodeBarang=="") {
          $validasi['pesan']= "Kode Barang Harus Di isi";
        }elseif ($NamaBarang=="") {
          $validasi['pesan']= "Nama Barang Harus Di isi";
        }elseif ($Kategori=="") {
          $validasi['pesan']= "Tanggal Harus Di isi";
        }elseif ($KodeSupplier=="") {
          $validasi['pesan']= "Kode Supplier Harus Di isi";
        }elseif ($Harga=="") {
          $validasi['pesan']= "Harga Barang Harus Di isi";
        }elseif ($Jumlah=="") {
          $validasi['pesan']= "Jumlah Harus Di isi";
        }elseif ($Total=="") {
          $validasi['pesan']= "Total Harus Di isi";
        }else {
			$simpan = mysqli_query($koneksi,"INSERT INTO `tbl_pembelian` (`id_pembelian`, `tanggal`, `kd_barang`, `nm_barang`, `kategori`, `kd_supplier`, `harga`, `jumlah`, `total_harga`,`jual`) VALUES (NULL, '$Tanggal','$KodeBarang','$NamaBarang', '$Kategori','$KodeSupplier','$Harga','$Jumlah','$Total','$Jual')");

    			if ($simpan) {
    			  $validasi['pesan']= "Data Berhasil Masuk";
    			}else{
    			  $validasi['pesan']= "Data Gagal Masuk";
    			}
    		}

        echo json_encode($validasi);
?>