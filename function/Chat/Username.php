<?php
function username($send_user_id){
  session_start();
  include_once 'config.php';

    $query_username = "SELECT * FROM user WHERE id='$send_user_id'";
    $aaa = var_dump($mysqli);
    return $aaa;
    exit;

    $result_username = $mysqli->query($query_username);

    if (!$result_username) {
      print('クエリーが失敗しました。' . $mysqli->error);
      $mysqli->close();
      exit();
    }
    while ($row_username = $result_username->fetch_assoc()) {
      $user_name = $row_username['username'];
    }
    return $user_name;
}
?>