<?php
if(!isset($_POST['postbody'])){
}
else{
    $body = db_quote($_POST['postbody']);
    $postCode = htmlentities($body);
    // Insert the values into the database
    $postCode = preg_replace('/(^[\"\']|[\"\']$)/', '', $postCode);
    $result = db_query("INSERT INTO NEWSFEED (postAuthor, postBody) VALUES ('$username', '$postCode')");
    if($result === false) {
      $error = db_error();
      echo "$error";
      // Handle failure - log the error, notify administrator, etc.
    } else {

    alertMsg('Posted Successfully!', 'alert-success');
    // We successfully inserted a row into the database
    $newNotify = '<i class="fa fa-newspaper-o text-aqua"></i>New post in newsfeed by '.$username.'';
    include 'add-notify.php';
    }
}
 ?>
 <form name="postbody" method="post" action="">
   <input type='hidden' name='postbody' id='postbody'>
 </form>

<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="box box-info">
        <div class="box-header">
          <i class="ion ion-compose"></i>
          <h3 class="box-title">New Post <small>Enter new post for news feed</small></h3>

        </div><!-- /.box-header -->
        <div class="box-body pad">
          <div id="summernote"><p>Stuff goes here!</p></div>
          <button class="btn btn-default pull-right" onclick="savePost();"><i class="fa fa-plus"></i>Post</button>
        </div>
      </div><!-- /.box -->
    </div>
  </div>
</section>
