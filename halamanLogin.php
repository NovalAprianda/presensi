<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="mycss.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <title>Login Admin</title>
</head>
<body>
    <div class="utama">
        <header>
            <h1>Selamat Datang!</h1>
            <hr>
            <h3>Silahkan login admin</h3>
        </header>
        <div class="edit">
            <center>
                <form method="POST" action="Ceklogin.php">
                    <br>
                    <h5>Nama Admin: </h5><input class="form-control" type="text" name="nama_adm" placeholder="Nama Admin"
                        required><br>
                    <h5>Password: </h5><input class="form-control" type="text" name="pass_adm" placeholder="Password"
                        required><br>
                    <input class="btn btn-warning" type="submit" value="Login" name="login">
                    <a href="index.php"><input class="btn btn-dark" type="button" value="Batal"></a>
                </form>
            </center>
        </div>
    </div>
</body>

</html>