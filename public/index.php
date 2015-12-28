<?php
session_start();

include_once('includes/header.php');

if (isset($_SESSION['id'])) {
  include_once('views/student/dashboard.php');
} else {
  include_once('views/homepage.php');
}

include_once('includes/footer.php');
?>
