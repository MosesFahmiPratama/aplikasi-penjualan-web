<?php
include '../koneksi.php';

$KodeSupplier = $_POST['kode-supplier'];
$NamaSupplier = $_POST['nama-supplier'];
$Alamat       = $_POST['alamat'];
$NoHP         = $_POST['no-telepon'];
$validasi['pesan']= "";

        if ($KodeSupplier=="") {
          $validasi['pesan']= "Tolong Masukan Kode Supplier";
        }elseif ($NamaSupplier=="") {
          $validasi['pesan']= "Tolong Masukan Nama Supplier";
        }elseif ($Alamat=="") {
          $validasi['pesan']= "Tolong Masukan Alamat";
        }elseif ($NoHP=="") {
          $validasi['pesan']= "Tolong Masukan No Telepon";
        }

$simpan = mysqli_query($koneksi,"INSERT INTO `tbl_supplier` (`id_supplier`, `kd_supplier`, `nama_supplier`, `alamat`, `no_telpon`) VALUES (NULL, '$KodeSupplier', '$NamaSupplier', '$Alamat', '$NoHP')");

if ($simpan) {
  $validasi['pesan']= "Data Berhasil Disimpan";
}else {
  $validasi['pesan']= "Data Gagal Disimpan";
}

echo json_encode($validasi);
?>