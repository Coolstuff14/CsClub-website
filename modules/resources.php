<?php
if (isset($_GET['rID']) && isset($_GET['action']) && $_GET['action']=="delete"){

    db_select("DELETE FROM resources WHERE resourceID=".$_GET['rID']." ");
    $newNotify = '<i class="fa fa-trash text-red"></i>Resource deleted by '.$username.'';
    include 'add-notify.php';
    alertMsg('Deleted Successfully!', 'alert-success');
  }

if (isset($_POST['newR'])){
  $title = db_quote($_POST['title']);
  $desc = db_quote($_POST['desc']);

  if(!isset($_FILES['uploadFile'])){
      //No file
      $link = db_quote($_POST['url']);
    }else{
      //File found
      include_once 'modules/resourceUp.php';
    }

    if (!isset($link)){
      //echo "<meta http-equiv='refresh' content='3; url=ahome.php?page=resources' />";
    }else{
      $result = db_query("INSERT INTO resources (title,description,url) VALUES (" . $title . "," . $desc . "," . $link . ")");
      if($result === false) {
        $error = db_error();
        //echo $error;
        // Handle failure - log the error, notify administrator, etc.
      } else {
        //Add notification about updated task
        $newNotify = '<i class="fa fa-link text-blue"></i>New resource added by '.$username.'';
        include 'add-notify.php';

        alertMsg('Resource Added Successfully!', 'alert-success');
      }
    }
}
 ?>

<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <div class="page-header">
      <h2><i class="fa fa-plus-square-o"></i> New Resource<small> Add new resource here for members</small></h2>
    </div>
<form class="form-horizontal" name="newR" method="post" action="" enctype="multipart/form-data">
<fieldset>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="title">Title</label>
  <div class="col-md-4">
  <input id="title" name="title" type="text" placeholder="" class="form-control input-md" required="">

  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="desc">Description</label>
  <div class="col-md-4">
    <textarea class="form-control" id="desc" name="desc"></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="url">Url</label>
  <div class="col-md-4">
  <input id="url" name="url" type="text" placeholder="" class="form-control input-md">

  </div>
</div>

<!-- File Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="uploadFile">Upload</label>
  <div class="col-md-4">
    <input id="uploadFile" name="uploadFile" class="input-file" type="file">
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-8">
    <button type="submit" name="newR" class="btn btn-success">Submit</button>
    <button id="cancel" name="cancel" onlick="" class="btn btn-danger">Cancel</button>
  </div>
</div>

</fieldset>
</form>
  </div>
</div>

<hr style=" border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));" />


<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <div class="page-header">
      <h2><i class="fa fa-link"></i> Current Resources<small> All current resources click X to delete them</small></h2>
    </div>
    <?php
    $rows = db_select("SELECT resourceID, title, description, url FROM resources");
    if(($rows !== false)&&(count($rows) > 0)) {
      foreach ($rows as $row){
       //Format Accordingly
       echo "<div class='row'>";
       echo "<div class='col-md-1 pull-left'>";
       echo "<a href='?page=resources&rID=".$row['resourceID']."&action=delete'><h4><i class='fa fa-times fa-2x text-danger'></i></h4></a>";
       echo "</div>";
       echo "<div class='col-md-8 pull-left'>";
       echo "<a href='".$row['url']."' target='_blank'>";
       echo "<h4>".$row['title']."<br>";
       echo "<small>".$row['description']."</small>";
       echo "</h4></a>";
       echo "</div>";
       echo "</div>";
     }
    }
     ?>
  </div>

</div>
