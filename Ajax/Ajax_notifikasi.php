<?php
include '../koneksi.php';

$sql = "SELECT * FROM tbl_barang WHERE jumlah <=3 ";
$result = mysqli_query($koneksi,$sql);

echo mysqli_num_rows($result);
/*
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
 echo "id: " . $row["id"]. " - Notification: " . $row["description"];
 }
} else {
 echo "0 results";
}
*/
mysqli_close($koneksi);
?>