<?php
if(!isset($_POST['changepass'])){
}
else{
  $pass = db_quote($_POST['password']);
  $passid = $_GET["uID"];

  $result = db_query("UPDATE member SET password=$pass  WHERE memberID=$passid");
  if($result === false) {
    $error = db_error();
  }else{
    //Yay it worked tell the user
    echo "<script>window.location.replace('ahome.php?userAccounts');</script>";
}
}
?>

<div class="modal fade" id="deleteAccountModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Account</h4>
      </div>
      <div class="modal-body">

        <p>Are you sure you want to delete account?<br>
          <button type="button" onclick="delYes();" class="btn btn-danger">Yes</button>
          <button type="button" class="btn btn-success" data-dismiss="modal">No</button></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div class="modal fade" id="resetpassword" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reset Password</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal" method="post" action="">
          <fieldset>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="password">New Password</label>
            <div class="col-md-4">
            <input id="password" name="password" type="text" placeholder="" class="form-control input-md" required="">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="confpass">Confirm Password</label>
            <div class="col-md-4">
            <input id="confpass" name="confpass" type="text" placeholder="" class="form-control input-md" required="">

            </div>
          </div>

          </fieldset>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="changepass" class="btn btn-primary" >Submit</button>
      </form>
      </div>
    </div>

  </div>
</div>



  <section class="content">
      <div class="row">
          <div class="">
            <!-- USERS LIST -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Members</h3>
                <div class="box-tools pull-right">
                  <span class="label label-danger"><?=$regUsers?> Registered Members</span>
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
                <a href="javascript::" class="uppercase">View All Members</a>
              </div><!-- /.box-footer -->
            </div><!--/.box -->
          </div><!-- /.col -->
          </div><!-- /.row -->

  </section>

  <?php
  // Check if we have parameters w1 and w2 being passed to the script through the URL
    if (isset($_GET["uID"])&&isset($_GET["action"])) {
        if ($_GET["action"] == "delete"){
          echo "<script src='js/deleteHelper.js'></script>";
          echo "
          <form action='modules\delUser.php' method='post'>
            <input type='hidden' value=".$_GET["uID"]." name='delID' id='delID'>
          </form>";
        }
        if ($_GET["action"] == "passwrd"){
          echo "<script src='js/passwordHelper.js'></script>";
        }

      //$rows = db_select("DELETE FROM member WHERE memberID=".$_GET["uID"]." ");
      //echo "<META http-equiv='refresh' content='1;URL=ahome.php?userAccounts'>";
    }
   ?>
