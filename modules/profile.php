<?php
if(isset($_POST['profileSubmit'])){
    // Quote and escape form submitted values
  $nfname = db_quote($_POST['fname']);
  $nlname = db_quote($_POST['lname']);
  $nusername = db_quote($_POST['uname']);
  $nphone = db_quote($_POST['phone']);
  $nemail = db_quote($_POST['email']);
  $npass = db_quote($_POST['pass']);

  $result = db_query("UPDATE member SET fName=$nfname, lName=$nlname, username=$nusername, phone=$nphone, email=$nemail, password=$npass  WHERE memberID=$uId");
  if($result === false) {
    $error = db_error();
  }else{
    //Yay it worked tell the user
    alertMsg('Profile Changed Successfully!', 'alert-success');
    echo "<script>window.location.replace('ahome.php?page=dashboard');</script>";
}
}

//get data stuff
$rows = db_select("SELECT fName,lName,username,phone,email,password FROM MEMBER WHERE memberID='".$uId."' ");
if(($rows !== false)&&(count($rows) > 0)) {
  $fname=$rows[0]['fName'];
  $lname=$rows[0]['lName'];
  $username=$rows[0]['username'];
  $phone=$rows[0]['phone'];
  $email=$rows[0]['email'];
  $pass=$rows[0]['password'];
}else{
  //failed
}
?>

<!-- Profile form - START -->
  <div class="row">
    <!--Page Header-->
    <div class="page-header text-center">
      <h1>Edit Profile<small>Make changes to your profile here</small></h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <!--Form Content-->
      <div class="well">
        <form role="form" data-toggle="validator" method="POST" action="">
          <ul>
            <div class="input-group">
          <span class="input-group-addon" >First Name </span>
          <input type="text" class="form-control" name="fname" value="<?=$fname?>" aria-describedby="basic-addon1" data-minlength="3" required>
          <div class="help-block with-errors"></div>
        </div>
        <p>
        <div class="input-group">
          <span class="input-group-addon" >Last Name</span>
          <input type="text" class="form-control" name="lname" value="<?=$lname?>" aria-describedby="basic-addon1" data-minlength="3" required>
          <div class="help-block with-errors"></div>
        </div>
        <p>
        <div class="input-group">
          <span class="input-group-addon" >Username</span>
          <input type="text" class="form-control" name="uname" value="<?=$username?>" aria-describedby="basic-addon1" data-minlength="6" required>
          <div class="help-block with-errors"></div>
        </div>
        <p>
        <div class="input-group">
          <span class="input-group-addon" >Email</span>
          <input type="email" class="form-control" name="email" value="<?=$email?>" aria-describedby="basic-addon1" data-error="Invalid Email" required>
          <div class="help-block with-errors"></div>
        </div>
        <p>
        <div class="input-group">
          <span class="input-group-addon" >Phone</span>
          <input type="tel" pattern="\d{3}[\-]\d{3}[\-]\d{4}$" class="form-control" name="phone" value="<?=$phone?>" placeholder="Must Use Format 888-888-8888" aria-describedby="basic-addon1" data-error="Invalid Phone Number Use Format 888-888-8888">
          <div class="help-block with-errors"></div>
        </div>
        <p>
        <div class="input-group">
          <span class="input-group-addon" >Password</span>
          <input type="password" class="form-control" id="Password" name="pass" placeholder="Must Enter Password to Change Profile" aria-describedby="basic-addon1" data-minlength="8" required>
          <div class="help-block with-errors"></div>
        </div>
        <p>
        <div class="input-group">
          <span class="input-group-addon" >Confirm Password</span>
          <input type="password" class="form-control" name="confPass" value="" aria-describedby="basic-addon1" data-match="#Password" data-error="Passwords Don't Match" required>
          <div class="help-block with-errors"></div>
        </div>
        <p>
        <p>
        <button type="submit" name="profileSubmit" class="btn btn-success">Save</button>
        <button type="button" onclick="window.location.replace('ahome.php?page=dashboard');" class="btn btn-danger">Cancel</button>

          </ul>
        </form>
      </div>

    </div>
    </div>
    <div class="col-md-2"></div>



<script type="text/javascript" src="js/validator-profile.js"></script>
