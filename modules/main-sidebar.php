<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="img/user2-160x160.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?=$username?></p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- Sidebar Menu -->

      <ul class="sidebar-menu">
        <li class="header">Control Panel</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="<?=$dashboardActive?>"><a href="?dashboard"><i class="fa fa-tasks"></i> <span>Dashboard</span></a></li>
        <li class="<?=$taskActive?>"><a href="?tasks"><i class="fa fa-users"></i> <span>Eboard Tasks</span></a></li>
        <li class="<?=$userActive?>"><a href="?userAccounts"><i class="fa fa-users"></i> <span>User Accounts</span></a></li>
        <li class="treeview <?=$newsActive?>">
          <a href=""><i class="fa fa-newspaper-o"></i> <span>News Feed</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="?newpost">New Post</a></li>
            <li><a href="?remove-post">Remove Post</a></li>
          </ul>
        </li>
      </ul>

    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
