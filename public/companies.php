<?php
include_once('includes/header.php');

if ($_SESSION['type_id'] == 1) {
  include_once(__DIR__ . '/views/admin/companylist.php');
}

include_once('includes/footer.php');
?>
