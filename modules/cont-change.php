<?php
      if ($_SERVER['QUERY_STRING']==''){
        $pageCont = 'modules/dashboard.php';
        $dashboardActive="active";
        $bcrumbPage = "Dashboard";
      }
      if (strstr($_SERVER['QUERY_STRING'], 'tasks') == TRUE){
            //Page content to change to
            $pageCont = 'modules/tasks-content.php';
            //Button set to active
            $taskActive="active";
            //BreadCrumb page name
            $bcrumbPage = "Tasks";
       }
       if (strstr($_SERVER['QUERY_STRING'], 'dashboard') == TRUE){
             $pageCont = 'modules/dashboard.php';
             $dashboardActive="active";
             $bcrumbPage = "Dashboard";
        }
        if (strstr($_SERVER['QUERY_STRING'], 'userAccounts') == TRUE){
              $pageCont = 'modules/userAcc-cont.php';
              $userActive="active";
              $bcrumbPage = "User Accounts";
         }
         if (strstr($_SERVER['QUERY_STRING'], 'newpost') == TRUE){
               $pageCont = 'modules/newpost-cont.php';
               $newsActive="active";
               $bcrumbPage = "New Post";
          }
          if (strstr($_SERVER['QUERY_STRING'], 'remove-post') == TRUE){
                $pageCont = 'modules/remove-post.php';
                $newsActive="active";
                $bcrumbPage = "Remove Post";
           }



 ?>
