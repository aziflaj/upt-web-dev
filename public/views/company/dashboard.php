<?php
$db = require_once(__DIR__ . '/../../config/db.php');
$company_id = $_SESSION['local_id'];
$user_id = $_SESSION['id'];

$connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);

$join_sql = "select first_name, last_name, cv_url, email, title ";
$join_sql .= "from students ";
$join_sql .= "inner join students_interested as si ";
$join_sql .= "on si.student_id = students.id ";
$join_sql .= "and si.company_id = $company_id ";
$join_sql .= "inner join users on users.id = students.user_id ";
$join_sql .= "inner join job_entries as je on je.company_id = si.company_id";

$result = mysqli_query($connection, $join_sql);
?>

<div class="content company--dashboard">
  <div class="company--dashboard__create-post">
    <form action="" method="post">
      <table border="0">
        <tbody>
          <tr>
            <td>
              Pozicioni i punes
            </td>
            <td>
              <input type="text" name="job_title" size="31">
            </td>
          </tr>

          <tr>
            <td>
              Pershkrimi
            </td>
            <td>
              <textarea name="job_description" rows="8" cols="40"></textarea>
            </td>
          </tr>

          <tr>
            <td colspan="2" style="text-align: right;">
              <input type="submit" class="btn btn-md btn-primary" style="margin-top: 0.5em;" value="Shto pozicion">
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>

  <div class="company--interested-students">
    <ul>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <li><?= "{$row['first_name']} {$row['last_name']} ({$row['email']}) eshte i interesuar ne \"{$row['title']}\"" ?></li>
      <?php endwhile; ?>
    </ul>
  </div>
</div>


<?php mysqli_close($connection); ?>
