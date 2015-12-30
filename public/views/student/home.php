<?php
$db = require_once(__DIR__ . '/../../config/db.php');

$connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);

$entries_sql = "select je.title as title, je.description as description, ";
$entries_sql .= "c.company_name as author, c.user_id as user_id, je.created_at as created_at ";
$entries_sql .= "from job_entries as je, companies as c ";
$entries_sql .= "where je.company_id = c.id ";
$entries_sql .= "union ";
$entries_sql .= "select an.title as title, an.description as description, a.username as author, ";
$entries_sql .= "a.user_id as user_id, an.created_at as created_at ";
$entries_sql .= "from admins as a, admin_notifications as an ";
$entries_sql .= "where a.id = an.admin_id ";
$entries_sql .= "order by created_at DESC";


$result = mysqli_query($connection, $entries_sql);
mysqli_close($connection);
?>

<div class="content student__home-feed">

  <?php while($row = mysqli_fetch_assoc($result)): ?>
    <div class="student__post">
      <div class="student__post--author">
        <a href="/user.php?id=<?= $row['user_id'] ?>">
          <?= $row['author'] ?>
        </a>
      </div>

      <div class="student__post--title">
        <?= $row['title'] ?>
      </div>

      <div class="student__post--description">
        <?= $row['description'] ?>
      </div>
    </div>
  <?php endwhile; ?>

</div>
