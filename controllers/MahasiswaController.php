<?php
require_once "models/MahasiswaModel.php";
require_once "function/function.php";

class MahasiswaController
{

  public function dashboard()
  {
    session_start();
    if (!isset($_SESSION['username'])) {
      header('Location: /login');
      exit();
    }else {
      $data = MahasiswaModel::read();
      loadView('dashboard', $data);
    }
  }

  public function formcreate()
  {
    loadView('createmahasiswa');
  }

  public function create()
  {
    if ($_FILES['sp']['error'] === UPLOAD_ERR_OK) {
      $gambar = $_FILES['sp']['name'];
      $gambar_tmp = $_FILES['sp']['tmp_name'];
      $upload_path = 'views/asset/img/';
      if (move_uploaded_file($gambar_tmp, $upload_path . $gambar)) {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $jk = $_POST['jk'];
        $prodi = $_POST['prodi'];
        $hp = $_POST['hp'];
        $ukm = $_POST['ukm'];
        $data = MahasiswaModel::create($nama, $nim, $jk, $prodi, $hp, $ukm, $gambar);
        header("Location:/dashboard");
      } else {
        echo 'Gagal mengunggah file.';
        exit();
      }
    } else {
      echo 'Terjadi kesalahan saat mengunggah file.';
      exit();
    }
  }

  public function detail($id)
  {
    $data = MahasiswaModel::detail($id);
    return $data;
  }

  public function formupdate($id)
  {
    $data = MahasiswaModel::detail($id);
    loadView('updatemahasiswa', $data);
  }

  public function update($id)
  {
    if ($_FILES['sp']['error'] === UPLOAD_ERR_OK) {
      $new_gambar = $_FILES['sp']['name'];
      $new_gambar_tmp = $_FILES['sp']['tmp_name'];
      $upload_path = 'views/asset/img/'; // Path folder img, sesuaikan dengan struktur folder Anda

      // Pindahkan file yang diunggah ke folder img
      if (move_uploaded_file($new_gambar_tmp, $upload_path . $new_gambar)) {
          // Tangani pembaruan data di database
          $new_nama = $_POST['nama'];
          $new_nim = $_POST['nim'];
          $new_jk = $_POST['jk'];
          $new_prodi = $_POST['prodi'];
          $new_hp = $_POST['hp'];
          $new_ukm = $_POST['ukm'];
          $data = MahasiswaModel::update_profil($id, $new_nama, $new_nim, $new_jk, $new_prodi, $new_hp, $new_ukm, $new_gambar);
          header("Location:/dashboard");
      } else {
          echo 'Gagal mengunggah file.';
          exit();
      }
  } else {
      // Tangani pembaruan data di database jika tidak ada file yang diunggah
      $new_nama = $_POST['nama'];
      $new_nim = $_POST['nim'];
      $new_jk = $_POST['jk'];
      $new_prodi = $_POST['prodi'];
      $new_hp = $_POST['hp'];
      $new_ukm = $_POST['ukm'];

      $data = MahasiswaModel::update($id, $id, $new_nama, $new_nim, $new_jk, $new_prodi, $new_hp, $new_ukm);
      header("Location:/dashboard");
  }
  }

  public function delete($id)
  {
    global $url;
    $data = MahasiswaModel::delete($id);
    header("Location:/dashboard");
  }
}
