<?php
session_start();
  // 未ログインの場合は友達一覧へリダイレクト
if(isset($_SESSION['user']) == "") {
  header("Location: index.php");
}
// DBとの接続
include_once './core/config.php';

// ログインユーザの情報
$query = "SELECT * FROM user WHERE id=".$_SESSION['user']."";
$result = $mysqli->query($query);

if (!$result) {
    print('クエリーが失敗しました。' . $mysqli->error);
    $mysqli->close();
    exit();
}
while ($row = $result->fetch_assoc()) {
    $user_id = $row['id'];
    $user_username = $row['username'];
    $user_email = $row['email'];
}

if(isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  require "function/User/Login.php";
  echo login($email,$password);
}


?>

<!DOCTYPE HTML>
<html lang="ja">
  <meta charset="utf-8" />

  <head>
      <title>ログイン</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <link rel="stylesheet" href="css/style.css">
      <script type="text/javascript" src="js/main.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
    <main>
        <p><?php echo $user_email; ?></p>
        <p><?php echo $user_username; ?></p>
        <p><a href="logout.php?logout">ログアウト</a></p>
      </main>
  </body>
</html>