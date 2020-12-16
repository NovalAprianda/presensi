<?php
require_once("Koneksi.php");
if(!empty($_POST["ubah"])) {
    $sql1= "insert into karyawan (NIP, nama, kode_jabatan, alamat) values (:NIP, :nama, :kode_jabatan, :alamat)";
    $stmt1 = $koneksi->prepare( $sql1 );
    $result = $stmt1->execute(array(':NIP'=>$_POST['NIP'],':nama'=>$_POST['nama'], ':kode_jabatan'=>$_POST['jabatan'],
    ':alamat'=>$_POST['alamat']));
    
	if (!empty($result)){
	  header('location:BerandaAdmin.php?sukses');
	}
	else{
        echo"Data sudah ada";
        header('location:signup.html');
	}
}
?>