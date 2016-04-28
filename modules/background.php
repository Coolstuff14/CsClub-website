<?php

  // Connect to the database
  $connection = db_connect();

  //Get theme from current-theme
  $rows = db_select("SELECT value1, value2 FROM settings WHERE setting='current-theme'");
  if(($rows !== false)&&(count($rows) > 0)) {
  $currentSkin = $rows[0]['value1'];
  $currentbgUrl = $rows[0]['value2'];

  //Get defaults
  $rows = db_select("SELECT value1, value2 FROM settings WHERE setting='default-theme'");
  if(($rows !== false)&&(count($rows) > 0)) {
    $defaultpageSkin = $rows[0]['value1'];
    $defaultbgUrl = $rows[0]['value2'];

  //Check that there is a skin
  if (!isset($currentSkin) || ($currentSkin=='')){
    $pageSkin = $defaultpageSkin;
  }else {
    $pageSkin = $currentSkin;
  }

  //check that there is a background
  if (!isset($currentbgUrl) || ($currentbgUrl=='')){
    $bgUrl = $defaultbgUrl;
  }else {
    $bgUrl = $currentbgUrl;
  }

}
}

  echo '<style>.layout-boxed{background:url('.$bgUrl.') repeat fixed;}</style>';
?>
