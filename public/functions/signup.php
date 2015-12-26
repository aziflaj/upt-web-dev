<?php

function valid_signup($array)
{
  if (isset($array['first_name']) && isset($array['last_name']) && isset($array['email'])
      && isset($array['education']) && isset($array['password']) && isset($array['password_repeat'])
        && isset($array['dob'])) {

    return true;

  } else {
    return false;
  }
}

?>
