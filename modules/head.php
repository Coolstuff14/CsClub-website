<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | CSC</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!--LINKS NO BLUE-->
  <link rel="stylesheet" href="css/link-no-blue.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bootstrap/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <!-- Theme Skin -->
  <link rel="stylesheet" href="css/skins/_all-skins.min.css">

  <link href="summernote/summernote.css" rel="stylesheet">

 <?php
 //Main database functions
 include 'db/dbcore.php';

 //Variables used in page
 include 'modules/vars.php';

 //LOAD THEME
 include 'modules/background.php';

 //Check for link clicked and change page content
 include 'modules/cont-change.php';

 //Fill variables from database
 include 'get-basic-data.php'
 ?>

</head>
