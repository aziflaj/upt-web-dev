<?php
include_once('functions.php');
$db = require_once(__DIR__ . '/../config/db.php');
session_start();

if (!all_params($_POST)) {
  return header("location: login.php");
}

$connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);

$email = $_POST['email'];;
$find_user_sql = "select id, password, type_id from users where email = '$email'";

$result = mysqli_query($connection, $find_user_sql);

if (mysqli_num_rows($result) > 0) {
  // since email is unique, we don't need to loop. There is only 1 result set
  $row = mysqli_fetch_assoc($result);
  if (password_verify($_POST['password'], $row['password'])) {
    $find_customer_sql = "select * from students where user_id = " . $row['id'];

    $students = mysqli_query($connection, $find_customer_sql);
    $student_row = mysqli_fetch_assoc($students); // only one result set

    $_SESSION['id'] = $row['id']; // logging in the student
    $_SESSION['type_id'] = $row['type_id'];
    $_SESSION['local_id'] = $student_row['id'];

    mysqli_close($connection);
    return header("location: /");
  } else {
    echo "not found";
  }
} else {
  echo "no users";
}

mysqli_close($connection);
?>
