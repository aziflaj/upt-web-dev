<?php

include_once('../functions/signup.php');

session_start();

// if he user is already logged in, redirect them on the index page
if (isset($_SESSION['id'])) {
  return header("location: index.php");
}

// sign the new user up and redirect him to index.
if (valid_signup($_POST)) {
  var_dump($_POST);
} else {
  echo "You missed something";
}

?>
