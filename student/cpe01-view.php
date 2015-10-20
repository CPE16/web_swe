<?php
   require "../config.php";
   require "code_page.php";
   require "process.php";
   require "layout.php";
   $pageName = "cpe01";
   session_start();
   if(!isset($_SESSION['login_user']))
   {
      header('Location: ../login.php');
      exit;
   }
   
   $id = $_SESSION['login_user'];
   
   
   
   	$sth = $pdo->prepare("SELECT * FROM project WHERE std1 = :id or std2 = :id or std3 = :id");
   $sth->bindParam(':id', $id, PDO::PARAM_STR);
   $sth->execute();
   while ($row = $sth->fetch(PDO::FETCH_ASSOC)) 
   {
   $nth = $row['nameThai'];
   $nen = $row['nameEng'];
   $std1 = $row['std1'];
   $std2 = $row['std2'];
   $std3 = $row['std3'];
   $p1 = $row['pro1'];
   $p2 = $row['pro2'];
   $p3 = $row['pro3'];
   }
   
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
   $s1 = Fetch_Data($std1,$pdo);
   $s2 = Fetch_Data($std2,$pdo);
   $s3 = Fetch_Data($std3,$pdo);
   ?>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>AdminLTE 2 | Starter</title>
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <?php include_css(); ?>
      <?php res(); ?>
      <link rel="stylesheet" href="css/animate.min.css">
      <script type="text/javascript" src="js/script_for_cpe01.js"></script>
   </head>
   <body class="hold-transition skin-blue   sidebar-mini">
      <div class="wrapper">
         <!-- Main Header -->
         <?php 
            main_header($name);
            ?>
         <aside class="main-sidebar">
            <section class="sidebar">
               <?php Sidebar_user_panel($name,$id); ?>
               <ul class="sidebar-menu">
                  <li class="header">แบบฟอร์ม</li>
                  <li><a href="student-page.php"><i class="fa fa-link"></i> <span>หน้ารวม คิดชื่อไม่ออก</span></a></li>
                  <li class="active"><a href="cpe01.php"><i class="fa fa-link"></i> <span>CPE01</span></a></li>
                  <li><a href="#"><i class="fa fa-link"></i> <span>CPE02</span></a></li>
                  <li class="treeview">
                     <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
                     <ul class="treeview-menu">
                        <li><a href="#">Link in level 2</a></li>
                        <li><a href="#">Link in level 2</a></li>
                     </ul>
                  </li>
               </ul>
            </section>
         </aside>
         <div class="content-wrapper" style="min-height: auto;">
            <section class="content">
               <div class="container">
                  <div class="panel panel-primary">
                     <div class="panel-heading">ชื่อโครงงาน</div>
                     <div class="panel-body">
                        <div class="col-lg-6">
                           <div class="row">
                              <div class="col-xs-6">
                                 <label for="i-focused" class="control-label"> ชื่อภาษาไทย </label> 
                              </div>
                              <div class="col-xs-6" align="right">
                              </div>
                           </div>
                           <p><?php echo $nth; ?> </p>
                        </div>
                        <div class="col-lg-6">
                           <div class="row">
                              <div class="col-xs-6">
                                 <label for="i-focused" class="control-label"> ชื่อภาษาอังกฤษ </label>
                              </div>
                           </div>
                           <p><?php echo $nen; ?> </p>
                        </div>
                     </div>
                  </div>
                  <div class="panel panel-primary">
                     <div class="panel-heading">นิสิตที่จะทำโครงงาน ชิป๊ะ</div>
                     <div class="panel-body">
                        
                        <p><?php echo $s1.['Student_ID']; ?> </p>
                        <p><?php echo $std2; ?> </p>
                        <p><?php echo $std3; ?> </p>
                     </div>
                  </div>
                  <div class="panel panel-primary">
                     <div class="panel-heading">อาจารย์</div>
                     <div class="panel-body">
                        <div class="col-sm-4">
                           <p><?php echo $p1; ?> </p>
                        </div>
                        <div class="col-sm-4">
                           <p><?php echo $p2; ?> </p>
                        </div>
                        <div class="col-sm-4">
                           <p><?php echo $p3; ?> </p>
                        </div>
                     </div>
                  </div>
                  <div class="row" align ="center">
                     <button id = "submit" type="button" class="btn btn-success" onclick="CheckSubmitClick()" disabled>ยกเลิก</button>
                  </div>
               </div>
            </section>
         </div>
         <?php foot($pageName) ?>
         <div class="control-sidebar-bg"></div>
      </div>
      <?php include_js(); ?>
   </body>
</html>