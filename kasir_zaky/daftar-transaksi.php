<?php
include("header.php");
?>
<style>
    #main-content {
        margin-top: 40px;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-primary bg-primary fixed-top">
        <div class="navbar-brand" href="index.php">Pelanggan</a>
            <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class ="nav-link" href="transaksi.php">Transaksi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="p-4" id="main-content">
   
        <div class="card mt-5">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>nomor</th>
                            <th>tanggal transaksi</th>
                            <th>nama pemesan</th>
                            <th>menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include("koneksi/koneksi.php");

                        $sql = $koneksi->query("SELECT * FROM penjual ORDER BY PenjualID DESC LIMIT 1");
                        while ($data = $sql->fetch_assoc()) {
                            ?>

                            <tr>
                                <td><?php echo $data['PenjualID']?></td>
                                <td><?php echo $data['TanggalPenjual']?></td>
                                <td><?php $sql2 = $koneksi->query("SELECT * FROM pelanggan WHERE PelangganID = '" .$data['PenjualID']."'");
                                while ($data2 = $sql2->fetch_assoc()) {
                                    echo $data2['NamaPelanggan'];
                                }
                                ?>
                                </td>
                                <td>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nama Produk</th>
                                                <th class="col-1">Jumlah</th>
                                                <th class="col-1">Harga</th>
                                                <th class="col-1">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql3 = $koneksi->query("SELECT * FROM detailpenjualan WHERE DetailID = '" . $data['PenjualID'] . "'");
                                            $totalharga = 0;
                                            while ($data3 = $sql3->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php
                                                        $sql4 = $koneksi->query("SELECT * FROM produk WHERE ProdukID = '" . $data3['ProdukID'] . "'");
                                                        while ($data4 = $sql4->fetch_assoc())
                                                        {
                                                            echo $data4['NamaProduk'];
                                                        }
                                                        ?>
                                                        </td>
                                                        <td><?php echo $data3['JumlahProduk'] ?>Pcs</td>
                                                        <td>Rp.<?php echo number_format($data3['Subtotal']) ?></td>
                                                        <td><?php echo"<a href='hapus-menu.php?id=$data3[PenjualID]' class='btn btn-sm btn-danger'>Hapus</a>" ?></td>
                                                    </tr>
                                                    <?php
                                                    $totalproduk = $data3['JumlahProduk'] * $data3['Subtotal'];
                                                    $totalharga += $totalproduk;
                                                    }
                                                    ?>

                                                    <tr>
                                                        <td colspan='2'><strong>Total Harga:</strong></td>
                                                        <td colspan='2'><strong>Rp.<?php echo number_format("$totalharga") ?></strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <?php
                                        echo "</tr>";
                                    }

                                    ?>
                                </tbody>
                            </table>
                            <p style="text-align: right;color: blue;" class="me-3">Jika ingin menambah pesanan lagi harap cetak struk nya terlebih dahulu</p>
                            <a href="cetaktransaksi.php" target="_blank" class="btn btn-md btn-success float-end">Cetak Transaksi</a>
                            <a href="transaksi.php" target="_blank" class="btn btn-md btn-primary float-end">Tambah Transaksi+</a>
                        </div>
                    </div>
                </div>
            </body>