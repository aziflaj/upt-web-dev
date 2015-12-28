/**
 * Validates the date of birth (dob) in the signup form
 *
 * @returns True if the date is valid, otherwise false
 */
function validateDate() {
  var date = $('#signup_dob').value;
  var validator = /^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/;

  if (!validator.test(date)) {
    $('#invalid_date_msg').style.visibility = "visible";
    $('#signup_submit').disabled = true;
  } else {
    var splitDate = date.split('/');
    var day = parseInt(splitDate[0]);
    var month = parseInt(splitDate[1]);
    var year = parseInt(splitDate[2]);

    if (valid_date(day, month, year)) {
      $('#invalid_date_msg').style.visibility = "hidden";
      $('#signup_submit').disabled = false;
    } else {
      $('#invalid_date_msg').style.visibility = "visible";
      $('#signup_submit').disabled = true;
    }
  }
}


/**
 * Validates the email in the signup form
 *
 * @returns True if the email is valid, otherwise false
 */
function validateEmail() {
  var simpleValidator = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-z]{3}$/; // e.g. aldoziflaj95@gmail.com
  var compoundValidator = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-z]{3}\.[a-z]{2}$/; // e.g. jamesbond@mi6.gov.uk

  var email = $('#email').value;

  if (simpleValidator.test(email) || compoundValidator.test(email)) {
    $('#invalid_email_msg').style.visibility = "hidden";
    $('#signup_submit').disabled = false;
  } else {
    $('#invalid_email_msg').style.visibility = "visible";
    $('#signup_submit').disabled = true;
  }
}


/**
 * Validates the password in the signup form. Password should be at least
 * 8 characters long and include uppercase or lowercase letters and at least
 * one digit
 *
 * @returns True if the password is valid, otherwise false
 */
function validatePassword() {
  var validator = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
  var pwd = $('#password').value;

  if (!validator.test(pwd)) {
    $('#invalid_pwd_msg').style.visibility = "visible";
    $('#signup_submit').disabled = true;
  } else {
    $('#invalid_pwd_msg').style.visibility = "hidden";
    $('#signup_submit').disabled = false;
  }
}


/**
 * Validates the password_repeat field in the signup form
 *
 * @returns True if the password_repeat is the same as password, otherwise false
 */
function validatePasswordRepeat() {
  var pwd = $('#password').value;
  var pwd_rpt = $('#password_repeat').value;

  if (pwd !== pwd_rpt) {
    $('#invalid_pwd_rpt_msg').style.visibility = "visible";
    $('#signup_submit').disabled = true;
  } else {
    $('#invalid_pwd_rpt_msg').style.visibility = "hidden";
    $('#signup_submit').disabled = false;
  }
}
