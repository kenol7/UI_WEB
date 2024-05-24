<?php

require_once 'config/database.php';

class UserModel
{
  static function check_if_exist($username, $password)
  {
    global $conn;
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
      return true;
    } else {
      return false;
    }
  }
  static function register($nama, $username, $password)
  {
    global $conn;
    $query = "insert into user (nama,username, password) values (?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", htmlspecialchars($nama),htmlspecialchars($username), htmlspecialchars($password));
    $stmt->execute();
    $result = $stmt->affected_rows > 0 ? true : false;
    $stmt->close();
    return $result;
  }
}

