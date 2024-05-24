<?php
require 'koneksi.php';

$nama_lengkap = $_POST["nama_lengkap"];
$no_telepon = $_POST["no_telepon"];
$username = $_POST["username"];
$password = $_POST["password"];

$query_sql = "INSERT INTO tbl_user (nama_lengkap, no_telepon, username, password) VALUES ('$nama_lengkap', '$no_telepon', '$username', '$password')";

$hasil = mysqli_query($conn, $query_sql);

if ($hasil) {
    header("Location: index.html");
} else {
    echo "Pendaftaran Gagal: " . mysqli_error($conn);
}
