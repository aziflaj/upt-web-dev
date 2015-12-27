<?php
session_start();

// if he user is already logged in, redirect them on the index page
if (isset($_SESSION['id'])) {
  return header("location: index.php");
}
?>

<?php include('includes/header.php') ?>

<div class="row container-wide content signup">
  <h1>Regjistrohu si student</h1>
  <div class="signup__form">
    <form action="signup/do_signup.php" method="post">
      <table border="0">
        <tbody>
          <tr>
            <td>Emri</td>
            <td><input type="text" name="first_name"></td>
          </tr>

          <tr>
            <td>Mbiemri</td>
            <td><input type="text" name="last_name"></td>
          </tr>

          <tr>
            <td>Email</td>
            <td><input type="email" name="email"></td>
          </tr>

          <tr>
            <td>Fjalekalimi</td>
            <td><input type="password" name="password"></td>
          </tr>

          <tr>
            <td>Perserit fjalekalimin</td>
            <td><input type="password" name="password_repeat"></td>
          </tr>

          <tr>
            <td>Arsimimi</td>
            <td>
              <select name="education" id="education">
                <option value="undergraduate">Bachelor ne zhvillim</option>
                <option value="bachelor">Diplome Bachelor</option>
                <option value="graduate">Master ne zhvillim</option>
                <option value="master">Diplome Master</option>
                <option value="doctorate">Doktorature</option>
              </select>
            </td>
          </tr>

          <tr>
            <td>Ditelindja (dd/MM/yyyy)</td>
            <td><input type="text" name="dob"></td>
          </tr>

          <tr style="text-align: center;">
            <td colspan="2">
              Already a member? <a href="#">Log in here</a>
            </td>
          </tr>

          <tr style="text-align: center;">
            <td colspan="2">
              <input type="submit" class="btn btn-success btn-md" value="Sign up">
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>

<?php include('includes/footer.php') ?>
