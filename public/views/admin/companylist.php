<?php
$db = require_once(__DIR__ . '/../../config/db.php');
$connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);

$companies_sql = "select company_name, description, website, email ";
$companies_sql .= "from companies ";
$companies_sql .= "join users as u on u.id = user_id";
$companies = mysqli_query($connection, $companies_sql);
mysqli_close($connection);
?>

<div class="companies-list">
  <?php if (!mysqli_num_rows($companies)): ?>
    <div class="companies-list__empty">
      Nuk ka asnje kompani
    </div>
  <?php else: ?>
    <ul>
      <?php while($row = mysqli_fetch_assoc($companies)): ?>
        <li><?= $row['company_name'] ?></li>
      <?php endwhile; ?>
    </ul>
  <?php endif; ?>
</div>
