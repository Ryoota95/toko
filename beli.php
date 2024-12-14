<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     


<?php



include 'koneksi.php';

        echo "  <div class='row'  style='padding-top: 250px;'>
        <div class='col-sm-5'></div>
        <div class='col-sm-5'>";
if (isset($_POST['beli'])) {
    
     $ambildata = mysqli_query($koneksi, "select * from transaksisementara WHERE status = 'aktif'");
     while ($tampil = mysqli_fetch_array($ambildata)){
        $id_barang = $tampil['id_barang'];
        $jumlah_pembelian = $tampil['jumlah'];

    $totalHarga = intval($_POST['totalHarga']);
    $uang = intval($_POST['uangDimasukkan']);
    $kembalian = intval($_POST['Kembalian']);


$sql = "SELECT stok_barang FROM nama_barang WHERE id_barang = ?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("i", $id_barang);
$stmt->execute();
$stmt->bind_result($stok);
$stmt->fetch();
$stmt->close();


if ($stok >= $jumlah_pembelian) {
    $stok_baru = $stok - $jumlah_pembelian;
    $sql = "UPDATE nama_barang SET stok_barang = ? WHERE id_barang = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ii", $stok_baru, $id_barang);
    $stmt->execute();
    $stmt->close();  

    $pesan1 = "<h1 style='margin-left: -100px;'>Pembelian berhasil</h1>";
    }else{
    $pesan2 = "<h1 style='margin-left: -100px;'>Stok tidak mencukupi</h1>";
}
}

if (isset($_POST['beli'])) {
echo "$pesan1";    
}else{
 echo "$pesan2";    
}


    






echo "<form method='post' action='finish.php'>
<input type='hidden' name='totalHarga' value='$totalHarga'>
<input type='hidden' name='uang' value='$uang'>
<input type='hidden' name='kembalian' value='$kembalian'>
<input type='submit' name='yo' value='Kembali' class='btn btn-warning' style='padding: 15px; padding-left: 50px; padding-right: 50px;'>
</form>";


echo "</div>
          <div class='col-sm-2'></div>
          </div>";
}


?>


   
