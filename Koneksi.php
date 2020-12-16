<?php

//Koneksi Di PC 
// $host = 'localhost';
// $db = 'ccpresensi';
// $user =  'root';
// $pass = '';
// $charset = 'utf8mb4';
// $dsn = "mysql:host=$host;dbname=$db;charset=$charset"; 

//Koneksi di Cloud
$host = 'remotemysql.com';
$db = 'uk13PWwp0W';
$user =  'uk13PWwp0W';
$pass = 'y9Xnu1JRtp';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset"; 
try { 
$koneksi = new PDO($dsn, $user, $pass,
array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,PDO::ATTR_PERSISTENT => true)); 
} 
catch(PDOException $e) { 
print"Koneksi atau query bermasalah: ".$e->getMessage()."<br/>"; 
die();
} 
?>