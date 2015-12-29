<?php
$db = require_once(__DIR__ . '/../../config/db.php');
$student_id = $_SESSION['local_id'];
$user_id = $_SESSION['id'];

$connection = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);

$join_sql = "select email, first_name, last_name, cv_url, degree ";
$join_sql .= "from users, students ";
$join_sql .= "where users.id = students.user_id and students.id = $student_id";

$result = mysqli_query($connection, $join_sql);
// we need only the 1st result and we're sure there is one! (the user is logged in, right?)
$this_student = mysqli_fetch_assoc($result);
mysqli_close($connection);
?>

<div class="content student--settings">
  <h1>Ndrysho te dhenat personale</h1>
  <div class="student--settings__form">
    <form action="../../student/update_settings.php" method="post">
      <table border="0">
        <tbody>
          <tr>
            <td>Emri</td>
            <td>
              <input type="text" name="first_name" value="<?= $this_student['first_name'] ?>">
            </td>
          </tr>

          <tr>
            <td>Mbiemri</td>
            <td>
              <input type="text" name="last_name" value="<?= $this_student['last_name'] ?>">
            </td>
          </tr>

          <tr>
            <td>CV</td>
            <td>
              <input type="file" name="curriculum">
            </td>
            <td>
              <?php if ($this_student['cv_url']): ?>
                <a href="<?= $this_student['cv_url'] ?>">Shiko CV-ne ekzistuese</a>
              <?php else: ?>
                <p style="color: red; font-size: 12px">
                  Nuk keni nje CV ekzistuese.<br>Ju lutem ngarkoni nje.
                </p>
              <?php endif; ?>
            </td>
          </tr>

          <tr>
            <td>Arsimimi</td>
            <td>
              <select name="education">
                <option value="undergraduate" <?php if ($this_student['degree'] == 'undergraduate'): ?> selected <?php endif ?>>Bachelor ne zhvillim</option>
                <option value="bachelor" <?php if ($this_student['degree'] == 'bachelor'): ?> selected <?php endif ?>>Diplome Bachelor</option>
                <option value="graduate" <?php if ($this_student['degree'] == 'graduate'): ?> selected <?php endif ?>>Master ne zhvillim</option>
                <option value="master" <?php if ($this_student['degree'] == 'master'): ?> selected <?php endif ?>>Diplome Master</option>
                <option value="doctorate" <?php if ($this_student['degree'] == 'doctorate'): ?> selected <?php endif ?>>Doktorature</option>
              </select>
            </td>
          </tr>

          <tr>
            <td>Ditelindja (dd/MM/yyyy)</td>
            <td>
              <input type="date" name="dob" id="update_dob" oninput="validateDate()">
            </td>
            <td>
              <span id="invalid_date_msg" style="visibility: hidden; color: red; font-size: 12px">
                Date jo e sakte
              </span>
            </td>
          </tr>

          <tr style="text-align: center;">
            <td colspan="2">
              <input type="submit" id="update_submit" style="margin:2em;" class="btn btn-success btn-md" value="Ruaj ndryshimet">
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>
