<?php

$db_host = "localhost";
$db_username = "root";
$db_password = "root";
$db_dbname = "chat";

require_once('./core/config.php');

$mysqli = new mysqli($db_host, $db_username, $db_password, $db_dbname);
if ($mysqli->connect_error) {
  error_log($mysqli->connect_error);
  exit;
}

?>