<?php 
try { 
$koneksi = new PDO('mysql:host=localhost;dbname=ccpresensi', 'root', '',
array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,PDO::ATTR_PERSISTENT => true)); 
} 
catch(PDOException $e) { 
print"Koneksi atau query bermasalah: ".$e->getMessage()."<br/>"; 
die();
} 
?>