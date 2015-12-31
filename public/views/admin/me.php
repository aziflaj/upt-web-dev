<?php
$connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);
if (!$connection) {
  mysqli_connect_error();
  return;
}

$admins_sql = "select id, first_name, last_name, username ";
$admins_sql .= "from admins ";
$admins_sql .= "where user_id = $id";
$result = mysqli_query($connection, $admins_sql);
$admin = mysqli_fetch_assoc($result);

$notifications_sql = "select title, description ";
$notifications_sql .= "from admin_notifications ";
$notifications_sql .= "where admin_id = {$admin['id']} ";
$notifications_sql .= "order by created_at desc";
$notifications = mysqli_query($connection, $notifications_sql);

mysqli_close($connection);
?>
<div class="content">
  <div class="profile">
    <div class="row">
      <div class="col-narrow">
        <div class="profile--handle">
          <?= "{$admin['first_name']} {$admin['last_name']}" ?>
        </div>
        <div class="profile--username">
          <?= $admin['username'] ?>
        </div>
      </div>

      <div class="col-wide profile--notifications-list">
        <?php while($ntf = mysqli_fetch_assoc($notifications)): ?>
          <div class="profile--entry">
            <div class="profile--entry__title">
              <?= $ntf['title'] ?>
            </div>
            <div class="profile--entry__description">
              <?= $ntf['description'] ?>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</div>
