<?php 
include "../../koneksi.php";
 ?>
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