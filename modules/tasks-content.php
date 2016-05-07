<?php
  //Check if form has been submitted
  if(isset($_POST['newtask'])){
    include_once 'db/dbcore.php';

    // Connect to the database
    $connection = db_connect();

    // Quote and escape form submitted values
    $submitBy = $_SESSION['uId'];
    $title = db_quote($_POST['title']);
    $desc = db_quote($_POST['description']);
    $prog = db_quote($_POST['progress']);
    $status = db_quote($_POST['status']);
    $urgency = db_quote($_POST['urgency']);
    $memName = db_quote($_POST['assto']);

    if (!isset($_GET["taskID"])){
      // Insert the values into the database
      $result = db_query("INSERT INTO job (submitBy,title,description,progress,memberName,status,urgency) VALUES (" . $submitBy . "," . $title . "," . $desc . "," . $prog . "," . $memName . "," . $status . "," . $urgency . ")");
      if($result === false) {
        $error = db_error();
        // Handle failure - log the error, notify administrator, etc.
      } else {
      // We successfully inserted a row into the database
      //Add notification about updated task
      $newNotify = '<i class="fa fa-thumb-tack text-green"></i>Task '.db_squote($title).' created by '.$username.'';
      include 'add-notify.php';

      echo "<script>window.location.replace('ahome.php?page=tasks');</script>";
      }
    }else{
      //Update database
      $tskID = $_GET["taskID"];
      $result = db_query("UPDATE job SET submitBy=$submitBy, title=$title, description=$desc, progress=$prog, memberName=$memName, status=$status, urgency=$urgency  WHERE jobID=$tskID");
      if($result === false) {
        $error = db_error();
        // Handle failure - log the error, notify administrator, etc.
      } else {
      // We successfully inserted a row into the database
      //Add notification about new task
      $newNotify = '<i class="fa fa-pencil-square-o text-yellow"></i>Task '.db_squote($title).' updated by '.$username.'';
      include 'add-notify.php';

      echo "<script>window.location.replace('ahome.php?page=tasks');</script>";
      }
    }
  }

  ?>

<!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Eboard Tasks</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="tasksTable" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Task ID</th>
                  <th>Date Created</th>
                  <th>Title</th>
                  <th>Submit By</th>
                  <th>Progress</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>

                <!--FILL TABLE FROM DATABASE-->
                <?php include 'tasks-data.php' ?>

              </tbody>
              <tfoot>
                <tr>
                  <th>Task ID</th>
                  <th>Date Created</th>
                  <th>Title</th>
                  <th>Submit By</th>
                  <th>Progress</th>
                  <th>Status</th>

                </tr>
              </tfoot>
            </table>
            <button class="btn btn-default pull-right" data-toggle="modal" data-target="#newTsk" ><i class="fa fa-plus"></i>New Task</button>
            <button class="btn btn-default text-center" onclick="window.location.replace('ahome.php?page=tasks&showAll=true');" >Show Completed</button>
          </div><!-- /.box-body -->

        </div><!-- /.box -->
      </div>
    </div>

  </section><!-- /.content -->

  <?php
    if (isset($_GET["taskID"])) {
      $rows = db_select("SELECT title,description,progress,memberName,status,urgency FROM job WHERE jobID='".$_GET["taskID"]."'");
      if(($rows !== false)&&(count($rows) > 0)) {
          $title = $rows['0']["title"];
          $desc = $rows['0']["description"];
          $prog = $rows['0']["progress"];
          $assto = $rows['0']["memberName"];
          $status = $rows['0']["status"];
          $urgency = $rows['0']["urgency"];

          echo "<script src='js/taskmodal.js'></script>";
      }
    }else{
      //Initialize Variables
      $title = "";
      $desc = "";
      $prog = "";
      $assto = "";
      $status = "";
      $urgency = "";
    }
   ?>



  <!--NEW TASK FORM-->
  <div class="modal fade" id="newTsk" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" onclick="window.location.replace('ahome.php?page=tasks');" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">New Task</h4>
        </div>
        <div class="modal-body">

          <form class="form-horizontal" method="post" action="">
              <fieldset>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="title">Title</label>
                <div class="col-md-5">
                <input id="title" name="title" value="<?=$title?>" type="text" placeholder="" class="form-control input-md" required="">

                </div>
              </div>

              <!-- Textarea -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="description">Description</label>
                <div class="col-md-4">
                  <textarea class="form-control" id="description" name="description"><?=$desc?></textarea>
                </div>
              </div>

              <!-- Textarea -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="progress">progress</label>
                <div class="col-md-4">
                  <textarea class="form-control" id="progress" name="progress"><?=$prog?></textarea>
                </div>
              </div>

              <!-- Select Basic -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="assto">Assign To</label>
                <div class="col-md-4">
                  <select id="assto" name="assto" class="form-control">
                    <option value="All">All</option>
                      <?php
                        $rows = db_select("SELECT fname FROM member WHERE eboard='1'");
                        if(($rows !== false)&&(count($rows) > 0)) {
                          foreach ($rows as $row){
                            if ($row['fname'] === $assto){
                              $sel = "Selected";
                            }else{
                              $sel = "";
                            }
                            echo "<option ".$sel." value='".$row['fname']."'>".$row['fname']."</option>";
                          }
                        }
                       ?>
                  </select>
                </div>
              </div>

              <!-- Select Basic -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="status">Status</label>
                <div class="col-md-4">
                  <select id="status" name="status" class="form-control">
                    <?php
                    $nSel="";
                    $pSel="";
                    $cSel="";
                    switch ($status) {
                      case "New":
                        $nSel = "Selected";
                        break;
                      case "In Progress":
                        $pSel = "Selected";
                        break;
                      case "Complete":
                        $cSel = "Selected";
                        break;
                    }
                    ?>
                    <option <?=$nSel?> value="New">New</option>
                    <option <?=$pSel?> value="In Progress">In Progress</option>
                    <option <?=$cSel?> value="Complete">Complete</option>
                  </select>
                </div>
              </div>

              <!-- Multiple Radios (inline) -->
              <?php
                switch ($urgency) {
                  case "Normal":
                    $normalChk = "checked";
                    $urgentChk="";
                    break;
                  case "Urgent":
                    $urgentChk = "checked";
                    $normalChk = "";
                    break;
                  case "":
                    $normalChk = "checked";
                    $urgentChk="";
                    break;
                }
               ?>
              <div class="form-group">
                <label class="col-md-4 control-label" for="urgency">Urgency</label>
                <div class="col-md-4">
                  <label class="radio-inline" for="urgency-0">
                    <input type="radio" name="urgency" id="urgency-0" value="Normal" <?=$normalChk?>>
                    Normal
                  </label>
                  <label class="radio-inline" for="urgency-1">
                    <input type="radio" name="urgency" id="urgency-1" value="Urgent" <?=$urgentChk?>>
                    Urgent
                  </label>
                </div>
              </div>

              </fieldset>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick="window.location.replace('ahome.php?page=tasks');" data-dismiss="modal">Close</button>
          <button type="sumbit" name="newtask" class="btn btn-primary">Submit</button>
            </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
