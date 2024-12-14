<!DOCTYPE html>
<html>
<head>
	<style>
		h3{
			margin-left: 550px;
		}
	</style>
	<title>barang</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<body>
	
	<h3 style="font-family:'Teko', sans-serif; ;">Barang</h3>
	<table border="3" class="table table-bordered">
		<tr>
			<td>no</td>
			<td>id_barang</td>
			<td>nama_barang</td>
			<td>harga_barang</td>	
			<td>stok_barang</td>
			
			
			<td>aksi</td>
            <td>aksi</td>
		</tr>
		<?php
		include 'koneksi.php';
		$no=1; $ambildata = mysqli_query($koneksi, "select * from nama_barang");
        while ($tampil = mysqli_fetch_array($ambildata)) { 
     	echo "<tr>
     	       <form action='keranjang.php' method='post'>
                 <td>$no</td>
                 <td><input type='hidden' value=$tampil[id_barang] name=id_barang readonly>$tampil[id_barang]</td>
                 <td><input type='hidden' value=$tampil[nama_barang] name=nama_barang readonly>$tampil[nama_barang]</td>
                 <td><input type='hidden' value=$tampil[harga_barang] name=harga_barang readonly>$tampil[harga_barang]</td>
                 <td><input type='hidden' value=$tampil[stok_barang] name=stok_barang readonly>$tampil[stok_barang]</td>
                  
                
                  <td><a href='http://localhost/toko/delete_proses.php?kode=$tampil[id_barang]'> hapus </a></td>
                 <td><a href='http://localhost/toko/update_proses.php?kode=$tampil[id_barang]'> ubah <a/></td>
                 </form>
                 </tr>";
                 $no++;
             }
		 ?>
		
	</table>
	<a href="../toko/create.php"><button class="btn btn-primary">+ tambah data baru</button></a>
	<a href="../toko/belanja.php"><button class="btn btn-warning">belanja</button></a>



</body>
</html>