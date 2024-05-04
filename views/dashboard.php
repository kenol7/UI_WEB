<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UKM WEBSITE UNEJ</title>
  <link rel="stylesheet" href="/views/asset/css/style.css">
  <link rel="stylesheet" href="/views/asset/css/dashboard.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>

<body>
  <nav>
    <?php include 'views/components/navigation.php' ?>
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
        <th>Foto</th>
        <th>Action</th>
      </tr>
      <?php

      if ($data) {
        for ($i = 0; $i < count($data); $i++) {
          $nomor = $i;
      ?>
          <tr>
            <td><?= $nomor+1 ?></td>
            <td><?= $data[$i]['nama'] ?></td>
            <td><?= $data[$i]['nim'] ?></td>
            <td><?= $data[$i]['prodi'] ?></td>
            <td><?= $data[$i]['jk'] ?></td>
            <td><?= $data[$i]['hp'] ?></td>
            <td><?= $data[$i]['ukm'] ?></td>
            <td>
              <img src="views/asset/img/<?= $data[$i]['sp'] ?>" alt="" width="100px">
            </td>
            <td class="actionn">
              <a type="button" class="button" href="/mahasiswaupdate/<?= $data[$i]['id'] ?>">EDIT</a> |
              <a type="button" class="button" href="/deletemahasiswa/<?= $data[$i]['id'] ?>" onclick="return confirm('Apakah kamu yakin menghapus data NIM : <?= $data[$i]['nim'] ?> ?');">REMOVE</a>
            </td>
          </tr>
        <?php
        }
      } else {
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