<?php
session_start();

$title = $_POST['title'];
$descr = $_POST['description'];
$admin_id = $_SESSION['local_id'];

$db = require_once(__DIR__ . '/../config/db.php');
$connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);

$insert_post_sql = "insert into admin_notifications (title, description, admin_id) ";
$insert_post_sql .= "values ('$title', '$descr', $admin_id)";

if (mysqli_query($connection, $insert_post_sql)) {
  return header("location: /");
} else {
  include_once("../includes/header.php");

  echo "<h1>Some error occurred</h1>";
  echo mysqli_error($connection);

  include_once("../includes/footer.php");
}
?>
