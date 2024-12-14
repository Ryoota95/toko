<?php
     include 'koneksi.php';
     if (isset($_GET['kode'])) {
     	mysqli_query($koneksi, "delete from nama_barang where id_barang = '$_GET[kode]'");

    	echo "data berhasil dihapus XD";

     	header("refresh:0;url=http://localhost/toko/barang.php");
     }
 ?>
 