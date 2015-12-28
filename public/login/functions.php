<?php

/**
 * Checks if the params of login are all set
 *
 * @param mixed[] Array of parameters from the $_POST
 * @return boolean True if all params are set, otherwise false
 */
function all_params($params)
{
  return (isset($params['email']) && isset($params['password']));
}

?>
