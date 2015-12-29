<?php
include_once('functions.php');
$db = require_once(__DIR__ . '/../config/db.php');
session_start();

if (!all_params($_POST)) {
  return header("location: login.php");
}

$connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);

$email = $_POST['email'];
$find_user_sql = "select id, password, type_id from users where email = '$email'";

$result = mysqli_query($connection, $find_user_sql);

if (mysqli_num_rows($result) > 0) {
  // since email is unique, we don't need to loop. There is only 1 result set
  $row = mysqli_fetch_assoc($result);
  if (password_verify($_POST['password'], $row['password'])) {

    switch ($row['type_id']) {
      case 1: // admin
        $find_admin_sql = "select id, username from admins where user_id = " . $row['id'];

        $admins = mysqli_query($connection, $find_admin_sql);
        $admin_row = mysqli_fetch_assoc($admins);

        $_SESSION['local_id'] = $admin_row['id'];
        $_SESSION['user_handle'] = $admin_row['username'];
        break;

      case 2: //student
        $find_student_sql = "select id, first_name, last_name from students where user_id = " . $row['id'];

        $students = mysqli_query($connection, $find_student_sql);
        $student_row = mysqli_fetch_assoc($students); // only one result set

        $_SESSION['local_id'] = $student_row['id'];
        $_SESSION['user_handle'] = $student_row['first_name'] . ' ' . $student_row['last_name'];
        break;

      case 3: // company
        $find_company_sql = "select id, company_name from companies where user_id = " . $row['id'];

        $companies = mysqli_query($connection, $find_company_sql);
        $company = mysqli_fetch_assoc($companies);

        $_SESSION['local_id'] = $company['id'];
        $_SESSION['user_handle'] = $company['company_name'];
        break;
    }

    $_SESSION['id'] = $row['id']; // logging in the user
    $_SESSION['type_id'] = $row['type_id']; // logging in the user
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
