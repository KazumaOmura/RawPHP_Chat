<?php
session_start();
  // ログイン済みの場合は友達一覧へリダイレクト
if(isset($_SESSION['user']) != "") {
  header("Location: home.php");
}
// DBとの接続
include_once 'dbconnect.php';

if(isset($_POST['signup'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  require "function/User/Signup.php";
  echo signup($username,$email,$password);
}


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
        <div id="login_form">
          <h3>新規会員登録</h3>
          <div>
            <form method="post">
              <p>ユーザーネーム</p>
              <input type="text" placeholder="ユーザーネーム" name="username" required />
              <p>メールアドレス</p>
              <input type="email" placeholder="メールアドレス" name="email" required />
              <p>パスワード</p>
              <input type="password" placeholder="パスワード" id="password" name="password" min="5" required />
              <button type="submit" name="signup" class="btn">登録</button>
            </form>
          </div>
        <div>
      </main>
  </body>
</html>