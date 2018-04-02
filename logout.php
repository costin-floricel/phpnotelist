<?php 
  //This is the logout script. It will destroy the cookie


  //Destroy the cookie but only if it alreday exists
  if(isset($_COOKIE['Costin'])){
    setcookie('Costin', FALSE, time()-300);
  }

  //Define the page title and include the header
  define('TITLE', 'Logout');
  include('templates/header.html');

  //Print the confirmation that You are Logout
  echo '<p>You are now logged out</p>';
  echo '<p>You can login back by using this link<a href="index.php">LogIn</a></p>';




   //Include the footer
   include('templates/footer.html');
?>
