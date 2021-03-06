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
                      include "../../koneksi.php";

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
                        <td><a class="hapus-data" href=Proses/proses_hapus_data_penjualan.php?data-id=<?php echo $tampil['tanggal_penjualan']; ?>>Hapus</a></td>
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