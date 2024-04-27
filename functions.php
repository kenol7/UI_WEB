<?php

include 'koneksi.php';


if (isset($_GET['proses']) and $_GET['proses'] == 'remove') {
    hapus();
} else if (isset($_POST['proses']) and $_POST['proses'] == 'submit') {
    tambah();
} else if (isset($_POST['proses']) and $_POST['proses'] == 'update') {
    edit();
}

function hapus()
{
    global $conn;
    $id = $_GET['id'];

    // Menghapus data dari tabel
    $query = "DELETE FROM mahasiswa WHERE id = '$id'";
    $eksekusi = mysqli_query($conn, $query);

    if ($eksekusi) {
        echo '<script> 
            alert("Berhasil Terhapus"); 
            window.location.href = "dashboard/dashboard.php";
        </script>';
    } else {
        echo '<script> 
            alert("Gagal Terhapus"); 
            window.location.href = "dashboard/dashboard.php";
        </script>';
    }
}

function tambah()
{
    global $conn;
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $hp = $_POST['hp'];
    $ukm = $_POST['ukm'];

    $query = "INSERT INTO mahasiswa (nama, nim, prodi, jk, hp, ukm) VALUES ('$nama', '$nim', '$prodi', '$jk','$hp','$ukm');";
    $eksekusi = mysqli_query($conn, $query);

    if ($eksekusi) {
        echo
        '<script> 
            alert("Proses Input Berhasil"); 
            window.location.href = "dashboard/dashboard.php";
        </script>';
    } else {
        echo
        '<script> 
            alert("Proses Input Gagal"); 
        </script>';
    }
}

function edit()
{
    global $conn;
    $id = $_POST['id']; // tambahkan baris ini untuk mendapatkan id yang akan diupdate
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $hp = $_POST['hp'];
    $ukm = $_POST['ukm'];

    $query = "UPDATE mahasiswa SET nama = '$nama', jk = '$jk', nim = '$nim', prodi = '$prodi', hp = '$hp', ukm = '$ukm' WHERE id = '$id'";
    $eksekusi = mysqli_query($conn, $query);

    if ($eksekusi) {
        echo
        '<script> 
            alert("Edit Berhasil"); 
            window.location.href = "dashboard/dashboard.php";
        </script>';
    } else {
        echo
        '<script> 
            alert("Edit Gagal"); 
        </script>';
    }
}