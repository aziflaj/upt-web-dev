<?php
$db = require_once(__DIR__ . '/../../config/db.php');
$company_id = $_SESSION['local_id'];
$user_id = $_SESSION['id'];

$connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);

$join_sql = "select users.id as uid, first_name, last_name, cv_url, email, title ";
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
    <form action="/company/post_job.php" method="post">
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
              <textarea name="job_description" rows="6" cols="40"></textarea>
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
    <?php while($row = mysqli_fetch_assoc($result)): ?>
      <div class="company--interested-list">
        <div class="interested-item">
          <a href="/user.php?id=<?= $row['uid'] ?>"><?= $row['first_name'] . ' ' . $row['last_name'] ?></a>
          eshte i interesuar ne <?= $row['title'] ?>
        <div class="interested-item__curriculum">
          <?php if ($row['cv_url']): ?>
            Shkarko CV ketu
            <a href="<?= $row['cv_url'] ?>" target="_blank">
              <img src="../../assets/images/icons/icon-pdf.png" alt="Shiko CV-ne" />
            </a>
          <?php else: ?>
            Nuk ka CV
          <?php endif; ?>
        </div>
        <div class="interested-item__contact">
          <a href="mailto:<?= $row['email'] ?>">Dergo email</a>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
  </div>
</div>


<?php mysqli_close($connection); ?>
