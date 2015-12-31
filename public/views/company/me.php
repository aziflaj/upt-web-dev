<?php
$connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);
if (!$connection) {
  mysqli_connect_error();
  return;
}

$companies_sql = "select company_name, description, website ";
$companies_sql .= "from companies ";
$companies_sql .= "where user_id = $id";

$result = mysqli_query($connection, $companies_sql);
$company = mysqli_fetch_assoc($result);
mysqli_close($connection);
?>
<div class="content row">
  <div class="profile">
    <div class="col-narrow">
      <div class="profile--handle">
        <?= $company['company_name'] ?>
      </div>

      <?php if($company['website']): ?>
        <div class="profile--website">
          <a href="<?= $company['website'] ?>"><?= $company['website'] ?></a>
        </div>
      <?php endif; ?>
    </div>

    <div class="col-wide profile--bio">
      <?= $company['description'] ?>
    </div>
  </div>
</div>
