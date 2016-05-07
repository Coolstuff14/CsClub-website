<!-- Navigation -->
<?php include_once 'db/login.php'; ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="container">
        <style>.alert{position: absolute;
      top: 30px;
      left: 20px;
      right: 20px;
      z-index: 10000;
      }</style>
        <div id="alert_placeholder"></div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Computer Science Club</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="">Contact</a>
                </li>
                <li>
                    <a href="">Projects</a>
                </li>
                <li>
                    <a href="">Websites</a>
                </li>
                <li>
                    <a href="">Resources</a>
                </li>
            </ul>
          <ul class="navbar-right">
              <form class="navbar-form" method="post" action="">
                <div class="form-group">
                  <input type="text" name="userN" placeholder="Username" class="form-control" reqired>
                  <?php
                  if (isset($error)) {
                  echo "<div class='help-block with-errors'>$error</div>";
                  }?>
                </div>
                <div class="form-group">
                  <input type="password" name="loginPass" placeholder="Password" class="form-control" reqired>
                </div>
                <button type="submit" name="loginSubmit" class="btn btn-success">Sign in</button>



                <a class="btn btn-primary" href="register.php" role="button">Register</a>
              </form>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Full Width Image Header -->
<header class="header-image">
    <div class="headline">
    </div>
</header>
