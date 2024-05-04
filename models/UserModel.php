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
      return 1;
    } else {
      return 0;
    }
  }
}
