<?php
session_start();

if (!isset($_SESSION['id'])) {
  return header("location: /");
}

$db = require_once(__DIR__ . '/../config/db.php');
$connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);

$entry_id = $_GET['id'];
$delete_sql = "delete from job_entries ";
$delete_sql .= "where id = $entry_id";

mysqli_query($connection, $delete_sql);
mysqli_close($connection);
return header("location: /interests.php");
?>
