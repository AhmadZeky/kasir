<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "db_kasir";

$koneksi = mysqli_connect($server, $user, $password, $db);
if ($koneksi->connect_error) {
    die("koneksi Gagal: " . $koneksi->koneksi_error);
}

?>