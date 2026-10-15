<?php

$koneksi = mysqli_connect("localhost", "root", "", "restoran_cafe");

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

?>