<?php

if (isset($_GET['page'])){
      switch ($_GET['page']){
        case "tasks":
        //Page content to change to
        $pageCont = 'modules/tasks-content.php';
        //Button set to active
        $taskActive="active";
        //BreadCrumb page name
        $bcrumbPage = "Tasks";
        break;

        case "dashboard":
        $pageCont = 'modules/dashboard.php';
        $dashboardActive="active";
        $bcrumbPage = "Dashboard";
        break;

        case "userAccounts":
        $pageCont = 'modules/userAcc-cont.php';
        $userActive="active";
        $bcrumbPage = "User Accounts";
        break;

        case "newpost":
        $pageCont = 'modules/newpost-cont.php';
        $newsActive="active";
        $bcrumbPage = "New Post";
        break;

        case "remove-post":
        $pageCont = 'modules/remove-post.php';
        $newsActive="active";
        $bcrumbPage = "Remove Post";
        break;

        case "profile":
        $pageCont = 'modules/profile.php';
        $dashboardActive="active";
        $bcrumbPage = "Profile";
        break;

        case "resources":
        $pageCont = 'modules/resources.php';
        $resourceActive="active";
        $bcrumbPage = "Resources";
        break;

        case "notifications":
          $pageCont = 'modules/allNotify.php';
          $dashboardActive="active";
          $bcrumbPage = "Notifications";
          break;

        case "":
        $pageCont = 'modules/dashboard.php';
        $dashboardActive="active";
        $bcrumbPage = "Dashboard";
        break;
      }
}else{
  $pageCont = 'modules/dashboard.php';
  $dashboardActive="active";
  $bcrumbPage = "Dashboard";
}



 ?>
