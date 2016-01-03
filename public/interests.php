<?php
include_once('includes/header.php');

switch ($_SESSION['type_id']) {
  case 2:
    include_once(__DIR__ . '/views/student/interests.php');
    break;

  case 3:
    include_once(__DIR__ . '/views/company/interests.php');
}

include_once('includes/footer.php');
?>
