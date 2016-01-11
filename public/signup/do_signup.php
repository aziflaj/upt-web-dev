<?php

include_once('functions.php');
$db = require_once(__DIR__ . '/../config/db.php');

session_start();

// if he user is already logged in, redirect them on the index page
if (isset($_SESSION['id'])) {
  return header("location: /");
}

// sign the new user up and redirect him to index.
if (all_params($_POST)) {
  // print_r($_POST);

  $connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);

  if (!$connection) {
    die('Can\'t connect to the database: ' . mysqli_connect_errno());
  }

  $result = store_new_student($connection, $_POST);
  mysqli_close($connection);
  if ($result == -1) {
    return header("location: signup.php");
  } else {
    $_SESSION['id'] = $result['user_id'];
    $_SESSION['type_id'] = 2; // student
    $_SESSION['local_id'] = $result['student_id'];
    $_SESSION['user_handle'] = $result['student_handle'];

    return header("location: /");
  }
} else {
  return header("location: signup.php");
}

?>
