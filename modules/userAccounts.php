<?php
if (!isset($_GET["showAll"])){
  $showDe = "0";
}else{
  $showDe = "";
}

$rows = db_select("SELECT memberID, username, fName, lName, pic, active FROM member ORDER BY active DESC");
if(($rows !== false)&&(count($rows) > 0)) {
  foreach ($rows as $row){
    if (!($row["active"] === $showDe)){
    echo "<li>";
    if ($row["active"] == 0){
    echo "<img src= '../img/default-profile-de.png'  alt='User Image' width='128px' height='128px'>";
    }else{
    echo "<img src= " . $row['pic'] . "  alt='User Image' width='128px' height='128px'>";
    }
    echo "<a class='users-list-name' href='?page=userAccounts&uID=".$row['memberID']."'>". $row['fName']." ".$row['lName'] ."<br>(".$row['username'].")</a>";
    /*
    echo "<i class='fa fa-unlock-alt'></i><a href='?page=userAccounts&uID=".$row['memberID']."&action=passwrd'>Reset Password</a>";
    if ($row["active"] == 0){
    echo "<span class='users-list-date'><i class='fa fa-trash'></i><a href='?page=userAccounts&uID=".$row['memberID']."&action=activate' class='deco-none' >Activate Account</a></span>";
    }else{
    echo "<span class='users-list-date'><i class='fa fa-trash'></i><a href='?page=userAccounts&uID=".$row['memberID']."&action=delete' class='deco-none' >Deactive Account</a></span>";
    }
    */
    echo "</li>";
  }
  }
}
?>
