<?php
require_once("Koneksi.php");
$stmt=$koneksi->prepare("delete from karyawan where NIP='" . $_GET['NIP']."'");
$stmt->execute();
header('location:BerandaAdmin.php');
?>