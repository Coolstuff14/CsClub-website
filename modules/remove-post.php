<?php
if(!isset($_POST['deletePostNOW'])){
}
else{
  $pid = db_quote($_POST['deletePostNOW']);
  db_select("DELETE FROM newsfeed WHERE postID=".$pid." ");
}

$rows = db_select("SELECT postID, postAuthor, postBody, postTime FROM newsfeed");
if(($rows !== false)&&(count($rows) > 0)) {
  foreach ($rows as $row){
    $bodyCode = html_entity_decode($row['postBody']);
    $bodyCode = preg_replace('/(^[\"\']|[\"\']$)/', '', $bodyCode);
    $formatedTime = substr($row['postTime'], 0, 10);
    echo "<blockquote>";
    echo "<p>$bodyCode</p>";
    echo "<footer>Post by: ".$row['postAuthor']." <cite title='Source Title'>On $formatedTime </cite></footer>";
    echo "<form method='post' action=''>";
    echo "<button type='submit' name='deletePostNOW' value=".$row['postID']." class='btn btn-danger'>Delete (No Conformation)</button>";
    echo "</form>";
    echo "</blockquote>";
  }
}
?>
