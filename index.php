<?php
session_start();
  // ログイン済みの場合は友達一覧へリダイレクト
if(isset($_SESSION['user']) != "") {
  header("Location: home.php");
}
// DBとの接続
include_once 'dbconnect.php';
?>

<!DOCTYPE HTML>
<html lang="ja">
  <meta charset="utf-8" />

  <head>
      <title>新規会員登録</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <link rel="stylesheet" href="css/style.css">
      <script type="text/javascript" src="js/main.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
    <main>
      <p><a href="register.php">新規登録</a></p>
      <p><a href="login.php">ログイン</a></p>
    </main>
  </body>
</html>