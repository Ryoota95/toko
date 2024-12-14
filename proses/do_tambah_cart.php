<?php
   include '../koneksi.php';

   $id= $_GET['id'];

    $ambildata = mysqli_query($koneksi, "select * from nama_barang where id_barang =".$id)
    ($hasil = mysqli_fetch_array($ambildata))
       
   

   $_SESSION["cart"][$id] = [
   "nama_barang" => $hasil->nama_barang,
   "harga_barang" => $hasil->harga_barang, 
     "jumlah" => 1 
   ];

   header("location:../cart.php");


 ?>