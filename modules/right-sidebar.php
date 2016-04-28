<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Create the tabs -->
  <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <!-- Home tab content -->
    <div class="tab-pane active" id="control-sidebar-home-tab">

      <h3 class="control-sidebar-heading">Tasks Progress</h3>
      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript::;">
            <h4 class="control-sidebar-subheading">
              CSC Website
              <span class="label label-danger pull-right">15%</span>
            </h4>
            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-danger" style="width: 15%"></div>
            </div>
          </a>
        </li>

        <li>
          <a href="javascript::;">
            <h4 class="control-sidebar-subheading">
              Budget Stuff
              <span class="label label-info pull-right">75%</span>
            </h4>
            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-info" style="width: 75%"></div>
            </div>
          </a>
        </li>
      </ul><!-- /.control-sidebar-menu -->



    </div><!-- /.tab-pane -->
    <!-- Stats tab content -->
    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
    <!-- Settings tab content -->
    <div class="tab-pane" id="control-sidebar-settings-tab">
        <h3 class="control-sidebar-heading">General Settings</h3>
        <form role="form" method="POST" action="modules/change-theme.php">
        <div class="form-group">
          <label class="control-sidebar-subheading">
            Theme
          </label>
          <p>
            Change the Skin
          </p>
          <p>
            <select class="form-control" name="skins">
              <option value="">Default</option>
              <option value="skin-red">red</option>
              <option value="skin-blue">blue</option>
              <option value="skin-green">green</option>
              <option value="skin-purple">purple</option>
              <option value="skin-yellow">yellow</option>
              <option value="skin-black">black</option>
              <option value="skin-red-light">light red</option>
              <option value="skin-blue-light">light blue</option>
              <option value="skin-green-light">light green</option>
              <option value="skin-purple-light">light purple</option>
              <option value="skin-yellow-light">light yellow</option>
              <option value="skin-black-light">light black</option>
            </select>
            <p>
              <button type="submit" class="btn btn-primary" name="themeChange">Apply</button>
          </p>
        </div><!-- /.form-group -->
      </form>
      <form action="modules/upload.php" method="post" enctype="multipart/form-data">
        <label class="control-sidebar-subheading">
            Select image to upload:
        </label>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <button type="submit" value="UploadImage" class="btn btn-primary" name="upfile">Submit</button>
      </form>
    </div><!-- /.tab-pane -->
  </div>
</aside><!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
