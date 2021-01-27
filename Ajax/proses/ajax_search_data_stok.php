<div class="tabel">
<table>
      <thead>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Harga Beli/Barang</th>
        <th>Harga Jual/Barang</th>
        <th>Stok</th>
        <th>Aksi</th>
      </thead>
      <tbody>
        <?php 
        include '../../koneksi.php';
        //jika kita klik cari, maka yang tampil query cari ini  
        if (isset($_GET['nama'])) {
        //menampung variabel kata_cari dari form pencarian
        $cari =$_GET['nama'];
        $halaman = 10;
        $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
        $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

        $sebelum = $page - 1;
        $sesudah = $page + 1;

        $result = mysqli_query($koneksi,"SELECT * FROM tbl_barang WHERE kd_barang LIKE '%$cari%' OR nm_barang LIKE '%$cari%' ORDER BY kd_barang");
        $total = mysqli_num_rows($result);
        $pages = ceil($total/$halaman);            
        $query = mysqli_query($koneksi,"SELECT * FROM tbl_barang WHERE kd_barang LIKE '%$cari%' OR nm_barang LIKE '%$cari%' LIMIT $mulai, $halaman")or die(mysqli_error());
        $no =$mulai+1;
        }
        
       while ($ambil = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $ambil['kd_barang']; ?></td>
                    <td><?php echo $ambil['nm_barang']; ?></td>
                    <td><?php echo $ambil['kategori']; ?></td>
                    <td><?php echo "Rp. ".number_format($ambil['harga_beli'])." ,-"; ?></td>
                    <td><?php echo "Rp. ".number_format($ambil['harga_jual'])." ,-"; ?></td>
                    <td><?php echo $ambil['jumlah']; ?></td>
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
              <li><a  href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                           
          <?php 
              } 
          ?>
         <li>
             <a  <?php if ($page < $pages) {echo "href='?halaman=$sesudah'";} ?>> > </a>
         </li>
     </ul>
 </nav>  

