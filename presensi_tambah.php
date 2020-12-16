<?php
require_once("Koneksi.php");
if(!empty($_POST['absen'])) {
	date_default_timezone_set("Singapore");
	$date = date("Y-m-d");
	$time = date("H:i:s");
	$sql = "INSERT INTO presensi (NIP, tanggal, time_in, keterangan) VALUES (:NIP, :tanggal, :time_in, :keterangan)";
	$stmt = $koneksi->prepare( $sql );
	$t = date("H");
	if ($t <= "08") {
	  $ket = "Hadir";
	} else if ($t > "08") {
	  $ket = "Terlambat";
	}
	$result = $stmt->execute(array(":NIP"=>$_POST['NIP'],':tanggal'=>$date, ':time_in'=>$time, ':keterangan'=>$ket));
	if (!empty($result)){
	  header('location:index.php');
	}
	else{
		echo"<script>alert('NIP tidak sesuai, silakan masukkan NIP yang benar!');document.location='index.php'</script>";
	}
}
else{
	echo"<script>alert('sesi absen diharini telah berakhir');document.location='index.php'</script>";
}
?>