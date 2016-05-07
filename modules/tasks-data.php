<?php

  //include 'db/dbcore.php';
  if (!isset($_GET["showAll"])){
    $showEm = "Complete";
  }else{
    $showEm = "";
  }
  $rows = db_select("SELECT jobID, dateCreated,submitBy,title,progress,status FROM job");
  if(($rows !== false)&&(count($rows) > 0)) {
    foreach ($rows as $row){
      $rowsN = db_select("SELECT fname FROM member WHERE memberID=".$row['submitBy']."");
      $subName = $rowsN['0']['fname'];
      if (!($row["status"] === $showEm)){
        echo "<tr class='clickable-row' data-id='?page=tasks&taskID=".$row["jobID"]."'>";
        echo "<td>" . $row["jobID"] . "</td>";
        echo "<td>" . $row["dateCreated"] . "</td>";
        echo "<td>" . $row["title"] . "</td>";
        echo "<td>" . $subName . "</td>";
        echo "<td>" . $row["progress"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "</tr>";
      }
    }
  }


 ?>
