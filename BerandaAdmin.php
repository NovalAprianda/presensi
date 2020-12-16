<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="mycss.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    </head>
    <?php
    require_once("Koneksi.php");
    ?>
    <body>
    <?php
    $stmt = $koneksi->prepare("SELECT * FROM karyawan LEFT JOIN jabatan ON karyawan.kode_jabatan=jabatan.kode_jabatan ORDER BY nama");
    $stmt->execute();
    $result = $stmt->fetchAll();
    ?>
        <div class="admin">
            <a href="index.php">
                <input style="float: left;" class="btn btn-danger" type="button" value="Logout">
            </a>
            <header>    
                <h1>Selamat Datang!</h1><hr>
            </header>
                <table class="table">
                    <thead>
                            <tr>
                                <br><center><h3 style="color: greenyellow;">Data Karyawan</h3></center><br>
                            </tr>
                            <tr class="bg-primary" style="color: maroon;">
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Jabatan</th>
                                <th>Alamat</th>
                                <th colspan='2'>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            if(!empty($result)) { 
                            foreach($result as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row["nama"]; ?></td>
                            <td><?php echo $row["NIP"]; ?></td>
                            <td><?php echo $row["nama_jabatan"]; ?></td>
                            <td><?php echo $row["alamat"]; ?></td>
                            <td><a href="edit.php?NIP=<?php echo $row['NIP']; ?>">Edit</a></td>
                            <td><a href="hapus.php?NIP=<?php echo $row['NIP']; ?>" onclick="return confirm('Anda yakin ingin menghapus <?php echo $row['nama']; ?>?')">Hapus</a></td>
                        </tr>
                        <?php
                            }
                                }
                        ?>
                    </tbody>
                    </table>
                    <br><center>
                        <a href="tambah.php">
                            <input class="btn btn-warning" type="button" value="Tambah Data">
                        </a>
                        <a href="laporan.php">
                            <input class="btn btn-light" type="button" value="Laporan Presensi">
                        </a>
                    </center><br>
        </div>
    </body>
</html>