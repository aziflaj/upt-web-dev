<?php
$db = require_once(__DIR__ . '/../../config/db.php');
$connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);

$interests_sql = "select title, je.description, company_name, user_id, created_at ";
$interests_sql .= "from job_entries as je ";
$interests_sql .= "join students_interested as si ";
$interests_sql .= "on si.student_id = {$_SESSION['local_id']} and si.position_id = je.id ";
$interests_sql .= "join companies as c on c.id = je.company_id ";
$interests_sql .= "order by created_at DESC";

$result = mysqli_query($connection, $interests_sql);
mysqli_close($connection);
?>

<div class="content student--interests">
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <div class="student__post">
      <div class="student__post--author">
        <a href="/user.php?id=<?= $row['user_id'] ?>">
          <?= $row['company_name'] ?>
        </a>
      </div>

      <div class="student__post--title">
        <?= $row['title'] ?>
      </div>

      <div class="student__post--time">
        <?= $row['created_at'] ?>
      </div>

      <div class="student__post--description">
        <?= $row['description'] ?>
      </div>
    </div>
  <?php endwhile; ?>
</div>
