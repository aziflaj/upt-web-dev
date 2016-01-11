<?php
$db = require_once(__DIR__ . '/../../config/db.php');
$connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);
$company_id = $_SESSION['local_id'];

$jobs_sql = "select id, title, description ";
$jobs_sql .= "from job_entries ";
$jobs_sql .= "where company_id = $company_id ";
$jobs_sql .= "order by created_at desc";

$result = mysqli_query($connection, $jobs_sql);
mysqli_close($connection);
?>

<div class="content jobs-list">
  <?php if(!mysqli_num_rows($result)): ?>
    <div class="jobs-list__empty">
      Ju nuk keni asnje publikim pune. Shtoni nje publikim te ri <a href="/">ketu</a>.
    </div>
  <?php else: ?>
    <h2>Lista e publikimeve nga <?= $_SESSION['user_handle'] ?></h2>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
      <div class="job">
        <div class="job-title">
          <?= $row['title'] ?>
        </div>
        <div class="job-description">
          <?= $row['description'] ?>
        </div>
        <div class="job-controls">
          <a href="/company/delete_job.php?id=<?= $row['id'] ?>" class="btn btn-danger">Fshi</a>
        </div>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
</div>
