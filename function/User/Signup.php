<?php
function signup($username,$email,$password){
    session_start();
    include_once 'config.php';

    // 同じemailを弾く
    $query = "SELECT * FROM user";
    $result = $mysqli->query($query);

    if (!$result) {
      print('クエリーが失敗しました。' . $mysqli->error);
      $mysqli->close();
      exit();
    }
    $switch = 0;
    while ($row = $result->fetch_assoc()) {
      $already_email = $row['email'];
      if($already_email == $email){
        $switch = 1;
      }
    }
    if($switch == 1){
      return "同じメールアドレスが存在します。";
    }
    else{
      $password = password_hash($password, PASSWORD_DEFAULT);
      $query = "INSERT INTO user(username,email,password) VALUES('$username','$email','$password')";
          
      $result = $mysqli->query($query);
        if (!$result) {
          print('クエリーが失敗しました。' . $mysqli->error);
          $mysqli->close();
          return "失敗しました。";
        }
        else{
            return "成功しました。<a href=\"login.php\">こちら</a>からログインしてください。";
        }
    }
  }
?>