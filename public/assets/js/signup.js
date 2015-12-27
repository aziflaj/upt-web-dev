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
