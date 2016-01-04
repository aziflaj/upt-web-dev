<?php
$db = require_once(__DIR__ . '/../../config/db.php');
$connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);

$entries_sql = "select je.id as entry_id, je.title as title, je.description as description, ";
$entries_sql .= "c.company_name as author, c.user_id as user_id, je.created_at as created_at ";
$entries_sql .= "from job_entries as je, companies as c ";
$entries_sql .= "where je.company_id = c.id ";
$entries_sql .= "union ";
$entries_sql .= "select null as entry_id, an.title as title, an.description as description, a.username as author, ";
$entries_sql .= "a.user_id as user_id, an.created_at as created_at ";
$entries_sql .= "from admins as a, admin_notifications as an ";
$entries_sql .= "where a.id = an.admin_id ";
$entries_sql .= "order by created_at DESC";

$interests_sql = "select position_id ";
$interests_sql .= "from students_interested ";
$interests_sql .= "where student_id = {$_SESSION['local_id']}";

$result = mysqli_query($connection, $entries_sql);
$interests = mysqli_fetch_array(mysqli_query($connection, $interests_sql), MYSQLI_NUM);
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

      <div class="student__post--time">
        <?= $row['created_at'] ?>
      </div>

      <div class="student__post--description">
        <?= $row['description'] ?>
      </div>

      <div class="student__interest--control">
        <?php if(in_array($row['entry_id'], $interests)): ?>
          <a href="#" class="btn btn-danger">Nuk jam i interesuar</a>
        <?php else: ?>
          <a href="#" class="btn btn-success">Jam i interesuar</a>
        <?php endif; ?>
      </div>
    </div>
  <?php endwhile; ?>

</div>
