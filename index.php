<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="mycss.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <title>Presensi</title>
</head>
<?php
    require_once("Koneksi.php");
?>

<body>
    <?php
    $tgl = getdate(date("U"));
    $stmt = $koneksi->prepare("SELECT * FROM presensi left join karyawan on presensi.NIP = karyawan.NIP WHERE tanggal = CURRENT_DATE() ORDER BY time_in DESC LIMIT 5");
    $stmt->execute();
    $result = $stmt->fetchAll();
    ?>
    <div class="utama">
        <header>
            <h1>Selamat Datang!</h1>
            <hr>
        </header>
        <div class="badan">
            <div class="kiri">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <br>
                            <center>
                                <h3>Data Presensi Karyawan</h3>
                                <h5>
                                    <?php $mydate=getdate(date("U"));
                                    echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
                                    echo "<h4> Absen Hanya Tersedia Di Jam 08.00 - 10.00 WITA <h4>";
                                    ?>
                                </h5>
                            </center><br>
                        </tr>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                            if(!empty($result)) { 
                            foreach($result as $row) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row["nama"]; ?></td>
                            <td><?php echo $row["time_in"]; ?></td>
                        </tr>
                        <?php
                            }
                                }
                        ?>
                    </tbody>
                </table>
                <a href="halamanLogin.php"><input class="btn btn-danger" type="button" value="Masuk sebagai Admin"></a>
            </div>
            <div class="kanan">
                <center>
                    <br>
                    <h3>Presensi</h3><br>
                    <form action="presensi_tambah.php" method="POST">
                        <input class="form-control" type="text" name="NIP" placeholder="NIP" value=""><br><br>
                        
                        <?php
                        date_default_timezone_set("Singapore");
                        $t = date("H");

                        if ($t >= "00" && $t <= "10") {
                            ?><input class="btn btn-warning" type="submit" value="Hadir" name="absen"><?php
                          } else {
                            ?><button class="btn btn-warning">Hadir</button>
                            <?php
                          }
                        ?>
                        
                    </form>
                </center>
            </div>
        </div>
    </div>
</body>

</html>