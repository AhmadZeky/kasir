<div class="row">
    <center>
        <h2> Tambah Petugas </h2>
    </center>
    <div class="col-lg-5">
        <div class="panel panel-primary">
            <div class="panel-heading"> Form Tambah Petugas </div>
            <div class="panel-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label class="form-label">Nama:</label>
                        <input type="text" class="form-control" placeholder="Enter Name" name="Username" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password:</label>
                        <input type="password" class="form-control" placeholder="Enter Password" name="Password" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Role:</label>
                        <select class="form-control" name="Level" required>
                            <option value="">Pilih Role</option>
                            <option value="admin">Administrator</option>
                            <option value="petugas">Petugas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                        <a href="?page=user" class="btn btn-md btn-danger">Kembali</a>
                    </div>
                    <?php

                    require '../koneksi/koneksi.php';
                    if(isset($_POST['tambah'])) {
                        $Username = $_POST['Username'];
                        $Password = md5($_POST['Password']);
                        $Level = $_POST['Level'];

                        $query = mysqli_query($koneksi, "INSERT INTO user (Username, password, Level) VALUES ('$Username','$Password','$level')");
                        if ($query) {
                            echo "<script>alert('berhasil menambahkan user')</script>";
                            echo "<script>window.location='index.php?page=user';</script>";
                            } else {
                                echo "<script>alert('Gagal menambahkan user')</script>";
                            }
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
