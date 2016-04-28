<?php
  //Check if form has been submitted
  if(!isset($_POST['themeChange'])){
    // Handle failure - log the error, notify administrator, etc.
  } else {
    //Include main database functions
    include '../db/dbcore.php';
    // Quote and escape form submitted values
    $skinV = db_quote($_POST['skins']);
    //$bgV = db_quote($_POST['lName']);

      if ($_POST['skins']===''){
        $result = db_query("UPDATE settings SET value1=$skinV, value2=$skinV WHERE setting='current-theme'");
      }
      //Update skin in current-theme
      $result = db_query("UPDATE settings SET value1=$skinV  WHERE setting='current-theme'");
      if($result === false) {
        $error = db_error();
      } else {
        //redirect back to home
        header('location: ../ahome.php');
        exit;
      }
    }
 ?>
