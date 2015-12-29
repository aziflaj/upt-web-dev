<?php
$db = require_once(__DIR__ . '/../../config/db.php');
$company_id = $_SESSION['local_id'];
$user_id = $_SESSION['id'];

$connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);

$join_sql = "select first_name, last_name, cv_url, email, title ";
$join_sql .= "from students ";
$join_sql .= "inner join students_interested as si ";
$join_sql .= "on si.student_id = students.id ";
$join_sql .= "and si.company_id = $company_id ";
$join_sql .= "inner join users on users.id = students.user_id ";
$join_sql .= "inner join job_entries as je on je.company_id = si.company_id";

$result = mysqli_query($connection, $join_sql);

while ($row = mysqli_fetch_assoc($result)) {
  echo "{$row['first_name']} {$row['last_name']} ({$row['email']}) eshte i interesuar ne \"{$row['title']}\"<br>";
}

mysqli_close($connection);
?>
