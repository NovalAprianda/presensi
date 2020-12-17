<?php
    require_once("Koneksi.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="mycss.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <title>Laporan</title>
    </head>
    <body">
        <div class="admin">
            <header>    
                <h1>Laporan Presensi</h1><hr>
            </header>
                <table class="table">
                    <thead>
                            <tr>
                                <br><center><h3 style="color: greenyellow;">Data Presensi</h3>
                                <h6 style="color: greenyellow;">
                                    Presensi: 
                                    <?php
                                        if(isset($_POST['tgl'])) {
                                            $stgl = $_POST['tgl'];
                                            $stgl = date('l, d F Y');
                                            echo "$stgl";
                                        }
                                        else {
                                            $today = getdate(date("U"));
                                            echo "$today[weekday], $today[mday] $today[month] $today[year]";
                                        }
                                    ?>
                                </h6><br>
                            </tr>
                            <tr>
                            <form method="POST">
                                <input type="date" name="tgl">
                                &nbsp;<input type="submit" name="p"><br><br>
                            </form>
                            </tr>
                            <tr class="bg-primary" style="color: maroon;">
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                            </tr>
                            <?php
                                $no = 1;

                                if(isset($_POST['tgl'])) {
                                    $tgl = $_POST['tgl'];
                                    $sql = $koneksi->prepare("SELECT * FROM presensi join karyawan on presensi.NIP = karyawan.NIP WHERE tanggal = '$tgl'");
                                    $sql->execute();
                                    $result = $sql->fetchAll();
                                }
                                else {
                                    $sql = $koneksi->prepare("SELECT * FROM presensi join karyawan on presensi.NIP = karyawan.NIP");
                                    $sql->execute();
                                    $result = $sql->fetchAll();
                                }
                                
                                if(!empty($result)) {
                                    foreach($result as $row){
                                    ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['nama']?></td>
                                    <td><?php echo $row['NIP']?></td>
                                    <td><?php echo $row['tanggal'] ?></td>
                                    <td><?php echo $row['keterangan'] ?></td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                        </thead>
                    </table>
                    <a href="BerandaAdmin.php"><input class="btn btn-primary" type="button" value="Kembali"></a>
                </div>
    </body>
</html>