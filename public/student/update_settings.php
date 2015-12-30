<?php
session_start();

$db = require_once(__DIR__ . '/../config/db.php');
$connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);

$update_sql = "update students ";
$update_sql .= "set first_name = '{$_POST['first_name']}', ";
$update_sql .= "last_name = '{$_POST['last_name']}', ";
$update_sql .= "degree = '{$_POST['education']}' ";

if(isset($_FILES['curriculum'])) {
  $file_name = $_FILES['curriculum']['name'];
  $file_arr = explode('.', $file_name);
  $file_ext = strtolower($file_arr[count($file_arr) - 1]);

  $new_filename = "{$_SESSION['user_handle']} {$_SESSION['id']} {$_FILES['curriculum']['tmp_name']} " . time();
  $new_filename = md5($new_filename) . '.' . $file_ext;
  move_uploaded_file($_FILES['curriculum']['tmp_name'], __DIR__ . "/../uploads/" . $new_filename);

  $update_sql .= ", cv_url = '/uploads/$new_filename'";
}

$update_sql .= "where id = {$_SESSION['local_id']}";

if (mysqli_query($connection, $update_sql)) {
  return header("location: /settings.php");
} else {
  include_once("../includes/header.php");

  echo "<h1>Some error occurred</h1>";
  echo mysqli_error($connection);

  include_once("../includes/footer.php");
}
?>
