<?php
include("../koneksi/koneksi.php");

$UserID = $_GET['UserID'];
$result = mysqli_query($koneksi, "SELECT * FROM user WHERE UserID='$UserID'");
$row = mysqli_fetch_assoc($result);
if (!$row) {
    die("error: data not found.");
}

if (isset($_POST['update'])) {
    $Username = mysqli_real_escape_string($koneksi, $_POST['Username']);
    $Password = md5(mysqli_real_escape_string($koneksi, $_POST['Password']));
    $Level = mysqli_real_escape_string($koneksi, $_POST['Level']);

    $updateQuery = mysqli_query($koneksi, "UPDATE user SET Username='$Username', Password='$Password', Level='$Level' WHERE UserID='$UserID'");

    if ($updateQuery) {
        echo "User updated successfully. <a href='index.php?page=user'>View Users</a>";
        } else {
            echo "error updating user: " . mysqli_error($koneksi);
        }
    }
?>

<div class="row">
    <center>
        <h2>Edit Petugas</h2>
    </center>
    <div class="col-lg-5">
        <div class="panel panel-primary">
            <div class="panel-heading">Form Edit Petugas</div>
            <div class="panel-body">
                <form method="post">
                    <div class="form-group">
                        <label class="form-label">Nama:</label>
                        <input type="text" class="form-control" value="<?php echo $row['Username']; ?>" name="Username" required>
                    </div>
                        <div class="form-group">
                        <label class="form-label">Password:</label>
                        <input type="password" class="form-control" value="<?php echo $row['Password']; ?>" placeholder="Enter new password" name="Password" required>
                        </div>
    
                        <div class="form-group">
                        <label class="form-label">Role:</label>
                        <select class="form-control" name="Level" required>
                        <option value="<?php echo $row['Level']; ?>"><?php echo $row ['Level'] ?></option>
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                    </select>
                </div>

                    <div class="form-group">
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                    <a href="?page=user" class="btn btn-md btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>