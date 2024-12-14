<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
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

 
$koneksi->close();

?>