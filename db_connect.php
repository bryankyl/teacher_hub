<?php

$db_server = "localhost";
$db_user = "root";
$db_passwd = "QosGN5!!";
$db_database = "learn";

$db_connect = @new mysqli($db_server, $db_user, $db_passwd, $db_database);

$db_connect->set_charset("utf8");

if ($db_connect->connect_error) {
  die("Connect Error:". $db_connect->connect_error);
} else {
  echo "Database Connected.";
}




?>
