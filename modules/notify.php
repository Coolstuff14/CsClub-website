<?php
  //Limit of notifications to be displayed
  $notifyLimit = 10;
  //Get Count of notifications
  $rows = db_select("SELECT COUNT(*) AS notCount FROM notify LIMIT ".$notifyLimit."");
  $notifyCount = $rows[0]['notCount'];
  if ($notifyCount >= $notifyLimit){
    $notifyCount = $notifyLimit;
  }

 ?>

<!-- Notifications Menu -->
<li class="dropdown notifications-menu">
  <!-- Menu toggle button -->
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-bell-o"></i>
    <span class="label label-warning"><?=$notifyCount?></span>
  </a>
  <ul class="dropdown-menu">
    <li class="header">You have <?=$notifyCount?> notifications</li>
    <li>
      <!-- Inner Menu: contains the notifications -->
      <ul class="menu">

        <?php
        $rows = db_select("SELECT notifyCont FROM notify ORDER BY notifyID DESC LIMIT ".$notifyLimit."");
        if(($rows !== false)&&(count($rows) > 0)) {
          foreach ($rows as $row){
           $notifyCode = html_entity_decode($row['notifyCont']);
           $nofifyCode = preg_replace('/(^[\"\']|[\"\']$)/', '', $notifyCode);
           //Format Accordingly
           echo "<li>";
           echo "<a href='#'>";
           echo "$notifyCode";
           echo "</a>";
           echo "</li>";
         }
        }
         ?>

      </ul>
    </li>
    <li class="footer"><a href="?page=notifications">View all</a></li>
  </ul>
</li>
<?php
/*
//Small notification on top nav bar of admin home page
$link = "#";
$class = "fa fa-users text-aqua";
$info = "2 new members joined today";

echo '
<li>
  <a href="'.$link.'">
    <i class="'.$class.'"></i> '.$info.'
  </a>
</li>
';
*/
?>
