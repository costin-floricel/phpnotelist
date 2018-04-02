<?php 
  /*This script will list every saved note for a user who is registered and logged in*/

  define('TITLE', 'View All Your Notes');
  include('templates/header.html');

  print '<h2>All Your Notes</h2>';

  
    //Deny access to the page if the user is not registered
    if(!is_registered()){
      print '<h2>You do not have access to this page.Please login first!</h2>';
      include('templates/footer.html');
      exit();
    }

    //Include the database connection
    include('./includes/mysqli_connect.php');

     //Define the query
     $query = 'SELECT id, note FROM notes ORDER BY date_entered DESC';

     //Run the query
     if($result = mysqli_query($dbc, $query)){
        //Retrive the returned records
        while($row = mysqli_fetch_array($result)){
          //Print the record
          print "<p>{$row['note']} \n</p>";

          //Add the delete note link
         print "<p> <a href=\"delete_note.php?id={$row['id']}\">Delete Note</a></p>";
         } //End while loop
     } else {
      print '<p>Could show the notes because of an error: <br>' . mysqli_error($dbc) . ' . </p><p>The query being run was: ' . $query . '</p>';
     } //End IF 
//Close the connection to the database
mysqli_close($dbc);
?>
  
  <?php 
 //Include the footer
 include('templates/footer.html');
