<?php

require_once '../functions.php';


$query = "SELECT * FROM mahasiswa";
$result = mysqli_query($conn, $query);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKM WEBSITE UNEJ</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

</head>

<body>
    <nav>
        <div>
            <h1>UKM FASILKOM</h1>
            <a href="./dashboard.php" class="navigasi">
                <ion-icon name="grid-outline"></ion-icon>
            Dashboard</a>
            <a href="../form.php" class="navigasi">
                <ion-icon name="clipboard-outline"></ion-icon>
            Form</a>
            <a href="../login.html" class="navigasi">
                <ion-icon name="log-out-outline"></ion-icon>
            Log Out</a>
        </div>
    </nav>
    <main>
        <h1> DATA MAHASISWA YANG MENGIKUTI UKM FASILKOM</h1>
        <table>
            <tr>
                <th>no</th>
                <th>nama</th>
                <th>NIM</th>
                <th>Prodi</th>
                <th>Jenis Kelamin</th>
                <th>No Hp</th>
                <th>Ukm</th>
                <th>Action</th>
            </tr>
            <?php
            if (mysqli_num_rows($result) > 0) {
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['nim'] ?></td>
                <td><?= $row['prodi'] ?></td>
                <td><?= $row['jk'] ?></td>
                <td><?= $row['hp'] ?></td>
                <td><?= $row['ukm'] ?></td>
                <td>
                    <a type="button" class="button" href="edit.php?id=<?= $row['id'] ?>">EDIT</a> |
                    <a type="button" class="button" href="../functions.php?id=<?= $row['id'] ?>&proses=remove" onclick="return confirm('Apakah kamu yakin menghapus data NIM : <?= $row['nim'] ?> ?');">REMOVE</a>
                </td>
            </tr>
            <?php
                }
            }else {
                ?>
                <tr>
                    <td colspan="8">Tidak ada</td>
                </tr>
                <?php
            }
            ?>
        </table>

    </main>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

<script>
    
</script>

</html>