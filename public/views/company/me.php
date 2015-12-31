<?php
$connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);
if (!$connection) {
  mysqli_connect_error();
  return;
}

$companies_sql = "select id, company_name, description, website ";
$companies_sql .= "from companies ";
$companies_sql .= "where user_id = $id";
$result = mysqli_query($connection, $companies_sql);
$company = mysqli_fetch_assoc($result);

$entries_sql = "select title, description ";
$entries_sql .= "from job_entries ";
$entries_sql .= "where company_id = {$company['id']} ";
$entries_sql .= "order by created_at asc";
$entries = mysqli_query($connection, $entries_sql);

mysqli_close($connection);
?>
<div class="content">
  <div class="profile">
    <div class="row">
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

    <div class="row">
      <div class="col-narrow">
        <div class="profile--entries__title">
          Vende vakant
        </div>
      </div>
      <div class="col-wide profile--entries__list">
        <?php while($entry = mysqli_fetch_assoc($entries)): ?>
          <div class="profile--entry">
            <div class="profile--entry__title">
              <?= $entry['title'] ?>
            </div>
            <div class="profile--entry__description">
              <?= $entry['description'] ?>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</div>
