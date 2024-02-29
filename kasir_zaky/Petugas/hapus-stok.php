<?php
include_once("../koneksi/koneksi.php");
$id = $_GET['ProdukID'];
$result = mysqli_query($koneksi, "DELETE FROM produk WHERE ProdukID=$id");
header("location:index.php?page=stok");
?>