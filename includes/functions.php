<?php 
/*This script is used to define custom functions */

//This function checks if a user is registered
//The function takes 2 optional values and return a Boolean Value

function is_registered($name = 'Costin', $value = 'Floricel');

//Check for the cookie and check its value:
if(isset($_COOKIE[$name]) && ($_COOKIE[$name] == $value)){
  return true;
} else {
  return false;
}