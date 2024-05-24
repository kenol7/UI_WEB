<?php
require_once "models/UserModel.php";
require_once "function/function.php";

class AutentikasiController
{
  public function __construct(){
    
  }
  public function register()
  {
    session_start();
    if (isset($_SESSION['username'])) {
      header('Location: /dashboard');
      exit();
    }
    loadView('auth/register');
  }
  public function landingpage()
  {
    session_start();
    if (isset($_SESSION['username'])) {
      header('Location: /dashboard');
      exit();
    }
    loadView('landingpage');
  }

  public function index()
  {
    session_start();
    if (isset($_SESSION['username'])) {
      header('Location: /dashboard');
      exit();
    }
    loadView('auth/login');
  }

  public function registerproses()
  {
    session_start();
    if (isset($_SESSION['username'])) {
      header('Location: /dashboard');
      exit();
    }
    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = UserModel::register($nama,$username, $password);
    if ($result) {
      session_start();
      $_SESSION['nama'] = $nama;
      $_SESSION['username'] = $username;
      $_SESSION['password'] = $password;
      header("Location:/dashboard");
    } else {
      echo "<center><h1>Nama pengguna atau kata sandi salah.</h1>
      <button><strong><a href='/'>KEMBALI</a></strong></button></center>";
    }
  }

  public function login()
  {
    session_start();
    if (isset($_SESSION['username'])) {
      header('Location: /dashboard');
      exit();
    }
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
  public function logout()
  {
    global $url;
    session_start();
    if (!isset($_SESSION['username'])) {
      header('Location: /login');
      exit();
    }
    session_unset();
    session_destroy();
    header('Location:/login');
  }
}

