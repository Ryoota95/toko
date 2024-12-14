<?php
   include 'koneksi.php';
   if (isset($_POST['proses'])) {
   	mysqli_query($koneksi, "insert into nama_barang set
   		id_barang   = '$_POST[id_barang]',
   		nama_barang = '$_POST[nama_barang]', 
   		harga_barang = '$_POST[harga_barang]',
   		stok_barang = '$_POST[stok_barang]'");

   	echo "sukses nambah data baru XD";

   	header("refresh:5;url=http://localhost/toko/barang.php");
   }
?>