<?php

include_once('functions.php');
$db = require('../config/db.php');

session_start();

// if he user is already logged in, redirect them on the index page
if (isset($_SESSION['id'])) {
  return header("location: index.php");
}

// sign the new user up and redirect him to index.
if (all_params($_POST)) {
  // print_r($_POST);

  $connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);

  if (!$connection) {
    die('Can\'t connect to the database: ' . mysqli_connect_errno());
  }

  $result = store_new_student($connection, $_POST);
  if ($result == -1) {
    echo "Can't create student";
  } else {
    echo "Created student with id " . $result['student_id'];
  }

  // log in the student
  // $_SESSION['id'] = $result['user_id'];

  // return header("location: somewhere.php");
  mysqli_close($connection);
} else {
  return header("location: signup.php");
}

?>
