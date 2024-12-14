<?php 
   include 'koneksi.php';
   $sql=mysqli_query($koneksi, "select * from nama_barang where id_barang='$_GET[kode]'");
   $data=mysqli_fetch_array($sql);
 ?>

<h3>tambah data</h3>

<form action="" method="post">
	<table>
	<tr>
		<td>id barang</td>
		<td><input type="text" value="<?php echo "$_GET[kode]";?>" name="id_barang"></td>
	</tr> 
	<tr>
		<td>nama barang</td>
		<td><input type="text" value="<?php echo $data['nama_barang'];?>" name="nama_barang"></td>
	</tr> 
	<tr>
		<td>harga barang</td>
		<td><input type="text" value="<?php echo $data['harga_barang'];?>" name="harga_barang"></td>
	</tr>
	<tr>
		<td>stok barang</td>
		<td><input type="text"  value="<?php echo $data['stok_barang'];?>" name="stok_barang"></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="simpan" name="proses"></td>
	</tr>
	</table>

</form>
<?php
   include 'koneksi.php';
   if (isset($_POST['proses'])) {
   	mysqli_query($koneksi, "update nama_barang set 
   		nama_barang = '$_POST[nama_barang]',
   		harga_barang = '$_POST[harga_barang]',
   		stok_barang = '$_POST[stok_barang]'
        where id_barang = '$_GET[kode]'");

   	echo "sukses update data baru XD";
   	header("refresh:0;url=http://localhost/toko/barang.php");
   }
?>
