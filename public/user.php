<?php

include_once('includes/header.php');

$db = require_once(__DIR__ . '/config/db.php');
$connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);

$sql = "select type_id from users where id = {$_GET['id']}";
$result = mysqli_query($connection, $sql);
if ($result) {
  $user = mysqli_fetch_assoc($result); // there should be only 1
} else {
  mysqli_close($connection);
  include_once(__DIR__ . "/errors/404.php");
  include_once('includes/footer.php');
  return;
}

if ($user) {
  $id = $_GET['id'];
  switch ($user['type_id']) {
    case 1:
      include(__DIR__ . "/views/admin/me.php");
      break;

    case 2:
      include(__DIR__ . "/views/student/me.php");
      break;

    case 3:
      include(__DIR__ . "/views/admin/me.php");
      break;

    default:
      include_once(__DIR__ . "/errors/404.php");
      break;
  }
} else {
  include_once(__DIR__ . "/errors/404.php");
}

include_once('includes/footer.php');
?>
