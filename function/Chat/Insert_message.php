<?php
function insert_message($send_user_id,$message,$send_time){
    session_start();
    include_once 'config.php';

    // テーブルチェック
    $query = "INSERT INTO bulletin_board(send_user_id,message,send_time) VALUES('$send_user_id','$message','$send_time')";
    $result = $mysqli->query($query);

    if (!$result) {
      print('クエリーが失敗しました。' . $mysqli->error);
      $mysqli->close();
      exit();
    }
    else{
        return "投稿が完了しました";
    }
  }
?>