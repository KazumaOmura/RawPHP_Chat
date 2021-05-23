<?php
session_start();
  // ログイン済みの場合は友達一覧へリダイレクト
if(isset($_SESSION['user']) != "") {
  header("Location: home.php");
}
// DBとの接続
include_once 'dbconnect.php';

if(isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  require "function/User/Login.php";
  login($email,$password);
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
        <div id="login_form">
          <h3>ログイン</h3>
          <div>
            <form method="post">
              <p>メールアドレス</p>
              <input type="email" placeholder="メールアドレス" name="email" required />
              <p>パスワード</p>
              <input type="password" placeholder="パスワード" id="password" name="password" min="5" required />
              <button type="submit" name="login" class="btn">ログイン</button>
            </form>
          </div>
        <div>
        <p><a href="register.php">新規登録</a></p>
      </main>
  </body>
</html>