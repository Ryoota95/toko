<!DOCTYPE html>
<html>
<head>
  <title>cari data</title>
</head>
<style>
  h3{
    margin-left: 550px;
  }
     .shift-text {
            position: relative;
            left: 10px; /* Geser teks ke kanan 10px */
        }

</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<h3 style="font-family:  Brush Script MT, cursive; ;">id barang belanja</h3>
<body>

  <?php 
include 'koneksi.php';
$id_barang = isset($_POST['id_barang']) ? intval($_POST['id_barang']) : 0;

$jumlah = isset($_POST['jumlah']) ? intval($_POST['jumlah']) : 0;
$sql = "SELECT harga_barang FROM nama_barang WHERE id_barang = ?";
$ttl = $koneksi->prepare($sql);
$ttl->bind_param("i", $id_barang);
$ttl->execute();
$ttl->bind_result($harga);
$ttl->fetch();
$ttl->close();

$total= $harga * $jumlah;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = $_POST['id_barang'];
    $sql = "SELECT * FROM nama_barang WHERE id_barang = ?";
    $cari = $koneksi->prepare($sql);
    $cari->bind_param("i", $id);
    $cari->execute();
    $result = $cari->get_result();
    $no=1;
    
    $uang = isset($_POST['uang']) ? intval($_POST['uang']) : 0;
    $kembalian = $uang-$total ;

   
  
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "  
            <form method='post' action='
           <label for='id_barang' style='margin-left: 260px;'></label>
           <input type='text' id='readonlyinput' name='id_barang' value='ID yang masuk:$id'  class='form-control-sm p-10 my-1 bg-white text-black' readonly>
           
        
           </form>
         <div class='row'>
         <div class='col-sm-2'></div>
         <div class='col-sm-8'>


             <table border='1' class='table table-bordered'>
        <tr>
            <td>no</td>
            <td>id_barang</td>
            <td>nama_barang</td>
            <td>harga_barang</td>
           
        </tr>
        
              <tr>
                 <td>$no</td>
                 <td>$row[id_barang]</td>
                 <td>$row[nama_barang]</td>
                 <td>$row[harga_barang]</td>
                 
              </tr>
              </table>
              </div>
              <div class='col-sm-2'></div>
              ";




                         
                echo "
                      <div class='row'>
         <div class='col-sm-3'></div>
         <div class='col-sm-8'>


               <form method='post' action=''>
                <tr> <td>jumlah yang ingin dibeli</td> </tr>
                <tr><td><input type='number' name='jumlah' min='1' max='100' value='$jumlah'  class='form-control-sm p-10 my-1 bg-white text-black'></td></tr> <br>
              
                   

                <input type='hidden' name='id_barang' value='$row[id_barang]' style='margin-left: 100px;' </input>                      
               
                 <button onclick='tampilkanvalue()' name='total' class='btn btn-primary' style='margin-left: 260px; margin-top: -35px;   position: fixed;' >total</button>
                     </div>
              <div class='col-sm-1'></div>

                  </form>";

        
           
         
              echo "
                        <div class='row'>
              <div class='col-sm-3'></div>
              <div class='col-sm-8'>
               <form method='post' action='keranjang.php'>
              
                <tr><td><input type='hidden' name='jumlah' value='$jumlah'></td></tr> <br>
                <input type='hidden' value='$total' name='total_harga'</input>
                 <input type='hidden' name='nama_barang' value='$row[nama_barang]' </input>


                <input type='hidden' name='id_barang' value='$row[id_barang]' </input>                      
               
                 <button type='submit' name='konfirmasi' class='btn btn-primary' class='shift-text' style='padding-padding-left: 80px; margin-left: 50px;'>konfirmasi</button>
                                      </div>
              <div class='col-sm-1'></div>

                  </form>";
                }





              
 
                        

        }
    } else {
        echo "Tidak ada  id untuk barang itu KONTOL";
    }
    $cari->close();
    $koneksi->close();


?>

<<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<body>
    <div id="jsbuttoncontainer" style="display: none;">
    <button id="jsbutton">tombol</button>
    

  </div>

  <script>  <?php if (isset($_POST['total'])): ?>

                document.getElementById('jsbuttoncontainer').style.display = 'inline';
    
  <?php endif ?>
    

  </script>

 


</body>
</html>



<?php
include 'koneksi.php';


$id_barang = isset($_POST['id_barang']) ? intval($_POST['id_barang']) : 0;
$jumlah = isset($_POST['jumlah']) ? intval($_POST['jumlah']) : 0;


$sql = "SELECT harga_barang FROM nama_barang WHERE id_barang = ?";
$ttl = $koneksi->prepare($sql);
$ttl->bind_param("i", $id_barang);
$ttl->execute();
$ttl->bind_result($harga);
$ttl->fetch();
$ttl->close();

$total= $harga * $jumlah;
               if (isset($_POST['total'])) {
                 // code...
               

                echo "

            
                <input id='num1' value='$total' type='hidden'>
                <p>total Rp=<span id='output'></span></p>

                <script>
               

               function tampilkanvalue(){
               var inputValue = document.getElementById('num1').value;
               document.getElementById('output').textContent = inputValue;
     }

           window.onload = tampilkanvalue

              </script>";

             

            
                  
             }
   
      
    





if (isset($_POST['tai'])){
  $jumlah = isset($_POST['jumlah']) ? intval($_POST['jumlah']) : 0;
  $uang = isset($_POST['uang']) ? intval($_POST['uang']) : 0;
  $kembalian= $uang - $total;
  if ($kembalian > 0) {
    

         echo "kembalian anda: Rp". number_format($kembalian,2,',','.');

        
         }else{
          echo "nd cukup uangmu";

            }
         }


$koneksi->close();

?>

