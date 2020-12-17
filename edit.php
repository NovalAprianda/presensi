<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="mycss.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <title>Edit Data</title>
</head>
<?php
require_once("Koneksi.php");
$stmt = $koneksi->prepare("SELECT * FROM karyawan where NIP='". $_GET["NIP"] ."'");
$stmt->execute();
$result = $stmt->fetchAll();
?>

<body>
    <div class="admin">
        <header>
            <h1>Ubah Data</h1>
        </header>
        <div class="edit">
            <center>
                <br>
                <h3><?php echo $result[0]['nama']; ?></h3>
                <hr>
                <form action="update.php" name="editkyn" method="POST">
                    <h5>NIP: </h5><input class="form-control" type="text" readonly name="NIP"
                        value="<?php echo $result[0]['NIP']; ?>">
                    <p>*tidak bisa diubah</p><br>
                    <h5>Nama: </h5><input class="form-control" type="text" name="nama"
                        value="<?php echo $result[0]['nama']; ?>" required><br>
                    <h5>Alamat: </h5><input class="form-control" type="text" name="alamat"
                        value="<?php echo $result[0]['alamat']; ?>" required><br>
                    <h5>Jabatan: </h5>
                    <select name="kode_jabatan" class="form-control" required>
                        <?php 
                            $stmt=$koneksi->prepare('SELECT * FROM jabatan');
                            $stmt->execute();
                        ?>
                        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <?php extract($row); ?>
                        <option class="look" value="<?php echo $row['kode_jabatan']; ?>">
                            <?php echo $row['nama_jabatan']; ?></option>
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