<?php
include_once('includes/header.php');

if (isset($_SESSION['id'])) {

  switch($_SESSION['type_id']) {

    case 1:
      include_once('views/admin/dashboard.php');
      break;

    case 2:
      include_once('views/student/home.php');
      break;

    case 3:
      include_once('views/company/dashboard.php');
      break;
  }

} else {
  include_once('views/homepage.php');
}

include_once('includes/footer.php');
?>
