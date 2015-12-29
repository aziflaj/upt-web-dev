/**
 * Validates the email in the login form
 *
 * @returns True if the email is valid, otherwise false
 */
function validateEmail() {
  var simpleValidator = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-z]{2,}$/; // e.g. aldoziflaj95@gmail.com
  var compoundValidator = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-z]{3}\.[a-z]{2}$/; // e.g. jamesbond@mi6.gov.uk

  var email = $('#email').value;

  if (simpleValidator.test(email) || compoundValidator.test(email)) {
    $('#incorrect_email_msg').style.visibility = "hidden";
    $('#login_submit').disabled = false;
  } else {
    $('#incorrect_email_msg').style.visibility = "visible";
    $('#login_submit').disabled = true;
  }
}


/**
 * Validates the password in the login form. Password should be at least
 * 8 characters long and include uppercase or lowercase letters and at least
 * one digit
 *
 * @returns True if the password is valid, otherwise false
 */
function validatePassword() {
  var validator = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
  var pwd = $('#pwd').value;

  if (!validator.test(pwd)) {
    $('#invalid_pwd_msg').style.visibility = "visible";
    $('#login_submit').disabled = true;
  } else {
    $('#invalid_pwd_msg').style.visibility = "hidden";
    $('#login_submit').disabled = false;
  }
}
