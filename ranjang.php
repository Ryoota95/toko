<!DOCTYPE html>
<html>
<head>
	<title>keranjang belanja</title>
</head>
<body>
    <h3>keranjang belanja</h3>
    <table border="3">
    	<tr>
    		<td>no</td>
    		<td>id_barang</td>
    		<td>nama_barang</td>
    		<td>total_harga</td>
    		<td>jumlah yang dibeli</td>



    	</tr>



	<?php
 include 'koneksi.php';
 $jumlah = $_POST['jumlah'];
 $total  = $_POST['total'];


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['konfirmasi'])) {
    
    $id = $_POST['id_barang'];
    $sql = "SELECT * FROM nama_barang WHERE id_barang = ?";
    $cari = $koneksi->prepare($sql);
    $cari->bind_param("i", $id);
    $cari->execute();
    $result = $cari->get_result();
    $no=1;

 if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo  "
           <tr>
                 <td>$no</td>
                 <td>$row[id_barang]</td>
                 <td>$row[nama_barang]</td>
                 <td>$total</td>
                 <td>$jumlah</td>
                 
              </tr>


            ";


        }
    }
}
          

?>

</body>
</html>
</table>

