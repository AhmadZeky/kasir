<?php
include("koneksi/koneksi.php");
$id = $_GET['id'];
$sql = $koneksi->query("DELETE FROM detailpenjualan WHERE PenjualID=$id");
echo "<script>
        alert('Data berhasil dihapus');
        window.location.href = 'daftar-transaksi.php';
        </script>";
        ?>