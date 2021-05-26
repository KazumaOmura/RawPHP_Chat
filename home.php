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

if(isset($_POST['post_message'])) {
  $send_user_id = $_POST['send_user_id'];
  $send_time= $_POST['send_time'];
  $message = $_POST['message'];

  require "function/Chat/Insert_message.php";
  echo insert_message($send_user_id,$message,$send_time);
}


?>

<!DOCTYPE HTML>
<html lang="ja">
  <meta charset="utf-8" />

  <head>
      <title>ホーム</title>
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

        <table>
            <tr>
                <th>ID</th>
                <th>投稿者名</th>
                <th>メッセージ</th>
                <th>時間</th>
            </tr>
            <?php
            $query = "SELECT * FROM bulletin_board";
            $result = $mysqli->query($query);
            
            if (!$result) {
                print('クエリーが失敗しました。' . $mysqli->error);
                $mysqli->close();
                exit();
            }
            require "function/Chat/Username.php";
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $message = $row['message'];
                $send_user_id = $row['send_user_id'];
                $send_time = $row['send_time'];
                ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td>
                        <?php 
                        echo username($send_user_id);
                        ?>
                    </td>
                    <td><?php echo $message; ?></td>
                    <td><?php echo $send_time; ?></td>
                </tr>
                <?php
            }
            ?>

            <!-- メッセージ投稿 -->
            <form method="post">
                <input type="hidden" name="send_user_id" value="<?php echo $_SESSION['user'] ;?>">
                <?php
                date_default_timezone_set('Asia/Tokyo');
                $date = date("Y/m/d H:i:s");
                ?>
                <input type="hidden" name="send_time" value="<?php echo $date ;?>">
                <textarea name="message"></textarea>
                <button type="submit" name="post_message">送信</button>
            </form>
        </table>
      </main>
  </body>
</html>