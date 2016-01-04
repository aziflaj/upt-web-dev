<?php
session_start();

if (!isset($_SESSION['id'])) {
  return header("location: /");
}

$db = require_once(__DIR__ . '/config/db.php');
$connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);

$position_id = $_GET['position_id'];
$action = $_GET['action'];

// get the company id
$company_sql = "select company_id from job_entries where id = $position_id";
$company_id = mysqli_fetch_array(mysqli_query($connection, $company_sql), MYSQLI_NUM)[0];

switch ($action) {
  case 'add':
    $insert_sql = "insert into students_interested (position_id, student_id, company_id) ";
    $insert_sql .= "values ($position_id, {$_SESSION['local_id']}, $company_id)";
    mysqli_query($connection, $insert_sql);
    break;

  case 'remove':
    $delete_sql = "delete from students_interested ";
    $delete_sql .= "where position_id = $position_id and student_id = {$_SESSION['local_id']}";
    mysqli_query($connection, $delete_sql);
    break;
}
return header("location: /");
?>
