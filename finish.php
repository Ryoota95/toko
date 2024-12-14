<?php
   include 'koneksi.php';
   if (isset($_POST['yo'])) {
    mysqli_query($koneksi, "insert into transaksi set
        totalharga  = '$_POST[totalHarga]',
        uang = '$_POST[uang]', 
        kembalian = '$_POST[kembalian]'");

    $ambildata = mysqli_query($koneksi, "select * from transaksi");
     while ($tampil = mysqli_fetch_array($ambildata)){
           $id_transaksi = $tampil['id_transaksi'];
          


     }

    $sql1 = "UPDATE transaksisementara SET id_transaksi = '$id_transaksi' WHERE status = 'aktif'";
  
    if ($koneksi->query($sql1) === TRUE) {
      
    echo "sudah";
     
     }
       $sql = "UPDATE transaksisementara SET status = 'nonaktif' WHERE status = 'aktif'";
     if ($koneksi->query($sql) === TRUE) {
      
    echo "berhasil";
     
     }


   }
   header("refresh:0;url=http://localhost/toko/barang.php");
?>

