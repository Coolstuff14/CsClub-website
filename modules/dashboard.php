
  <!-- Main content -->
  <section class="content">
    <div class="row">

      <div class="col-lg-4 col-xs-4">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?=$regUsers?></h3>
            <p>Users Registered</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-4 col-xs-4">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?=$uniqueV?></h3>
            <p>Unique Visitors</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->

    <div class="col-lg-4 col-xs-4">
      <!-- small box -->
      <div class="small-box bg-blue">
        <div class="inner">
          <h3><?=$onlineNow?></h3>
          <p>Users Online Now</p>
        </div>
        <div class="icon">
          <i class="ion ion-earth"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
  </div><!-- /.row -->
  <hr style=" border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));" />

  <div class="row">
    <div class="col-lg-12 col-xs-12">
    <?php include 'todo.php' ?>
  </div>
  </div><!--row-->

  <?php include 'modules/newsfeed.php' ?>

  </section><!-- /.content -->
