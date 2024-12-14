<?php

include 'koneksi.php';

$sql = "SELECT total_harga FROM transaksisementara  WHERE status = 'aktif'";
$result = $koneksi->query($sql);
$totalHarga = 0;

if ($result->num_rows > 0) {
    
    while($tampil = $result->fetch_assoc()) {
        $totalHarga += $tampil['total_harga'];
    }
}
   
  
?>



<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Kembalian</title>
</head>
<body>
    <h1></h1>
    <form id="formKembalian" method="POST" action="" >
        <label for="uangDimasukkan">Uang yang Dimasukkan Rp: </label>
        <input type="number" id="uangDimasukkan" required>
        <br><br>
        <label>Total Harga Rp: </label>
        <input type="text" id="totalHarga" value="<?php echo $totalHarga; ?>" readonly>
        <br><br>
        <button type="submit">Hitung Kembalian</button>
   
    <p id="hasil"></p>

    <script>
        document.getElementById("formKembalian").addEventListener("submit", function(event) {
            event.preventDefault();

            
            const uangDimasukkan = parseInt(document.getElementById("uangDimasukkan").value);
            const totalHarga = parseInt(document.getElementById("totalHarga").value);
            
            if (uangDimasukkan < totalHarga) {
                document.getElementById("hasil").textContent = "Uang yang dimasukkan kurang!";
            } else {
                const kembalian = uangDimasukkan - totalHarga;
                document.getElementById("hasil").textContent = `Kembalian: Rp${kembalian.toLocaleString()}`;
                document.getElementById("hiddenhasil").value = kembalian;
                document.getElementById("hiddenuang").value = uangDimasukkan;
            }
        });
    </script>
  </form>
</body>
</html>
<form  method="POST" action="beli.php" onsubmit="return formKembalian(event);">
<input type="hidden" name="Kembalian" id="hiddenhasil">
<input type="hidden" name="uangDimasukkan" id="hiddenuang">


 <?php 

include 'koneksi.php';


  

   
   $ambildata = mysqli_query($koneksi, "select * from transaksisementara WHERE status = 'aktif'");
     while ($tampil = mysqli_fetch_array($ambildata)){

                  echo " 
                  <input type='text' value='$tampil[id_barang]' name='id_barang'>
                  <input type='text' value='$tampil[jumlah]' name='jumlah'>
                  <input type='text' value='$tampil[nama_barang]' name='nama_barang'>
                  <input type='text' value='$totalHarga' name='totalHarga'>
                  
                         ";
                     

                  } 

        
          
            echo " 
                 
            <input type='submit' value='beli' name='beli' class='btn btn-warning'>

                      
                  ";
              


  ?>

</form>