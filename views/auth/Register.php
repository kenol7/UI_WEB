<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi UKM FASILKOM</title>
    <link rel="stylesheet" href="/views/asset/css/style.css">
    <link rel="stylesheet" href="views/asset/css/register.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<?php include 'views/components/navigation.php' ?>>
    </div>
    <div class="register-container">
        <h1>Registrasi</h1>
        <form action="register" method="POST">
            <div class="input-box">
                <input id="nama" type="text" name="nama" placeholder="Nama" required>
                <i class='bx bxs-universal-access'></i>
            </div>
            <div class="input-box">
                <input id="username" type="text" name="username" placeholder="Username" required>
                <i class='bx bx-user'></i>
            </div>
            <div class="input-box">
                <input id="password" type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>
</body>
</html>
