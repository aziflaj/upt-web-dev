<?php
// if he user is already logged in, redirect them on the index page
if (isset($_SESSION['id'])) {
  return header("location: index.php");
}
?>

<?php include_once('includes/header.php') ?>
<script src="assets/js/signup.js" charset="utf-8"></script>

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
            <td><input type="email" name="email" id="email" oninput="validateEmail()"></td>
            <td>
              <span id="invalid_email_msg" style="visibility: hidden; color: red; font-size: 12px">
                Email jo i sakte
              </span>
            </td>
          </tr>

          <tr>
            <td>Fjalekalimi</td>
            <td><input type="password" id="password" name="password" oninput="validatePassword()"></td>
            <td>
              <span id="invalid_pwd_msg" style="visibility: hidden; color: red; font-size: 12px">
                Te pakten 8 karaktere, perfshire numra dhe shkronja
              </span>
            </td>
          </tr>

          <tr>
            <td>Perserit fjalekalimin</td>
            <td><input type="password" name="password_repeat" id="password_repeat" oninput="validatePasswordRepeat()"></td>
            <td>
              <span id="invalid_pwd_rpt_msg" style="visibility: hidden; color: red; font-size: 12px">
                Fjalekalimet nuk perputhen
              </span>
            </td>
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
            <td>
              <input type="date" name="dob" id="signup_dob" oninput="validateDate()">
            </td>
            <td>
              <span id="invalid_date_msg" style="visibility: hidden; color: red; font-size: 12px">
                Date jo e sakte
              </span>
            </td>
          </tr>

          <tr style="text-align: center;">
            <td colspan="2">
              E keni nje llogari? <a href="login.php">Hyni ketu</a>
            </td>
          </tr>

          <tr style="text-align: center;">
            <td colspan="2">
              <input type="submit" id="signup_submit" class="btn btn-success btn-md" value="Sign up">
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>

<?php include_once('includes/footer.php') ?>
