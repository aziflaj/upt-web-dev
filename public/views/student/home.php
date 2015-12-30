<?php
$db = require_once(__DIR__ . '/../../config/db.php');

$connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);

$entries_sql = "select je.title, je.description, c.company_name, c.user_id ";
$entries_sql .= "from job_entries as je, companies as c ";
$entries_sql .= "where je.company_id = c.id";

$result = mysqli_query($connection, $entries_sql);
mysqli_close($connection);
?>

<div class="content student__job-entries">

  <?php while($row = mysqli_fetch_assoc($result)): ?>
    <div class="student__job--entry">
      <div class="student__job--company">
        <a href="/user.php?id=<?= $row['user_id'] ?>">
          <?= $row['company_name'] ?>
        </a>
      </div>

      <div class="student__job--title">
        <?= $row['title'] ?>
      </div>

      <div class="student__job--description">
        <?= $row['description'] ?>
      </div>
    </div>
  <?php endwhile; ?>

</div>
