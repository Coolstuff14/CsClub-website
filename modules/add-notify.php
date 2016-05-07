<?php
//Add notification code to variable $newNotify
$notifyCode = htmlentities($newNotify);
// Insert the values into the database
$notifyCode = preg_replace('/(^[\"\']|[\"\']$)/', '', $notifyCode);
$result = db_query("INSERT INTO notify (notifyCont) VALUES ('$notifyCode')");
if($result === false) {
  $error = db_error();
  // Handle failure - log the error, notify administrator, etc.
} else {
  //It was done
}
?>
