<?php
session_start();

if (!isset($_SESSION['id'])) {
  return header("location: /");
}

$db = require_once(__DIR__ . '/../config/db.php');
$connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);

$title = $_POST['job_title'];
$description = $_POST['job_description'];
$company_id = $_SESSION['local_id'];

$add_sql = "insert into job_entries (title, description, company_id) ";
$add_sql .= "values ('$title', '$description', $company_id)";

return header("location: /");
?>
