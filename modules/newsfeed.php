<?php
//NEWSFEED CODE! MODIFY AS NEEDED!
include_once 'db/dbcore.php';

$rows = db_select("SELECT postAuthor, postBody, postTime FROM newsfeed");
if(($rows !== false)&&(count($rows) > 0)) {
  foreach ($rows as $row){
   $bodyCode = html_entity_decode($row['postBody']);
   $bodyCode = preg_replace('/(^[\"\']|[\"\']$)/', '', $bodyCode);
   $formatedTime = substr($row['postTime'], 0, 10);

   //Format Accordingly
   echo "<blockquote>";
   echo "<p>$bodyCode</p>";
   echo "<footer>Post by: ".$row['postAuthor']." <cite title='Source Title'>On $formatedTime </cite></footer>";
   echo "</blockquote>";
 }
}
?>
