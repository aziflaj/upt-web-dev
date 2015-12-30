<?php
$connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);
if (!$connection) {
  mysqli_connect_error();
  return;
}

$user_sql = "select first_name, last_name, cv_url, degree, bio ";
$user_sql .= "from students ";
$user_sql .= "where user_id = $id";

$result = mysqli_query($connection, $user_sql);
$user = mysqli_fetch_assoc($result);
mysqli_close($connection);
?>

<div class="content row">
  <div class="profile">
    <div class="col-narrow">
      <div class="profile--handle">
        <?= $user['first_name'] ?> <?= $user['last_name'] ?>
      </div>

      <div class="profile--degree">
        Arsimimi: <?= $user['degree'] ?>
      </div>

      <div class="profile--cv">
        CV:
        <?php if($user['cv_url']): ?>
          <a href="<?= $user['cv_url'] ?>">Shkarko ketu</a>
        <?php else: ?>
          Nuk u gjet
        <?php endif; ?>
      </div>
    </div>

    <div class="col-wide">
      <?= $user['bio'] ?>
    </div>
  </div>
</div>
