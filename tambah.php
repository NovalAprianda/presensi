<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="mycss.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <title>Tambah Data</title>
</head>
<?php
require_once("Koneksi.php");
?>

<body>
    <div class="admin">
        <header>
            <h1>Tambah Data</h1>
        </header>
        <div class="edit">
            <center>
                <form action="add.php" method="POST">
                    <br>
                    <h5>NIP: </h5><input class="form-control" type="text" name="NIP" placeholder="12345678" value=""
                        required><br>
                    <h5>Nama: </h5><input class="form-control" type="text" name="nama" placeholder="Nama" value=""
                        required><br>
                    <h5>Alamat: </h5><input class="form-control" type="text" name="alamat" placeholder="Alamat" value=""
                        required><br>
                    <h5>Jabatan: </h5>
                    <select name="jabatan" class="form-control" required>
                        <?php 
                        $stmt=$koneksi->prepare('SELECT * FROM jabatan');
                        $stmt->execute();
                        ?>
                        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <?php extract($row); ?>
                        <option value="<?php echo $row['kode_jabatan']; ?>"><?php echo $row['nama_jabatan']; ?>
                        </option>
                        <?php endwhile; ?>
                    </select><br><br><br>
                    <input class="btn btn-warning" type="submit" value="Simpan" name="ubah">
                    <a href="BerandaAdmin.php"><input class="btn btn-dark" type="button" value="Batal"></a>
                </form>
            </center>
        </div>
    </div>
</body>

</html>