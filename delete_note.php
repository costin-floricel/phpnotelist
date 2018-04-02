<?php 
  /*This script is used for deleting saved notes*/

  define('TITLE', 'Delete a note');
  include('templates/header.html');

  print '<h2>Delete a Note</h2>';

  
    //Deny access to the page if the user is not registered
    if(!is_registered()){
      print '<h2>You do not have access to this page.Please login first!</h2>';
      include('templates/footer.html');
      exit();
    }

     //Include the database connection
     include('./includes/mysqli_connect.php');

     //Validate that a numeric value was received in the url
     if(isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id']) > 0){
       //Define the query
        $query = "SELECT note FROM notes WHERE id={$_GET['id']}";

        if($result = mysqli_query($dbc, $query)){
          //Retrive the information
          $row = mysqli_fetch_array($result);

          //Make the form
          print '<form action="delete_note.php" method="post">
            <p>Are you sure you want to delete this note?</p>
            <p>' .$row['note'];

            print  '</p><br><input type="hidden" name="id" value= "' . $_GET['id'] . '"> 
            <p><input type="submit" name="submit" id="btn-addnote" value="Delete Note"></p>
          
          </form>';


      } else {
        //If an error occured while getting the information
        print '<p>Could retrive the notes because of an error: <br>' . mysqli_error($dbc) . ' . </p><p>The query being run was: ' . $query . '</p>';
      }
     } elseif (isset($_POST['id']) && is_numeric($_POST['id']) && ($_POST['id']) > 0) {
       //Define the query
      $query = "DELETE FROM notes WHERE id={$_POST['id']} LIMIT 1";
      $result = mysqli_query($dbc, $query);

      //Report on the result
      if(mysqli_affected_rows($dbc) == 1){

        print '<p>Your Note has been deleted.</p>';
      } else {
        print '<p>Could not delete the note because of an error: <br>' . mysqli_error($dbc) . ' . </p><p>The query being run was: ' . $query . '</p>';
      }
     } else {
       //If no valid ID value is received by the page display an error
       '<p>This page has been accesed in error</p>';
     }
     //Close the connection to the database
mysqli_close($dbc);
?>

  
  <?php 
 //Include the footer
 include('templates/footer.html');
