<?php
$db = require_once(__DIR__ . '/../../config/db.php');
$connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);

$admins_sql = "select first_name, last_name, username ";
$admins_sql .= "from admins ";
$admins_sql .= "join users as u on u.id = user_id and u.id <> " . $_SESSION['id'];
$admins = mysqli_query($connection, $admins_sql);
mysqli_close($connection);
?>

<div class="admins-list">
  <?php if (!mysqli_num_rows($admins)): ?>
    <div class="admins-list__empty">
      Ju jeni i vetmi administrator
    </div>
  <?php else: ?>
    <ul>
      <?php while($row = mysqli_fetch_assoc($admins)): ?>
        <li><?= $row['username'] ?></li>
      <?php endwhile; ?>
    </ul>
  <?php endif; ?>
</div>
