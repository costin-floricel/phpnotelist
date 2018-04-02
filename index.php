<?php 
 /*This script allows a registered user to log in into the site */

  //Set 2 variable with default values
  $loggedin = false; //The user is not logged in
  $error = false; //Errors have not yet occured

  //Check if the form has been submited
  if($_SERVER['REQUEST_METHOD'] ==  'POST'){

    //Handle the form
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        if((strtolower($_POST['email'] == 'costin@costin.com') && ($_POST['password'] == 'testpassword'))) {
          //Create the cookie
          setcookie('Costin' , 'Floricel' , time()+3600);
          //Indicate that the user is loggedin
          $loggedin = true;
        } else {
          //If is Incorect
          $error = 'The submite email address and password do not match those in our database!';
        } 
        }else {
          //If the user forgot to complete a field
          $error = 'Please make sure you entered both an email address and a password';
       }
    }
  

  //Define the title and include the header file
  define('TITLE', 'Login');
  include('templates/header.html');

  if($error) {
    print '<p class="error">' . $error . '</p>';
  }

  if($loggedin) {
    print '<p>You are now Loggedin and You Can Add Notes</p>';
  } else {
    print '
    <div class="container">
		
		<h2>Login in Order to Add Your Notes</h2>
		<div class="row ">
						<form action="index.php" method= "post" class="form">
							<input type="email" name="email" placeholder="username or email address"/>
							<input type="password" name="password" placeholder="password"/>
							<button>login</button>
						</form>		
	</div>';
  }
  //Include the footer
  include('templates/footer.html');



?>