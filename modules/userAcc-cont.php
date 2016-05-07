<?php
if (isset($_SESSION['showM'])){
  alertMsg($_SESSION['showM'],'alert-success');
  unset($_SESSION['showM']);
}
?>
<?php include 'userModal.php'; ?>






<?php
//Check number of registered users
$rows = db_select("SELECT COUNT(*) AS numUsers FROM member WHERE active=1");
if(($rows !== false)&&(count($rows) > 0)) {
  $regUsersAct = $rows[0]['numUsers'];
}
$rows = db_select("SELECT COUNT(*) AS numUsers FROM member WHERE active=0");
if(($rows !== false)&&(count($rows) > 0)) {
  $regUsersDe = $rows[0]['numUsers'];
}

 ?>


  <section class="content">
      <div class="row">
          <div class="">
            <!-- USERS LIST -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Members</h3>
                <div class="box-tools pull-right">
                  <span class="label label-primary"><?=$regUsersAct?> Active Members</span>
                  <span class="label label-danger"><?=$regUsersDe?> Deactive Members</span>
                  <!--<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>-->
                  <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
                </div>
              </div><!-- /.box-header -->
              <div class="box-body no-padding">
                <ul class="users-list clearfix">

                <?php include 'userAccounts.php'; ?>

                </ul><!-- /.users-list -->
              </div><!-- /.box-body -->
              <div class="box-footer text-center">
                <a href="ahome.php?page=userAccounts&showAll=true" class="uppercase">View All Members</a>
              </div><!-- /.box-footer -->
            </div><!--/.box -->
          </div><!-- /.col -->
          </div><!-- /.row -->

  </section>

  <?php

    if (isset($_GET["uID"])) {
      echo "<script src='js/userHelper.js'></script>";

    }
   ?>
