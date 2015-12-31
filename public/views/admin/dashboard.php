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
?>

<div class="content admin">
  <div class="admin--create-post">
    <form action="" method="post">
      <table border="0">
        <tbody>
          <tr>
            <td>
              Titulli i postimit
            </td>
            <td>
              <input type="text" name="title" size="31">
            </td>
          </tr>

          <tr>
            <td>
              Pershkrimi
            </td>
            <td>
              <textarea name="description" rows="8" cols="40"></textarea>
            </td>
          </tr>

          <tr>
            <td colspan="2" style="text-align: right;">
              <input type="submit" class="btn btn-md btn-primary" style="margin-top: 0.5em;" value="Posto">
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>

  <div class="admin--feeds">
    <?php while($feed = mysqli_fetch_assoc($result)): ?>
      <div class="feed">
        <div class="feed--title">
          <a href="/user.php?id=<?= $feed['user_id'] ?>"><?= $feed['author'] ?></a>: <?= $feed['title'] ?>
        </div>
        <div class="feed--time">
          <?= $feed['created_at'] ?>
        </div>
        <div class="feed--details">
          <?= $feed['description'] ?>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>


<?php mysqli_close($connection); ?>
