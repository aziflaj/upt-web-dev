/**
 * A helper function similar to the one used in jQuery. It returns DOM
 * elements that match the given CSS selector.
 *
 * @param {string} selector The CSS selector of the element
 * @returns The object(s) that match the given selector
 */
function $(selector) {
  return document.querySelector(selector);
}


/**
 * Checks if the date given is a valid date
 *
 * @param {int} day The day of the month, 1-31
 * @param {int} month The month of the year, 1-12
 * @param {int} year The year, starting from 1930
 * @returns True if the date is valid, otherwise false
 */
function valid_date(day, month, year) {
  var today = new Date();

  if (year < 1930 || year > today.getYear() + 1900) {
    return false;
  }

  if (month < 1 || month > 12) {
    return false;
  }

  var isLeap = ((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0);

  if (isLeap && month == 2 && day == 29) {
    return true;
  }

  if ([1, 3, 5, 7, 8, 10, 12].indexOf(month) > -1 && (day < 1 || day > 31)) {
    return false;
  }

  if (month == 2 && (day < 1 || day > 28)) {
    return false;
  }

  if (day < 1 || day > 30) {
    return false;
  }

  return true;
}
