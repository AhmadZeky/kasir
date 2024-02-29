<?php
include_once("../koneksi/koneksi.php");
$id = $_GET['UserID'];
$result = mysqli_query($koneksi, "DELETE FROM user WHERE UserID=$id");
header("loaction: index.php?page=user");
?>