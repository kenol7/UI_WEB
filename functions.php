<?php

include 'koneksi.php';

// Tambah data,hapus dan edit tanpa validasi dan sanitasi
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
    $query = "SELECT sp FROM mahasiswa WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $sp = $data['sp'];

    // Menghapus data dari tabel
    $query = "DELETE FROM mahasiswa WHERE id = $id";
    $eksekusi = mysqli_query($conn, $query);

    if ($eksekusi) {
        if ($sp !== "null") {
            unlink('uploads/' . $sp);
        }

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

    $sp_tmp = $_FILES['sp'];


    // Menentukan nama file img yang baru
    $sp = uniqid() . '.' . pathinfo($sp_tmp['name'], PATHINFO_EXTENSION);

    // Memindahkan $sp_tmp img yang diunggah ke direktori yang ditentukan
    if ($sp_tmp['error'] == 4) {
        $sp = "null";
    } else {
        if (!move_uploaded_file($sp_tmp['tmp_name'], 'uploads/' . $sp)) {
            echo "<script>
            alert('Foto tidak bisa di masukkan.');
        </script>";
            return 0;
        }
    }

    if (!preg_match('/^[a-zA-Z\s]+$/', $prodi)) {
        echo '<script>alert("Prodi harus berupa teks alfabet dengan atau tanpa spasi."); window.location.href = "form.php";</script>';
        return;
    }
    
    if (!preg_match('/^[a-zA-Z\s]+$/', $nama)) {
        echo '<script>alert("Nama harus berupa teks alfabet dengan atau tanpa spasi."); window.location.href = "form.php";</script>';
        return;
    }
    

    // Validasi panjang NIM
    if (strlen($nim) != 10) {
        echo '<script>alert("NIM harus terdiri dari 10 digit.");window.location.href = "form.php";</script>';
        return;
    }

    // Validasi panjang nama
    if (strlen($nama) > 25) {
        echo '<script>alert("Nama terlalu panjang. Maksimal 15 karakter.");window.location.href = "form.php";</script>';
        return;
    }

    $query = "INSERT INTO mahasiswa (nama, nim, prodi, jk, hp, ukm, sp) VALUES ('$nama', '$nim', '$prodi', '$jk','$hp','$ukm', '$sp');";
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

    $sp_tmp = $_POST['sp'];


    if ($_FILES['sp']['error'] === 4) {
        $sp = $sp_tmp;
    } else {
        $sp = uniqid() . '.' . pathinfo($_FILES['sp']['name'], PATHINFO_EXTENSION);
        if (!move_uploaded_file($_FILES['sp']['tmp_name'], 'uploads/' . $sp)) {
            echo "<script>
                alert('MEDICAL FILE COULD NOT BE UPLOADED!');
            </script>";
            return 0;
        }
        if ($sp_tmp !== 'null') {
            unlink('uploads/' . $sp_tmp);
        }
    }

    $query = "UPDATE mahasiswa SET nama = '$nama', jk = '$jk', nim = '$nim', prodi = '$prodi', hp = '$hp', ukm = '$ukm', sp = '$sp' WHERE id = '$id'";
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


    if (!is_numeric($nim)) {
        echo '<script>alert("NIM harus berupa angka.");window.location.href = "form.php";</script>';
        return;
    }

    // Validasi panjang NIM
    if (strlen($nim) != 10) {
        echo '<script>alert("NIM harus terdiri dari 10 digit.");window.location.href = "form.php";</script>';
        return;
    }

    // Validasi panjang nama
    if (strlen($nama) > 15) {
        echo '<script>alert("Nama terlalu panjang. Maksimal 15 karakter.");window.location.href = "form.php";</script>';
        return;
    }
}