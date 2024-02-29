<?php
include("header.php");
?>
    <body>
        <div class="p-4 col-6">
            <div class="card mt-5">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Transaksi</th>
                                <th>Nama Pemesan</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include("koneksi/koneksi.php");

                                $query = "SELECT PenjualID, TanggalPenjual FROM penjual ORDER BY PenjualID DESC LIMIT 1 ";
                                $result = mysqli_query($koneksi, $query);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['PenjualID'] . "</td>";
                                    echo "<td>" . $row['TanggalPenjual'] . "</td>";
                                    ?>
                                    <td>
                                        <?php
                                            $query1 = "SELECT NamaPelanggan FROM pelanggan WHERE PelangganID = '". $row['PenjualID']."'";
                                            $result1 = mysqli_query($koneksi, $query1);
                                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                                echo $row1['NamaPelanggan'];
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
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $query2 = "SELECT ProdukID, PenjualID, JumlahProduk, Subtotal FROM detailpenjualan WHERE DetailID = '" . $row['PenjualID'] . "'";
                                                    $result2 = mysqli_query($koneksi, $query2);
                                                    $totalHarga = 0;
                                                    
                                                    while ($detailrow = mysqli_fetch_assoc($result2)) {
                                                        echo "<tr>";
                                                        
                                                        $query3 = "SELECT NamaProduk FROM produk WHERE ProdukID = '" . $detailrow['ProdukID'] . "'";
                                                        $result3 = mysqli_query($koneksi, $query3);
                                                        
                                                        while ($row2 = mysqli_fetch_assoc($result3)) {
                                                            echo "<td>" . $row2['NamaProduk'] . "</td>";
                                                        }
                                                        echo "<td>" . $detailrow['JumlahProduk'] ."Pcs</td>";
                                                        echo "<td>Rp." . $detailrow['Subtotal'] . "</td>";
                                                        echo "</tr>";
                                                        
                                                        $totalproduk = $detailrow['JumlahProduk'] * $detailrow['Subtotal'];
                                                        $totalHarga += $totalproduk;
                                                    }
                                                        echo "<tr>";
                                                        echo "<td colspan='2'> <strong>Total Harga:</strong></td>";
                                                        echo "<td colspan='2'> <strong>Rp." . $totalHarga . ",00</strong></td>";
                                                        echo "</tr>";
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <?php
                                        }
                                            echo "</tr>";
                                            ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </body>
                                        <script>
                                        window.print()
                                        </script>