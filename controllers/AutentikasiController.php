<?php
require_once "models/UserModel.php";
require_once "function/function.php";

class AutentikasiController
{
  public function landingpage()
  {
    loadView('landingpage');
  }

  public function index()
  {
    loadView('auth/login');
  }

  public function login()
  {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = UserModel::check_if_exist($username, $password);
    if ($result) {
      session_start();
      $_SESSION['username'] = $username;
      $_SESSION['password'] = $password;
      header("Location:/dashboard");
    } else {
      echo "<center><h1>Nama pengguna atau kata sandi salah.</h1>
      <button><strong><a href='/'>KEMBALI</a></strong></button></center>";
    }
  }
}