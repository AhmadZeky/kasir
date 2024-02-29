<h2> War Reng </h2>
<br>
<?php if ($_SESSION['Level'] == "admin") { 
    ?>
    <a href="?page=tambah-user" class="btn btn-primary btn-md">Tambah User</a>
    <?php }?>
</br>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Password</th>
                <th>Level</th>
                <?php if ($_SESSION['Level'] == "admin") { ?>
                    <th> Pilihan </th>
                    <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php 
            include '../koneksi/koneksi.php';
            $no = 1;
            $sql = $koneksi->query("SELECT * FROM user");
            while ($data = $sql->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data['Username']?></td>
                    <td><?php echo $data['Password']?></td>
                    <td><?php echo $data['Level']?></td>
                    <?php if ($_SESSION['Level'] == "admin") {
                        ?>
                        <td> <a type='button' href='?page=edit-user&UserID=<?= $data['UserID']; ?>' class='btn btn-sm btn-warning'>Edit</a> | <a type='button' href='?page=hapus-user&UserID=<?= $data['UserID']; ?>' class='btn btn-sm btn-danger'>Delete</a></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>        