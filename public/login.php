<?php
session_start();

// if he user is already logged in, redirect them on the index page
if (isset($_SESSION['id'])) {
  return header("location: index.php");
}
?>

<?php include('includes/header.php') ?>

LOGIN

<?php include('includes/footer.php') ?>
