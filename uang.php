
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <div class='row'  style='padding-top: 150px;'>
        <div class='col-sm-5'></div>
        <div class='col-sm-5'>
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
    echo "  <div class='row'  style='padding-top: 50px;'>
        <div class='col-sm-2'></div>
        <div class='col-sm-8'>";

  $ambildata = mysqli_query($koneksi, "select * from transaksisementara WHERE status = 'aktif'");
     while ($tampil = mysqli_fetch_array($ambildata)){
        
     


   
    echo " <form method='post' action=''>
       <input type='hidden' value='$tampil[id_barang]' name='id_barang'>
                  <input type='hidden' value='$tampil[jumlah]' name='jumlah'>
                  
                  
                         "; 

                     }

                     echo "
                          <div style='margin-left: -230px;'>totalHarga belanjaan anda = $totalHarga</div>
                     <button type='submit' name='tai' class='btn btn-primary' style='margin-top: 10px; margin-left: -230px;' >hitung kembalian</button>
                 </div>
                 <div class='col-sm-2'></div>
                                     
                  </div>
                  ";


$sql = "SELECT total_harga FROM transaksisementara  WHERE status = 'aktif'";
$result = $koneksi->query($sql);
$totalHarga = 0;

if ($result->num_rows > 0) {
    
    while($tampil = $result->fetch_assoc()) {
        $totalHarga += $tampil['total_harga'];
    }

        echo "  <div class='row'  style='padding-top: 50px;'>
        <div class='col-sm-5'></div>
        <div class='col-sm-5'>
              <tr><td><input type='text' name='uang' placeholder='masukkan uang anda' value='' style='margin-top: -150px; margin-left: -100px;'></td></tr>
          </div>
          <div class='col-sm-2'></div>
          </div>
              </form>
                ";
}

            
                  
             
   




if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tai'])){
  $jumlah = isset($_POST['jumlah']) ? intval($_POST['jumlah']) : 0;
  $uang = isset($_POST['uang']) ? intval($_POST['uang']) : 0;
  $kembalian= $uang - $totalHarga;
  if ($kembalian > 0) {
    

         echo "<h5  style='margin-left: -130px;margin-top: -60px;'> kembalian anda: Rp". number_format($kembalian,2,',','.')."</h5>";

        
         }else{
          echo "nd cukup uangmu";

            }
         }


   $ambildata2 = mysqli_query($koneksi, "select * from transaksisementara WHERE status = 'aktif'");
     while ($tampil2 = mysqli_fetch_array($ambildata2)){

                  echo " <form method='post' action='beli.php'>
                  <input type='hidden' value='$tampil2[id_barang]' name='id_barang'>
                  <input type='hidden' value='$tampil2[jumlah]' name='jumlah'>
                  <input type='hidden' value='$tampil2[nama_barang]' name='nama_barang'>
                  <input type='hidden' value='$totalHarga' name='totalHarga'>

                         ";
                     

                  } 
              
          if (isset($_POST['tai'])) {
        
          
            echo " 
                  <input type='hidden' value='$kembalian' name='kembalian'>
                  <input type='hidden' value='$uang' name='uang'>
            <input type='submit' value='beli' name='beli' class='btn btn-warning'>
                      </form>
                  ";
              }




?>

