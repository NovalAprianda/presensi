<?php
//script koneksi ke host server komputer
require_once("Koneksi.php");
 
//mengambil variabel dari login.html
$user=$_POST['nama_adm']; //variabel username
$pass=$_POST['pass_adm']; //vaiabel password yang di enkripkan ke md5
 

    $stmt = $koneksi->prepare("SELECT * FROM admin");
    $stmt->execute();
    $result = $stmt->fetchAll();

  if(($result[0]['nama_adm']==$user) && ($result[0]['pass_adm']==$pass))
  { //membuat variabel untuk menambahkan variabel ke dalam cookie browser
//   
   setcookie("nama_adm", $result[0]['nama_adm'], time() + (86400 * 30));
   header("location:BerandaAdmin.php"); //lokasi file jika cookie telah berhasil didaftarkan ke dalam browser
  }
  else
  {
    echo"<script>alert('Login tidak berhasil, username dan password tidak valid');document.location='halamanLogin.php'</script>";
    //komentar jika variabel yg loop tidak sama
  }
?>