<?php 
include "../../koneksi.php";
 ?>
<table>
	<thead>
		<tr>
			<th>Tanggal Penjualan</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Kategori</th>
			<th>Harga Per Barang</th>
			<th>Jumlah Pelanggan Beli</th>
			<th>Total Harga</th>
		</tr>
	</thead>
	<tbody>
		 <?php 
        $penjualan = mysqli_query($koneksi,"SELECT * FROM transaksi_penjualan");
        while($b = mysqli_fetch_array($penjualan)){
     ?>
            <tr>
                <td><?php echo $b['tanggal_penjualan']; ?></td>
                <td><?php echo $b['kode_barang']; ?></td>
                <td><?php echo $b['nama_barang']; ?></td>
                <td><?php echo $b['kategori']; ?></td>
                <td><?php echo "Rp. ".number_format($b['harga'])." ,-"; ?></td>
                <td><?php echo $b['jumlah']; ?></td>
                <td><?php echo $b['total_harga']; ?></td>
            </tr>
    
     <?php 
        }
     ?>
	</tbody>
</table>