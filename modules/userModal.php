<!--MAIN MODAL CONTENT AND SCRIPTS-->
<?php
  if (isset($_GET["uID"])){
    $suID = $_GET["uID"];
    $rows = db_select("SELECT joinDate,pic,fName,lName,email,phone,eboard,active,username,role FROM MEMBER WHERE memberID='".$suID."' ");
      if(($rows !== false)&&(count($rows) > 0)) {
        $uJoinD = $rows[0]['joinDate'];
        $uPic = $rows[0]['pic'];
        $ufn = $rows[0]['fName'];
        $uln = $rows[0]['lName'];
        $uEmail = $rows[0]['email'];
        $uPhone = $rows[0]['phone'];
        $uEb = $rows[0]['eboard'];
        $uAct = $rows[0]['active'];
        $uUsn = $rows[0]['username'];
        $uRole = $rows[0]['role'];
  }
}
 ?>
 <div class="modal fade" id="userAccountModal" role="dialog">
   <div class="modal-dialog">
     <!-- Modal content-->
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" onclick="window.location.replace('ahome.php?page=userAccounts');" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Manage User Account</h4>
       </div>
       <div class="modal-body">
         <div class="row">
            <div class="col-md-4">
              <?php
              if ($uAct == 0){
              echo "<img src='../img/default-profile-de.png' class='img-circle' alt='User Image' width='135px' height='135px'>";
              }else{
              echo "<img src='".$uPic."' class='img-circle' alt='User Image' width='135px' height='135px'>";
              }
               ?>
            </div>
            <div class="col-md-8">
              <h3><strong><?=$ufn?> <?=$uln?></strong><small>  (Aka. <?=$uUsn?>)</small></h3>
              <strong>Email:</strong><a href="mailto:#"> <?=$uEmail?></a><br>
              <strong>Phone:</strong> <?=$uPhone?><br>
              <strong>Eboard:</strong> <?=$uRole?><br>
              <strong>Member Since:</strong> <?=$uJoinD?>
            </div>
         </div>
         <hr>
         <div class="row">
           <div class="text-center">
             <div class="col-md-4">
               <button type='button' data-toggle='modal' data-target='#resetpassword' class="btn btn-warning"><i class="fa fa-lock"></i> Reset Password</button>
             </div>
             <div class="col-md-4">
               <?php
               if ($uAct == 0){
                 echo "<button type='button' data-toggle='modal' data-target='#activateAccountModal' class='btn btn-success'><i class='fa fa-times'></i> Activate Account</button>";
               }else{
                 echo "<button type='button' data-toggle='modal' data-target='#deleteAccountModal' class='btn btn-danger'><i class='fa fa-times'></i> Deactivate Account</button>";
               }
               ?>
             </div>
             <div class="col-md-4">
               <?php
                if ($uEb == 0){
                  echo "<button type='button' data-toggle='modal' data-target='#eboardAccountModal' class='btn btn-info'><i class='fa fa-pencil-square-o'></i> Make Eboard</button>";
                }else{
                  echo "<button type='button' data-toggle='modal' data-target='#eboardRAccountModal' class='btn btn-danger'><i class='fa fa-times'></i> Remove Eboard</button>";
                }
                ?>

             </div>
           </div>
         </div>
       </div>
       <div class="modal-footer">
         <button type="button" onclick="window.location.replace('ahome.php?page=userAccounts');" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
     </div>

   </div>
 </div>


<!--CHANGE PASSWORD-->
<?php
if(!isset($_POST['changepass'])){
}
else{
  //update user password
  $pass = db_quote($_POST['password']);

  $result = db_query("UPDATE member SET password=$pass  WHERE memberID=$suID");
  if($result === false) {
    $error = db_error();
  }else{
    //Yay it worked tell the user
    $_SESSION['showM'] = 'Password Changed Succesfully!';
    //Add notification
    $newNotify = '<i class="fa fa-lock text-yellow"></i>'.$username.' changed password for '.db_squote($ufn).'';
    include 'add-notify.php';

    echo "<script>window.location.replace('ahome.php?page=userAccounts');</script>";
}
}
 ?>
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
            <input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="confpass">Confirm Password</label>
            <div class="col-md-4">
            <input id="confpass" name="confpass" type="password" placeholder="" class="form-control input-md" required="">

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


<!--DEACTIVATE ACCOUNT-->
<?php
if (isset($_POST['deAccount'])){
if ($uAct==0){
  //Activate user
  $rows = db_select("UPDATE member SET active=1 WHERE memberID=".$suID." ");

  //Add notification
  $newNotify = '<i class="fa fa-user text-green"></i>'.db_squote($username).' reactivated user account '.db_squote($ufn).'';
  include 'add-notify.php';

  $_SESSION['showM'] = 'Account Activated Succesfully!';
  //echo $error;
}else{
  //Deactivate user
  $rows = db_select("UPDATE member SET active=0 WHERE memberID=".$suID." ");

  //Add notification
  $newNotify = '<i class="fa fa-times text-red"></i>'.db_squote($username).' deactivated user account '.db_squote($ufn).'';
  include 'add-notify.php';

  $_SESSION['showM'] = 'Account Deactivated Succesfully!';
  //echo $error;
}
  echo "<script>window.location.replace('ahome.php?page=userAccounts');</script>";
}
 ?>
<div class="modal fade" id="deleteAccountModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Deactivate Account</h4>
      </div>
      <div class="modal-body">

        <p>Are you sure you want to deactivate account?<br>
          <form name="deAccount" action="" method="post">
          <button type="submit" name="deAccount" class="btn btn-danger">Yes</button>
          <button type="button" class="btn btn-success" data-dismiss="modal">No</button></p>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div class="modal fade" id="activateAccountModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Activate Account</h4>
      </div>
      <div class="modal-body">

        <p>Are you sure you want to reactivate the account?<br>
          <form name="deAccount" action="" method="post">
          <button type="submit" name="deAccount" class="btn btn-danger">Yes</button>
          <button type="button" class="btn btn-success" data-dismiss="modal">No</button></p>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<!--ADD EBOARD PERMISSIONS AND ROLE-->
<?php
  if (isset($_POST['makeEb'])){
  $dahRole = db_quote($_POST['dahRole']);
  $result = db_select("UPDATE member SET eboard=1, role=$dahRole WHERE memberID=".$suID." ");
  if($result === false) {
    $error = db_error();
    echo $error;
  }else{
    //We all good
    //Add notification
    $newNotify = '<i class="fa fa-pencil-square-o text-green"></i>'.db_squote($username).' added '.db_squote($ufn).' to eboard ';
    include 'add-notify.php';

    $_SESSION['showM'] = 'Operation Succesfully!';

    echo "<script>window.location.replace('ahome.php?page=userAccounts');</script>";
}
}
 ?>
 <div class="modal fade" id="eboardAccountModal" role="dialog">
   <div class="modal-dialog">
     <!-- Modal content-->
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Make Eboard</h4>
       </div>
       <div class="modal-body">
         <form method="post" name="makeEb" action="">
         <fieldset>
          <!-- Text input-->
            <label class="col-md-4 control-label" for="Title">Title</label>
            <div class="col-md-4">
            <input name="dahRole" type="text" placeholder="" class="form-control input-md" required="">
            </div>
          </fieldset>
       </div>
       <div class="modal-footer">
         <button type="submit" name="makeEb" class="btn btn-primary">Submit</button>
       </form>
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
     </div>

   </div>
 </div>



<!--REMOVE EBOARD PERMISSIONS-->
 <?php
  if (isset($_POST['removeEb'])){
    $result = db_select("UPDATE member SET eboard=0, role='' WHERE memberID=".$suID." ");
    if($result === false) {
      $error = db_error();
      echo $error;
    }else{
      //We all good
      //Add notification
      $newNotify = '<i class="fa fa-times text-red"></i>'.db_squote($username).' removed '.db_squote($ufn).' from eboard ';
      include 'add-notify.php';

      $_SESSION['showM'] = 'Operation Succesfully!';
      echo "<script>window.location.replace('ahome.php?page=userAccounts');</script>";
    }
  }
  ?>

 <div class="modal fade" id="eboardRAccountModal" role="dialog">
   <div class="modal-dialog">
     <!-- Modal content-->
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Remove Eboard</h4>
       </div>
       <div class="modal-body">

         <p>Do you want to revoke eboard permissions to this account?<br>
           <form name="removeEb" action="" method="post">
           <button type="submit" name="removeEb" class="btn btn-danger">Yes</button>
           <button type="button" class="btn btn-success" data-dismiss="modal">No</button></p>
           </form>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
     </div>

   </div>
 </div>
