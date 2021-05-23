<?php
function login($email,$password){
    session_start();
    include_once 'config.php';

    $query = "SELECT * FROM user WHERE email='$email'";
    $result = $mysqli->query($query);

    if (!$result) {
      print('クエリーが失敗しました。' . $mysqli->error);
      $mysqli->close();
      exit();
    }
    while ($row = $result->fetch_assoc()) {
        $user_id = $row['id'];
        $db_hashed_pwd = $row['password'];
    }
    if (password_verify($password, $db_hashed_pwd)) {
        $_SESSION['user'] = $user_id;
        header("Location: home.php");
    }
    else{
        return "メールアドレスまたはパスワードが間違っています。";
    }
}
?>