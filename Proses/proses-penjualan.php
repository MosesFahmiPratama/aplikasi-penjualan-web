<?php
include '../koneksi.php';

    
        $Tanggal     = $_POST['tanggal_jual'];
        $KodeBarang  = $_POST['kode_barang'];
        $NamaBarang  = $_POST['nama_barang'];
        $Kategori    = $_POST['kategori'];
        $Harga       = $_POST['harga'];
        $Jumlah      = $_POST['jumlah_jual'];
        $Total       = $_POST['total_jual'];
        $validasi['pesan']= "";

        if ($Tanggal=="") {
          $validasi['pesan']= "Tanggal Harus Di isi";
        }elseif ($KodeBarang=="") {
          $validasi['pesan']= "Kode Barang Harus Di isi";
        }elseif ($NamaBarang=="") {
          $validasi['pesan']= "Nama Barang Harus Di isi";
        }elseif ($Kategori=="") {
          $validasi['pesan']= "Tanggal Harus Di isi";
        }elseif ($Harga=="") {
          $validasi['pesan']= "Harga Harus Di isi";
        }elseif ($Jumlah=="") {
          $validasi['pesan']= "Jumlah Harus Di isi";
        }elseif ($Total=="") {
          $validasi['pesan']= "Total Harus Di isi";
        }else {
          $query = "SELECT * FROM tbl_barang WHERE kd_barang ='$_POST[kode_barang]'";

          $result=mysqli_query($koneksi,$query);
            
          $b = mysqli_fetch_assoc($result);
          
          $stock=$b['jumlah'];
          
          If($stock < $Jumlah)
          {
            $validasi['pesan'] = 'Jumlah Stok '.$NamaBarang.' tidak cukup untuk dijual. Sisa stock: '.$stock; 
            
          }else{

             $validasi['pesan']= "Data Berhasil Masuk";

            $simpan = mysqli_query($koneksi,"INSERT INTO `tbl_penjualan` ( `tanggal_penjualan`, `kd_barang`, `nm_barang`, `kategori`, `harga`, `jumlah`, `total_harga`) VALUES ( '$Tanggal','$KodeBarang','$NamaBarang', '$Kategori','$Harga','$Jumlah','$Total')");

           $simpan .= mysqli_query($koneksi,"INSERT INTO `transaksi_penjualan` (`id_penjualan`, `tanggal_penjualan`, `kode_barang`, `nama_barang`, `kategori`, `harga`, `jumlah`, `total_harga`) VALUES (NULL, '$Tanggal','$KodeBarang','$NamaBarang', '$Kategori','$Harga','$Jumlah','$Total')");
          }
        }
            
        
        
        echo json_encode($validasi);
?>