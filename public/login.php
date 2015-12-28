<?php
session_start();
// if he user is already logged in, redirect them on the index page
if (isset($_SESSION['id'])) {
  return header("location: /");
}
?>

<?php include_once('includes/header.php') ?>
<script src="assets/js/login.js" charset="utf-8"></script>

<div class="row container-wide content login">
  <h1>Hyr ne portalin e punes</h1>

  <div class="login__form">
    <form action="login/do_login.php" method="post">
      <table border="0">
        <tbody>
          <tr>
            <td>Email</td>
            <td>
              <input type="email" id="email" name="email" oninput="validateEmail()">
            </td>
            <td>
              <span id="incorrect_email_msg" style="visibility: hidden; color: red; font-size: 12px">
                Email jo i rregullt
              </span>
            </td>
          </tr>

          <tr>
            <td>Fjalekalimi</td>
            <td>
              <input type="password" id="pwd" name="password" oninput="validatePassword()">
            </td>
            <td>
              <span id="invalid_pwd_msg" style="visibility: hidden; color: red; font-size: 12px">
                Te pakten 8 karaktere, perfshire numra dhe shkronja
              </span>
            </td>
          </tr>

          <tr style="text-align: center;">
            <td colspan="2">
              Nuk keni nje llogari? <a href="signup.php">Regjistrohuni ketu</a>
            </td>
          </tr>

          <tr style="text-align: center;">
            <td colspan="2">
              <input type="submit" id="login_submit" class="btn btn-success btn-md" value="Log in">
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>

</div>

<?php include_once('includes/footer.php') ?>
