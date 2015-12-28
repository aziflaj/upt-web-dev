<?php
include_once('functions.php');
$db = require('../config/db.php');

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
    // return header("location: index.php"); 
  } else {
    echo "not found";
  }
} else {
  echo "no users";
}

mysqli_close($connection);
?>
