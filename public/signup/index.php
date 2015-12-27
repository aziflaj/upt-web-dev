<div class="row container-wide signup">
  <h1>Regjistrohu si student</h1>
  <form action="signup.php" method="post">
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

        <tr colspan="2">
          <td>
            <input type="submit" value="Sign up">
          </td>
        </tr>
      </tbody>
    </table>
  </form>
</div>