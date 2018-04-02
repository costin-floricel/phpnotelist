<?php 
 /*This script allows a registered user to log in into the site */

  //Set 2 variable with default values
  $loggedin = false; //The user is not logged in
  $errors = false; //Errors have not yet occured

  //Check if the form has been submited
  if($_SERVER['REQUEST_METHOD'] ==  'POST'){

    //Handle the form
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        
    }

  }


?>