<?php

  if (isset($_SESSION['uId'])){
        $uId=$_SESSION['uId'];
    }

  //Get name from session saved at login
  if (isset($_SESSION['name'])){
        $username=$_SESSION['name'];
    }
  if (isset($_SESSION['role'])){
        $rank=$_SESSION['role'];
    }

  //Member since time
  $rows = db_select("SELECT joinDate,pic FROM MEMBER WHERE memberID='".$uId."' ");
  if(($rows !== false)&&(count($rows) > 0)) {
    $date = $rows[0]['joinDate'];
    $memberDate = substr($date, 0, 10);
    $userPic = $rows[0]['pic'];
  }


  //Check number of registered users
  $rows = db_select("SELECT COUNT(*) AS numUsers FROM member WHERE active=1");
  if(($rows !== false)&&(count($rows) > 0)) {
    $regUsers = $rows[0]['numUsers'];
  }


  //Get name from UID
  function getfName($uid){
    $rows = db_select("SELECT fName FROM member WHERE memberID=".$uid."");
    if(($rows !== false)&&(count($rows) > 0)) {
    return $rows[0]['fName'];
    }
  }
 ?>
