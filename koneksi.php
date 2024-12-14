<?php


$hostname = "localhost";
  $username = "root";
  $password = "";
  $database = "barang";

  $koneksi = new mysqli($hostname, $username, $password, $database);
  if ($koneksi) {
     "data base terkoneksi";
  }else {
        "data base tidak terkoneksi";
  }

?>