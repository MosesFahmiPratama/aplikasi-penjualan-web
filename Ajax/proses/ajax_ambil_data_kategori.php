<?php 
include "../../koneksi.php";
 ?>
 <div class="tabel">
	<table>
			<thead>
				<th>No</th>
				<th>Kategori Barang</th>
			</thead>
			<tbody>
				<?php 
	            $no = 1;
	            $kategori = mysqli_query($koneksi,"SELECT * FROM tbl_kategori");
	            while($b = mysqli_fetch_array($kategori)){
	            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $b['nama_kategori']; ?></td>
                </tr>
	            <?php 
	            }
	            ?>
			</tbody>
	</table>
</div>