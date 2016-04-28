<?php
  //Check if form has been submitted
  if(!isset($_POST['newtask'])){
  }
  else{
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

    // Insert the values into the database
    $result = db_query("INSERT INTO job (submitBy,title,description,progress,memberName,status,urgency) VALUES (" . $submitBy . "," . $title . "," . $desc . "," . $prog . "," . $memName . "," . $status . "," . $urgency . ")");
    if($result === false) {
      $error = db_error();
      // Handle failure - log the error, notify administrator, etc.
    } else {
    // We successfully inserted a row into the database
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
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Task ID</th>
                  <th>Date Created</th>
                  <th>Title</th>
                  <th>Submit By</th>
                  <th>Progress</th>
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

                </tr>
              </tfoot>
            </table>
            <button class="btn btn-default pull-right" data-toggle="modal" data-target="#newTsk" ><i class="fa fa-plus"></i>New Task</button>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
    </div>

  </section><!-- /.content -->

  <!--NEW TASK FORM-->
  <div class="modal fade" id="newTsk" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">New Task</h4>
        </div>
        <div class="modal-body">

          <form class="form-horizontal" method="post" action="">
              <fieldset>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="title">Title</label>
                <div class="col-md-5">
                <input id="title" name="title" type="text" placeholder="" class="form-control input-md" required="">

                </div>
              </div>

              <!-- Textarea -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="description">Description</label>
                <div class="col-md-4">
                  <textarea class="form-control" id="description" name="description"></textarea>
                </div>
              </div>

              <!-- Textarea -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="progress">progress</label>
                <div class="col-md-4">
                  <textarea class="form-control" id="progress" name="progress"></textarea>
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
                            echo "<option value='".$row['fname']."'>".$row['fname']."</option>";
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
                    <option value="New">New</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Complete">Complete</option>
                  </select>
                </div>
              </div>

              <!-- Multiple Radios (inline) -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="urgency">Urgency</label>
                <div class="col-md-4">
                  <label class="radio-inline" for="urgency-0">
                    <input type="radio" name="urgency" id="urgency-0" value="Normal" checked="checked">
                    Normal
                  </label>
                  <label class="radio-inline" for="urgency-1">
                    <input type="radio" name="urgency" id="urgency-1" value="Urgent">
                    Urgent
                  </label>
                </div>
              </div>

              </fieldset>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="sumbit" name="newtask" class="btn btn-primary">Submit</button>
            </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
