<?php
   require "../config.php";
   require "code_page.php";
   $pageName = "student-page";
   session_start();
   if(!isset($_SESSION['login_user']))
   {
      header('Location: ../login.php');
      exit;
   }
   $id = $_SESSION['login_user'];
   $sth = $pdo->prepare("SELECT * FROM students WHERE Student_ID = :id");
   $sth->bindParam(':id', $id, PDO::PARAM_STR);
   $sth->execute();
   while ($row = $sth->fetch(PDO::FETCH_ASSOC)) 
   {

         $name = $row['Name'];
         $pic_url = $row["pic_url"];
         $email = $row["email"];
         $faculty = $row["Faculty"];
   }
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Starter</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php include_css(); ?>


  </head>
  <body class="hold-transition skin-blue   sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
        <?php 
          main_header($name);
        ?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <?php Sidebar_user_panel($name,$id); ?>
          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">แบบฟอร์ม</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="student-page.php"><i class="fa fa-link"></i> <span>หน้ารวม คิดชื่อไม่ออก</span></a></li>
            <li><a href="cpe01.php"><i class="fa fa-link"></i> <span>CPE01</span></a></li>
            <li><a href="#"><i class="fa fa-link"></i> <span>CPE02</span></a></li>
            <li class="treeview">
             <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#">Link in level 2</a></li>
                <li><a href="#">Link in level 2</a></li>
              </ul>
            </li>
          </ul>
          <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: auto;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Page Header
            <small>Optional description</small>
          </h1>

        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>150</h3>
                  <p>New Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">%</sup></h3>
                  <p>Bounce Rate</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>44</h3>
                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>65</h3>
                  <p>Unique Visitors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div>

        </section>
      </div>

      <!-- Main Footer -->
      <?php foot($pageName) ?>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
    <?php include_js(); ?>

  </body>
</html>
