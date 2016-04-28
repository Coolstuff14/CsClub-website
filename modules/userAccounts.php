<?php
$rows = db_select("SELECT memberID, username, fName, lName, pic FROM member");
if(($rows !== false)&&(count($rows) > 0)) {
  foreach ($rows as $row){
    echo "<li>";
    echo "<img src= " . $row['pic'] . "  alt='User Image' width='128px' height='128px'>";
    echo "<l class='users-list-name'> ". $row['fName']." ".$row['lName'] ."<br>(".$row['username'].") </l>";
    echo "<i class='fa fa-unlock-alt'></i><a href='?userAccounts&uID=".$row['memberID']."&action=passwrd'>Reset Password</a>";
    echo "<span class='users-list-date'><i class='fa fa-trash'></i><a href='?userAccounts&uID=".$row['memberID']."&action=delete' class='deco-none' >Delete Account</a></span>";
    echo "</li>";
  }
}
?>
