<?php
include '../db/dbcore.php';
$delID = db_quote($_POST['delID']);
$rows = db_select("DELETE FROM member WHERE memberID=".$delID." ");
//echo "<META http-equiv='refresh' content='1;URL=../ahome.php?userAccounts'>";
header ('Location: ../ahome.php?userAccounts')
 ?>
