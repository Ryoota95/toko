<?php
include 'koneksi.php';



if (isset($_POST['ubah_status'])) {
    $id = $_POST['id'];


    $sql = "UPDATE transaksisementara SET status = FALSE WHERE id = $id";

    if ($koneksi->query($sql) === TRUE) {
        echo "Status berhasil diubah menjadi nonaktif";
    } else {
        echo "Error: " . $koneksi->error;
    }
}

// 4. Tutup koneksi
$koneksi->close();
?>
