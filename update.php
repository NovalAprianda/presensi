<?php
require_once("Koneksi.php");
if(!empty($_POST["ubah"])) {
	$pdo_statement=$koneksi->prepare("update karyawan set nama='" . $_POST['nama']. "', kode_jabatan='" . $_POST['kode_jabatan']. "', alamat='" . $_POST['alamat'] . "' where NIP='" . $_POST['NIP'] ."'");
	$result = $pdo_statement->execute();
	if($result) {
		header('location:BerandaAdmin.php');
	}
}
?>