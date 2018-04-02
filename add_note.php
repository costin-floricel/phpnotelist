<?php 
  /*This Script adds a note */

    //Define the title and include the header file
    define('TITLE', 'Add a Note');
    include('templates/header.html');

    print '<h2>Add a Note</h2>';

    //Deny access to the page if the user is not registered
    if(!is_registered()){
      print '<h2>You do not have access to this page.Please login first!</h2>';
      include('templates/footer.html');
      exit();
    }
    //Check for a form submission and handle the form
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if(!empty($_POST['note'])){

        //Include the database connection
        include('./includes/mysqli_connect.php');
        $note = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['note'])));

        //Define and execute the query
        $query = "INSERT INTO notes (note) VALUES ('$note')";
        mysqli_query($dbc, $query);

        if(mysqli_affected_rows($dbc) == 1){

          print '<p>Your Note has been saved.</p>';
        } else {
          print '<p>Could not store the note because of an error: <br>' . mysqli_error($dbc) . ' . </p><p>The query being run was: ' . $query . '</p>';
        }

        //Close the connection to the database
        mysqli_close($dbc);
      } else {
        print '<p>Please enter a note!</p>';
      }
    }
    
?>
    <form action="add_note.php" method="post"> 
    <p><label for="note">Note</label></p>
    <p><textarea name="note" cols="30" rows="10"></textarea></p></p>

    <p><input type="submit" id="btn-addnote" name="submit" value="Add Note"></p>
    </form>
   
<?php 
 //Include the footer
 include('templates/footer.html');

