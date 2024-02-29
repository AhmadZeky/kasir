<div class="row">
    <center>
        <h2>Tambah Menu/Produk</h2>
    </center>
    <div class="col-lg-5">
        <div class="panel panel-primary">
            <div class="panel-heading">Form Tambah Menu</div>
            <div class="panel-body">
                <form method="POST" class="form" action="" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" name="NamaProduk" class="form-control" require>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" name="Harga" class="form-control" require>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Stok barang</label>
                                <input type="number" name="stok" class="form-control" require>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto<span style="color: red;"> *</span></label>
                            <input type="file" class="form-control" id="foto" name="foto" accept=".jpg, .jpeg, .png, .gif" required>
                            
                            <p style="color: red;">Hanya bisa menginput foto dengan ekstensi PNG, JPG, JPEG, SVG</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="simpan" class="btn btn-md btn-primary" value="simpan">
                        <input type="submit" href="?page=stok" class="btn btn-md btn-danger" value="kembali">
                    </div>

                    <?php
                    include '../koneksi/koneksi.php';
                    if (isset($_POST['simpan'])) {
                        $nama = $_POST['NamaProduk'];
                        $harga = $_POST['Harga'];
                        $stok = $_POST['stok'];

                        $target = "../foto/";
                        $time = date('dmYHis');

                        if (isset($_FILES["foto"])) {
                            $type = strtolower(pathinfo($_FILES["foto"] ["name"], PATHINFO_EXTENSION));
                            } else {
                                echo "error: foto tidak ditemukan.";
                                exit();
                            }

                                $targetfile = $target . $time. '.' . $type;
                                $filename = $time . '.' . $type;

                                $uploadOk= 1;

                                if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0) {
                                    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetfile)) {
                                    $sql = "INSERT INTO produk (NamaProduk, Harga, Stok, foto) VALUES ('$nama','$harga','$stok','$filename')";
                                    if ($koneksi->query($sql) == TRUE) {
                                        echo "<script>alert('berhasil menambahkan produk');window.location.href='?page=stok';</script>";
                                        exit();
                                        } else {
                                             echo "error: " . $sql ."<br>". $koneksi->error;
                                            }
                                        } else {
                                            echo "maaf, terjadi kesalahan saat mengupload file gambar.";
                                            }
                                        } else {
                                            echo "error during file upload: ". $_FILES["foto"]["error"];
                                            }
                                        
                                                $koneksi->close();    
                                            }
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>