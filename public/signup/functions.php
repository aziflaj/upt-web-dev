<?php

/**
 * Checks if the params of signup are all settype
 *
 * @param mixed[] Array of parameters from the $_POST
 * @return boolean True if all params are set, otherwise false
 */
function all_params($params)
{
  if (isset($params['first_name']) && isset($params['last_name']) && isset($params['email'])
      && isset($params['education']) && isset($params['password']) && isset($params['password_repeat'])
        && isset($params['dob'])) {

    return true;

  } else {
    return false;
  }
}

/**
 * Stores a new user of type student in the database. The student will be stored
 * in the table `work_table`.`users` with `type_id` of 2 (from the
 * `work_table`.`types` table) and also in the `work_table`.`students` table
 *
 * @param mysqli $connection The connection with the database
 * @param mixed[] Array of the parameters that will be stored in the database.
 * @return mixed[]|int -1 if the student is not stored, or an associative array with 'user_id'
 *         and student_id otherwise.
 */
function store_new_student($connection, $params) {
  $pwd = password_hash($params['password'], PASSWORD_BCRYPT);
  $insert_user_sql = "insert into users (email, password, type_id) values ('{$params['email']}', '{$pwd}', 2);"; // 2 for student

  if (mysqli_query($connection, $insert_user_sql)) {
    $user_id = mysqli_insert_id($connection);

    $insert_student_sql = "insert into students (first_name, last_name, user_id, dob, degree) values ";
    $insert_student_sql .= "('{$params['first_name']}', '{$params['last_name']}', $user_id, ";
    $insert_student_sql .= "STR_TO_DATE('{$params['dob']}', '%d/%m/%Y'), '{$params['education']}');";

    if (mysqli_query($connection, $insert_student_sql)) {
      $student_id = mysqli_insert_id($connection);

      return array(
        'user_id' => $user_id,
        'student_id' => $student_id
      );

    } else {
      return -1;
    }

  } else {
    return -1;
  }
}

?>
