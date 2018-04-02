<?php 
  //This script is used to connect to the database 

  //Connect:
  $dbc = mysqli_connect('localhost', 'root', 'toor', 'notes_db');

  //Establish the character set:
  mysqli_set_charset($dbc, 'utf-8');
