<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    		<form method="POST" action="">
<?php
include 'koneksi.php';

if (isset($_POST['konfirmasi'])) {
	mysqli_query($koneksi, "insert into transaksisementara set
		id_barang   = '$_POST[id_barang]',
   		nama_barang = '$_POST[nama_barang]', 
   		total_harga = '$_POST[total_harga]',
   		jumlah = '$_POST[jumlah]'");


   
   }



?> 

<!DOCTYPE html>
<html>
<head>
    <style>
        h3{
            margin-left: 550px;
        }
    </style>
	<title>keranjang belanja</title>
</head>
<body>
    <h3 style="font-family:  Brush Script MT, cursive; ;">keranjang belanja</h3>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
    <table border="3"  class="table table-bordered">
    	<tr>
    		<td>no</td>
    		<td>id_barang</td>
    		<td>nama_barang</td>
    		<td>total_harga</td>
    		<td>jumlah</td>






    	</tr>
        </div>
        <div class="col-sm-2"></div>

</div>

 <?php
     include 'koneksi.php';
     $no=1;
     $ambildata = mysqli_query($koneksi, "select * from transaksisementara WHERE status = 'aktif'");
     while ($tampil = mysqli_fetch_array($ambildata)) {
      echo "
               <tr>
                 <td>$no</td>
                 <td>$tampil[id_barang]</td>
                 <td>$tampil[nama_barang]</td>
                 <td>$tampil[total_harga]</td>
                 <td>$tampil[jumlah]</td>
                 

                 ";


    $no++;
}
$sql = "SELECT total_harga FROM transaksisementara  WHERE status = 'aktif'";
$result = $koneksi->query($sql);
$totalHarga = 0;

if ($result->num_rows > 0) {
    
    while($tampil = $result->fetch_assoc()) {
        $totalHarga += $tampil['total_harga'];
    }
}

echo "Total harga yang dibeli adalah: Rp " . $totalHarga;



 ?>

               


</body>
</html>
</table>
      </form>


       <a href="../toko/belanja.php" class="btn btn-primary">tambah barang</a>


<?php
include 'koneksi.php';

$sql = "SELECT total_harga FROM transaksisementara  WHERE status = 'aktif'";
$result = $koneksi->query($sql);
$totalHarga = 0;

    
    while($tampil = $result->fetch_assoc()) {
        $totalHarga += $tampil['total_harga'];
    }
    


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tai'])){
  $jumlah = isset($_POST['jumlah']) ? intval($_POST['jumlah']) : 0;
  $uang = isset($_POST['uang']) ? intval($_POST['uang']) : 0;
  $kembalian= $uang - $totalHarga;
  if ($kembalian > 0);
}





     $no=1;
     $ambildata = mysqli_query($koneksi, "select * from transaksisementara WHERE status = 'aktif'");
     while ($tampil = mysqli_fetch_array($ambildata)){

                  echo " <form method='post' action='tes.php'>
                  <input type='hidden' value='$tampil[id_barang]' name='id_barang'>
                  <input type='hidden' value='$tampil[jumlah]' name='jumlah'>
                  <input type='hidden' value='$tampil[nama_barang]' name='nama_barang'>
                  <input type='hidden' value='$totalHarga' name='totalHarga'>
                
                         ";
                     }

                   
              
          
            echo " <input type='submit' value='beli' name='beli' class='btn btn-warning'>
                      </form>
                  ";
?>

