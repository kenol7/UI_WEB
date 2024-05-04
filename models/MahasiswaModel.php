<?php

require_once 'config/database.php';

class MahasiswaModel{

  static function read(){
    global $conn;
    $query = "select * from mahasiswa";
    $result = mysqli_query($conn, $query);
    $data = array();
    if ($result->num_rows > 0) {
      while($a = $result->fetch_array()) {
        $data[]=$a;
      }
    }
    return $data;
  }

  static function create($nama, $nim, $jk, $prodi, $hp, $ukm, $gambar){
    global $conn;
    $query = "insert into mahasiswa (nama, nim, jk, prodi, hp, ukm, sp) values (?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssss", $nama, $nim, $jk, $prodi, $hp, $ukm, $gambar);
    $stmt->execute();
    $result = $stmt->affected_rows > 0 ? true : false;
    $stmt->close();
    return $result;
  }

  static function detail($id){
    global $conn;
    $query = "select * from mahasiswa WHERE ID=".$id;
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
      while($a = $result->fetch_array()) {
        $data[]=$a;
      }
    }
    else { 
      $data = [];
    }
    return $data;
  }

  static function update_profil($id, $nama, $nim, $jk, $prodi, $hp, $ukm, $gambar){
    global $conn;
    $stmt = $conn->prepare("update mahasiswa set nama=?, nim=?, jk=?, prodi=?, hp=?, ukm=?, sp=? WHERE id=".$id);
    $stmt->bind_param("sssssss", $nama, $nim, $jk, $prodi, $hp, $ukm, $gambar);
    $stmt->execute();
    $result = $stmt->affected_rows > 0 ? true : false;
    $stmt->close();
    return $result;
  }
  
  static function update($id, $nama, $nim, $jk, $prodi, $hp, $ukm){
    global $conn;
    $stmt = $conn->prepare("update mahasiswa set nama=?, nim=?, jk=?, prodi=?, hp=?, ukm=? WHERE id=".$id);
    $stmt->bind_param("ssssss", $nama, $nim, $jk, $prodi, $hp, $ukm);
    $stmt->execute();
    $result = $stmt->affected_rows > 0 ? true : false;
    $stmt->close();
    return $result;
  }

  static function delete($id){
    global $conn;
    $query = "delete from mahasiswa where id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->affected_rows > 0 ? true : false;
    $stmt->close();
    return $result;
  }
}