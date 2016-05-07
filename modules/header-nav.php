<!-- Main Header -->
<header class="main-header">

  <!-- Logo -->
  <a href="ahome.php" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">CSC</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Admin</b>CSC</span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">


        <!-- Notifications Menu -->
        <?php include 'modules/notify.php'; ?>

<?php
/*
<li class="dropdown tasks-menu">

  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-flag-o"></i>
    <span class="label label-danger"><?=$todoCount?></span>
  </a>
  <ul class="dropdown-menu">
    <li class="header">You have <?=$todoCount?> tasks</li>
    <li>

      <ul class="menu">
        <li>
          <a href="#">
            <i class="fa fa-thumb-tack text-green"></i>  Finish admin pages
          </a>
        </li>
      </ul>
    </li>
    <li class="footer">
      <a href="#">View all tasks</a>
    </li>
  </ul>
</li>
*/
?>


        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            <img src="<?=$userPic?>" class="user-image" alt="User Image">
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs"><?=$username?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
              <img src="<?=$userPic?>" class="img-circle" alt="User Image">
              <p>
                <?=$username?> - <?=$rank?>
                <small>Member Since - <?=$memberDate?></small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="?page=profile" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="db/logout.php" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>

        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>
