<?php

include "../koneksi/koneksi.php";

error_reporting(0);
session_start();
if (isset($_SESSION['Username'])) {
    echo "<script>alert('Maaf, Anda sudah Login. Silahkan Log out terlebih dahulu'); window.location.replace('index.php');</script>";
}

if (isset($_POST['submit'])) {
    $Username = $_POST['Username'];
    $Password = md5($_POST['Password']);

    $sql = "SELECT * FROM user WHERE Username='$Username' AND Password='$Password' ";
    $result = mysqli_query($koneksi, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $level = $row['Level'];
        $_SESSION['Level'] = $level;

        $_SESSION['Username'] = $row['Username'];

        header("Location: index.php");
        echo "<script>alert('Berhasil Masuk')</script>";
    } else {
        echo "<script>alert('username atau password anda salah silahkan coba lagi!')</script>";
    }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-witdh, initial-scale=1">
        <title>Kasir ZEKY</title>
        <link href="../bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <form action="" class="form-signin" method="post">
                                <h3 class="">Login</h3>
                                <div class="card-body">
                                    <form action="" method="post">
                                        <div class="mb-3 mt-3">
                                            <table for="" class="form-label">Nama</table>
                                            <input type="text" name="Username" class="form-control" required autofocus>
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="" class="form-label">Password</label>
                                            <input type="password" name="Password" class="form-control" required autofocus>
                                        </div>
                                        <button name="submit" class="btn btn-primary">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="../bootstrap-5.3.2-dist new/bootstrap.min.js"></script>
            <script src="../bootstrap-5.3.2-dist new/jquery.min.js"></script>
        </body>
    </html>